<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }


    public function index(Request $request)
    {
        // fetch books data from books table
        if( $request->has('search')   ){
            $books = Book::where('title', 'like', '%'.$request->search.'%' )
                ->orWhere('author', 'like', '%'.$request->search.'%' )
                ->paginate(10);
        } else {
            $books = Book::paginate(10);
        }
        // pass books data to view
        return view('books.index')
            ->with('books', $books);


    }

    public function show(Book $book)
    {
        return view('books.show')
            ->with('book', $book);

    }

    public function create()
    {
        return view('books.create');
    }


    public function store(Request $request)
    {

        $rules = [
                'title'  => 'required|max:255',
                'author' => 'required|max:255',
                'isbn'   => 'required|numeric|digits:13',
                'price'  => 'required|numeric',
                'stock'  => 'required|numeric|integer|min:0'
        ];

        $this->validate($request, $rules);

        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->price = $request->price;
        $book->stock = $request->stock;
        $book->save();

        return redirect()->route('books.show', $book->id );

    }


    public function edit(Book $book)
    {
      return view('books.edit')
            ->with('book', $book);
    }

    public function update(Book $book, Request $request)
    {
        $rules = [
            'title'  => 'required|max:255',
            'author' => 'required|max:255',
            'isbn'   => 'required|numeric|digits:13',
            'price'  => 'required|numeric',
            'stock'  => 'required|numeric|integer|min:0'
        ];

        $this->validate($request, $rules);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->price = $request->price;
        $book->stock = $request->stock;
        $book->save();

        return redirect()->route('books.show', $book->id );

    }

    public function destroy(Book $book, Request $request)
    {
        $book->delete();

        return redirect()->route('books.index');
    }




}
