<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Publisher\CreatePublisherRequest;
use App\Http\Requests\Publisher\UpdatePublisherRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $publisher;
    public function __construct(Publisher $publisher){
        $this->publisher = $publisher;
    }

    public function index()
    {
        $publishers = $this->publisher->latest('id')->paginate(5);
        return View('admin.publisher.index',compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePublisherRequest $request)
    {
        $dataCreate = $request->all();
        $this->publisher->create($dataCreate);
        return redirect()->route('publisher.index')->with(['message'=>'Tạo mới thành công!']);
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
        $publisher = $this->publisher->findOrFail($id);
        return View('admin.publisher.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePublisherRequest $request, $id)
    {
        $dataUpdate = $request->all();
        $publisher = $this->publisher->findOrFail($id);
        $publisher->update($dataUpdate);
        return redirect()->route('publisher.index')->with(['message'=>'Cập nhật thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publisher = $this->publisher->findOrFail($id);
        $publisher->delete();
        return redirect()->route('publisher.index')->with(['message'=>'Xóa thành công!']);
    }
}
