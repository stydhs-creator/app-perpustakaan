@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
    <h1>Daftar Kategori</h1>
    <p style="margin-bottom: 1rem;">
        <a href="{{ url('/categories/create') }}" class="btn">+ Tambah Kategori</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->nama }}</td>
                    <td>
                        <a href="{{ url('/categories/' . $category->id) }}">Detail</a> |
                        <a href="{{ url('/categories/' . $category->id . '/edit') }}">Edit</a>
                        <form class="inline" action="{{ url('/categories/' . $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Belum ada data kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection