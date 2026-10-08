<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->paginate(10);

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'judul'       => 'required|string|max:200',
            'penulis'     => 'required|string|max:100',
            'penerbit'    => 'required|string|max:100',
            'tahun'       => 'required|integer|min:1900|max:' . date('Y'),
            'stok'        => 'required|integer|min:0',
        ]);

        Book::create($validated);

        return redirect('/books')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $book = Book::with('category')->findOrFail($id);

        return view('books.show', compact('book'));
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'judul'       => 'required|string|max:200',
            'penulis'     => 'required|string|max:100',
            'penerbit'    => 'required|string|max:100',
            'tahun'       => 'required|integer|min:1900|max:' . date('Y'),
            'stok'        => 'required|integer|min:0',
        ]);

        $book->update($validated);

        return redirect('/books')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/books')->with('success', 'Buku berhasil dihapus.');
    }
}