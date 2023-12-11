<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BorrowReturnSlip\BorrowReturnSlipCreateRequest;
use App\Models\Book;
use App\Models\BorrowReturnSlip;
use App\Models\BorrowReturnSlipDetail;
use App\Models\Card;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $borrowReturn_Slip, $borrowReturn_Slip_Detail;
    protected $user, $card, $book;
    public function __construct(BorrowReturnSlip $borrowReturn_Slip, BorrowReturnSlipDetail $borrowReturn_Slip_Detail, User $user, Card $card, Book $book)
    {
        $this->borrowReturn_Slip = $borrowReturn_Slip;
        $this->borrowReturn_Slip_Detail = $borrowReturn_Slip_Detail;
        $this->user = $user;
        $this->card = $card;
        $this->book = $book;
    }
    public function index()
    {
        $slips = BorrowReturnSlip::with(['user', 'card', 'details' => function ($query) {
            $query->withCount('books');
        }])
            ->latest()
            ->paginate(5);

        // foreach ($slips->items() as $slip) {
        //     dd($slip->toArray());
        // }
        return view('admin.borrow_return.index', compact('slips'))->with([
            'pageTitle' => 'Mượn trả sách',
            'pageSubtitle' => 'Phiếu mượn'
        ]);
    }

    public function returnStatus($id)
    {
        $slip = $this->borrowReturn_Slip->findOrFail($id);
        $slip->update(['status' => !$slip->status]);
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cards = $this->card->all();
        $users = $this->user->all();
        $books = $this->book->all();

        return view('admin.borrow_return.create', compact('cards', 'users', 'books'))->with([
            'pageTitle' => 'Mượn sách',
            'pageSubtitle' => 'Thêm phiếu mượn'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BorrowReturnSlipCreateRequest $request)
    {
        $dataCreate = $request->all();
        // $bookCount = count($dataCreate['book_ids']);
        // if ($bookCount > 5) {
        //     return redirect()->back()->withInput()->withErrors(['book_ids' => 'Số lượng sách mượn không được vượt quá 5.']);
        // }
        $slip = $this->borrowReturn_Slip->create([
            'user_id' => auth()->user()->id,
            'card_id' => $dataCreate['card_id'],
            // Thêm các trường khác như ngày mượn, ngày trả, ...
        ]);

        $slipDetail = $this->borrowReturn_Slip_Detail->create([
            'borrow_return_slip_id' => $slip->id,
            'status' => $dataCreate['status'] ?? '0',
            'borrowed_date' => now(),
            'returned_date' => Carbon::now()->addDays(30),
            'note' => $dataCreate['note'],
        ]);

        $slipDetail->books()->attach($dataCreate['book_ids']);


        return redirect()->route('slips.index')->with(['message' => 'Tạo phiếu mượn thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return View('', compact('id'))->with([
            'pageTitle' => 'Mượn sách',
            'pageSubtitle' => 'Sửa phiếu mượn'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getBookCountAttribute()
    {
        return $this->book->count();
    }

    // Trong BorrowReturnController.php
    public function search(Request $request)
    {
        $search = $request->input('search');

        $slips = BorrowReturnSlip::with(['user', 'card', 'details' => function ($query) {
            $query->withCount('books');
        }])
            ->when($search, function ($query) use ($search) {
                $query->whereHas('card.reader', function ($subquery) use ($search) {
                    $subquery->where('name', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('user', function ($subquery) use ($search) {
                        $subquery->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhere('id', 'like', '%' . $search . '%');
            })
            ->latest();

        // Check if the search input is empty
        if (empty($search)) {
            // Retrieve all records
            $slips = $slips->paginate(5);
        } else {
            // Apply pagination for search results
            $slips = $slips->paginate(5);
        }

        return view('admin.borrow_return.index', compact('slips'))->with([
            'pageTitle' => 'Mượn trả sách',
            'pageSubtitle' => 'Phiếu mượn'
        ]);
    }

}
