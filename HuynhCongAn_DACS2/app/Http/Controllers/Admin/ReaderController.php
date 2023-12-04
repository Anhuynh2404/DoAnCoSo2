<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reader\ReaderCreateRequest;
use App\Models\Card;
use App\Models\Reader;
use Illuminate\Http\Request;

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
        $card = $this->card->create([
            'end_date' => $dataCreate['end_date'],
            'status' => $dataCreate['status'] ?? true,
            'reader_id' => $reader->id,
        ]);
        // // $card = new Card([
        // //     'end_date' => $dataCreate['end_date'],
        // //     'status' => $dataCreate['status'] ?? true,
        // // ]);
        // // $reader->card()->save($card);
        // $card->reader()->attach($dataCreate['reader_id']);
        // $card->reader()->save($reader);
        return redirect()->route('readers.index')->with(['message' => 'Đăng ký thẻ thành công']);
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
