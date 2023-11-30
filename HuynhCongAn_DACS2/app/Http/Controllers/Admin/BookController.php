<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\CreateBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $category, $author, $publisher;
    protected $book;

    public function __construct(Category $category, Author $author, Publisher $publisher, Book $book)
    {
        $this->category = $category;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->book = $book;
    }
    public function index()
    {
        $books = $this->book->latest('id')->paginate(5);
        return View('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->get(['id', 'name']);
        $authors = $this->author->get(['id', 'name']);
        $publishers = $this->publisher->get(['id', 'name']);
        return View('admin.book.create', compact('categories', 'authors', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // YourController.php

    public function store(CreateBookRequest $request)
    {
        $dataCreate = $request->all();

        $book = $this->book->create([
            'name' => $dataCreate['name'],
            'description' => $dataCreate['description'],
        ]);
        $dataCreate['image'] = $this->book->saveImage($request);

        $book->images()->create(['url' => $dataCreate['image']]);


        // Attach categories, publishers, and authors
        $book->categories()->attach($dataCreate['category_ids']);
        $book->publishers()->attach($dataCreate['publisher_ids']);
        $book->authors()->attach($dataCreate['author_ids']);

        return redirect()->route('books.index')->with(['message' => 'Tạo mới thành công']);
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
        $book = $this->book->with('categories', 'authors', 'publishers')->findOrFail($id);
        $categories = $this->category->get(['id', 'name']);
        $authors = $this->author->get(['id', 'name']);
        $publishers = $this->publisher->get(['id', 'name']);
        return View('admin.book.edit', compact('book', 'categories', 'authors', 'publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, $id)
    {

        $dataUpdate = $request->all();
        $book = $this->book->findOrFail($id);
        $currentImage = $book->images ? $book->images->first()->url : '';
        $dataUpdate['image'] = $this->book->updateImage($request, $currentImage);
        $book->images()->delete();
        $book->update([
            'name' => $dataUpdate['name'],
            'description' => $dataUpdate['description'],
        ]);


        $book->images()->create(['url' => $dataUpdate['image']]);


        // Attach categories, publishers, and authors
        $book->assignCategory($dataUpdate['category_ids']);
        $book->assignPublisher($dataUpdate['publisher_ids']);
        $book->assignAuthor($dataUpdate['author_ids']);

        return redirect()->route('book.index')->with(['message' => 'Chỉnh sửa thành công']);
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
