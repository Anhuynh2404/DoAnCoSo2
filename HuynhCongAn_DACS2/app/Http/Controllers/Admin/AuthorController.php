<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\CreateAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function index()
    {
        $authors = $this->author->latest('id')->paginate(5);
        return View('admin.author.index', compact('authors'))->with([
            'pageTitle' => 'Danh mục',
            'pageSubtitle' => 'Thể loại',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.author.create')->with([
            'pageTitle' => 'Tác giả',
            'pageSubtitle' => 'Thêm tác giả',
        ]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAuthorRequest $request)
    {
        $dataCreate = $request->all();
        $author = $this->author->create($dataCreate);
        return to_route('authors.index')->with(['message'=> 'Tạo mới thành công']);
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
        $author = $this->author->findOrFail($id);
        return View('admin.author.edit', compact('author'))->with([
            'pageTitle' => 'Tác giả',
            'pageSubtitle' => 'Sửa tác giả',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request, $id)
    {
        $author = $this->author->findOrFail($id);
        $dataUpdate = $request->all();
        $author->update($dataUpdate);
        return to_route('authors.index')->with(['message'=> 'Chỉnh sửa thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = $this->author->findOrFail($id);
        $author->delete();
        return to_route('authors.index')->with(['message'=> 'Xóa thành công']);
    }
}
