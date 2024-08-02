<?php

/*namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /*public function index()
    {
        
            $books = Book::with('author')->paginate(10);
            return view('books.index',
            compact('books'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
   /* public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   /* public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
  /*  public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   /* public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   /* public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
   /* public function destroy(string $id)
    {
        //
    }
}*/
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $books = Book::with('author')->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'isbn' => 'required|string|max:13|unique:books,isbn',
            'published_year' => 'required|integer|min:1500|max:' . date('Y'),
        ]);

        // Création du livre
        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        // Validation des données
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'isbn' => 'required|string|max:13|unique:books,isbn,' . $book->id,
            'published_year' => 'required|integer|min:1500|max:' . date('Y'),
        ]);

        // Mise à jour du livre
        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
