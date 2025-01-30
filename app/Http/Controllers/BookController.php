<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class BookController extends Controller {
    public function index() {
        $books = Book::orderBy('id', 'desc')->get();
        return Inertia::render('Books/Index', [
            'books' => $books,
        ]);
    }

    public function create() {
        return Inertia::render('Books/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'title'          => 'required',
            'author'         => 'required',
            'published_year' => 'required|integer|digits:4',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
        }

        $book                 = new Book();
        $book->title          = $request->title;
        $book->author         = $request->author;
        $book->published_year = $request->published_year;
        $book->description    = $request->description;
        if ($request->hasFile('image')) {
            $book->image = $imagePath;
        }
        $book->save();

        return to_route('books.index')->with('success', 'Book added successfully!');
    }

    public function edit(Book $book) {
        return Inertia::render('Books/Edit', [
            'book' => $book,
        ]);
    }

    public function update(Request $request, Book $book) {
        $request->validate([
            'title'          => 'required',
            'author'         => 'required',
            'published_year' => 'required|integer|digits:4',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($book->image) {
                Storage::disk('public')->delete($book->image);
            }
            $imagePath = $request->file('image')->store('books', 'public');
        }

        $book->title          = $request->title;
        $book->author         = $request->author;
        $book->published_year = $request->published_year;
        $book->description    = $request->description;
        if ($request->hasFile('image')) {
            $book->image = $imagePath;
        }
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book) {
        if ($book->image) {
            Storage::disk('public')->delete($book->image);
        }
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}
