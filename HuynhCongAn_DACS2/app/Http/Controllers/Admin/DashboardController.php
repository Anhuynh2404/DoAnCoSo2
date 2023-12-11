<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BorrowReturnSlip;
use App\Models\BorrowReturnSlipDetail;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
        $username = auth()->user()->name;
        $reportBorrowReturn = $this->borrowReturn_Slip_Detail->paginate(10);
        return view('admin.dashboard.index', compact('reportBorrowReturn'))->with([
            'pageTitle' => 'Dashboard',
            'pageSubtitle' => 'Thống kê',
            'username' => $username,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
