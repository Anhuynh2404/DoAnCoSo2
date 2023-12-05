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
        $slips = BorrowReturnSlip::with(['user', 'card', 'details.book'])
        ->latest()
        ->paginate(5);

        return view('admin.borrow_return.index', compact('slips'));
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

        return view('admin.borrow_return.create', compact('cards','users','books'));
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

        $slip = $this->borrowReturn_Slip->create([
            'user_id' => $dataCreate['user_id'],
            'card_id' => $dataCreate['card_id'],
          'status' => $dataCreate['status'] ?? '1',
          'borrowed_date' => $dataCreate['borrowed_date'],
          'returned_date' => Carbon::now()->addMonth()->toDateString(),
        ]);

        $slipDetail = $this->borrowReturn_Slip_Detail->create([
            'borrow_return_slip_id' => $slip->id,
            'book_id' => $dataCreate['book_id'],
            'note' => $dataCreate['note'] ,
        ]);

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
        //
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
}
