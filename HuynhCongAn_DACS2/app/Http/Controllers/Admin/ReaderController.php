<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reader\ReaderCreateRequest;
use App\Models\Card;
use App\Models\Reader;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $reader, $card;
    public function __construct(Reader $reader, Card $card)
    {
        $this->reader = $reader;
        $this->card = $card;
    }
    public function index()
    {
        // $cards = $this->card->latest('id')->paginate(5);
        $cards = $this->card
            ->join('readers', 'cards.reader_id', '=', 'readers.id')
            ->select('cards.*', 'readers.name', 'readers.class', 'readers.major', 'readers.phone', 'readers.email', 'readers.address')
            ->latest('cards.id')
            ->paginate(5);

        return view('admin.reader.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.reader.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReaderCreateRequest $request)
    {
        $dataCreate = $request->all();

        $reader = $this->reader->create([
            'name' => $dataCreate['name'],
            'email' => $dataCreate['email'],
            'phone' => $dataCreate['phone'],
            'address' => $dataCreate['address'],
            'cccd' => $dataCreate['cccd'],
            'gender' => $dataCreate['gender'],
            'faculty' => $dataCreate['faculty'],
            'major' => $dataCreate['major'],
            'class' => $dataCreate['class'],
            'note' => $dataCreate['note']
        ]);
        $endDate = Carbon::now()->addMonth();
        $card = $this->card->create([
            'end_date' => $endDate,
            'status' => $dataCreate['status'] ?? true,
            'reader_id' => $reader->id,
        ]);
        // return response()->json(['success' => 'Đăng ký thẻ thành công']);
        return redirect()->back()->with(['message' => 'Gia hạn thẻ thành công']);
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
        $reader = $this->reader->find($id);
        $card = $this->card->where('reader_id', $id)->first();
        return View('admin.reader.edit', compact('reader', 'card'));
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
    public function extendCard($id)
    {
        $reader = $this->reader->find($id);
        $card = $this->card->where('reader_id', $id)->first();
        if ($card->end_date < Carbon::now()) {
            $newEndDate = Carbon::parse($card->end_date)->addMonth();
            $card->update(['end_date' => $newEndDate]);

            return redirect()->back()->with(['message' => 'Gia hạn thẻ thành công']);
        } else {
            return redirect()->back()->with(['message' => 'Không thể gia hạn thẻ, thẻ chưa hết hạn']);
        }
    }
    public function toggleStatus($id)
    {
        $card = $this->card->findOrFail($id);
        $card->update(['status' => !$card->status]);
        return redirect()->back();
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
