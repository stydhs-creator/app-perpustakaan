@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h1>Daftar Buku</h1>
    <p style="margin-bottom: 1rem;">
        <a href="{{ url('/books/create') }}" class="btn">+ Tambah Buku</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>ID Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->judul }}</td>
                    <td>{{ $book->penulis }}</td>
                    <td>{{ $book->penerbit }}</td>
                    <td>{{ $book->tahun }}</td>
                    <td>{{ $book->stok }}</td>
                    <td>{{ $book->category_id }}</td>
                    <td>
                        <a href="{{ url('/books/' . $book->id) }}">Detail</a> |
                        <a href="{{ url('/books/' . $book->id . '/edit') }}">Edit</a>
                        <form class="inline" action="{{ url('/books/' . $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Belum ada data buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p><em>Catatan: kolom kategori masih menampilkan ID. Menampilkan nama kategori memerlukan Eloquent Relationship, dipelajari di Pertemuan 7.</em></p>
@endsection