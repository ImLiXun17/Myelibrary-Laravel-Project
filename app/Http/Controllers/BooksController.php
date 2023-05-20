<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->input('search');

    $books = Book::query()
        ->orderBy('book_name', 'asc');

    if (!empty($search)) {
        $books->where(function ($query) use ($search) {
            $query->where('book_name', 'like', '%' . $search . '%')
                ->orWhere('year_published', 'like', '%' . $search . '%')
                ->orWhere('book_author', 'like', '%' . $search . '%');
        });
    }

    $books = $books->paginate(10);

    return view('layouts.book', compact('books'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = Book::all();
        return view('layouts.book-add', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->has('submit')) {
            $book_isbn = $request->input('book_isbn');
            $book_name = $request->input('book_name');
            $book_author = $request->input('book_author');
            $year_published = $request->input('year_published');
            $quantity = $request->input('quantity');
    
            $data = [
                'book_isbn' => $book_isbn,
                'book_name' => $book_name,
                'book_author' => $book_author,
                'year_published' => $year_published,
                'quantity' => $quantity,
            ];
    
            $book = Book::create($data);
    
            if ($book) {
                return redirect()->route('book.create')->with('success', 'Book added successfully');
            } else {
                echo 'ERROR: Failed to add book';
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $bid)
    {
    $book = Book::findOrFail($bid); 
    return view('layouts.book-edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $bid)
    {
        $book = Book::findOrFail($bid);

        $book->book_isbn = $request->input('book_isbn');
        $book->book_name = $request->input('book_name');
        $book->book_author = $request->input('book_author');
        $book->year_published = $request->input('year_published');
        $book->quantity = $request->input('quantity');
        if ($request->has('submit')) {
            $book->save();
            return redirect()->route('book')->with('success', 'Book details updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $bid)
    {
        $book = Book::findOrFail($bid);
        $book->delete();
        return redirect()->route('book')->with('success', 'Student deleted successfully');
    }
}
