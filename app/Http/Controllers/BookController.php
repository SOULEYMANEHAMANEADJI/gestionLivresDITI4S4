<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::select('id', 'title', 'description', 'author', 'cover_image', 'nb_pages')->get();
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $validated =$request->validated();
        $book = new Book();
        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->author = $request->input('author');
        $book->nb_pages = $request->input('nb_pages');
        if($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/books/'), $filename);
            $book->cover_image = $filename;
        }
        $book->save();
        return redirect()->back()->with('status','Student Image Added Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        $validated =$request->validated();
        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->author = $request->input('author');
        $book->nb_pages = $request->input('nb_pages');
        if($request->hasFile('cover_image')) {
            $destination = 'uploads/books/' . $book->cover_image;
            if(File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('cover_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/books/', $filename);
            $book->cover_image = $filename;
        }
        $book->update();
        return redirect()->back()->with('status','Book Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $destination = 'uploads/books/' . $book->cover_image;
        if(File::exists($destination)) {
            File::delete($destination);
        }
        $book->delete();
        return redirect()->back()->with('status','Book Deleted Successfully');
    }
}
