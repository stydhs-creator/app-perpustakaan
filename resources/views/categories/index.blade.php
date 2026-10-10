@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
    <h1>Daftar Kategori</h1>
    <p style="margin-bottom: 1rem;">
        <a href="{{ route('categories.create') }}" class="btn">+ Tambah Kategori</a>
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
                    <td>{{ $category->nama_kategori }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}">Edit</a> |
                        <form class="inline" action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus kategori ini?')" style="background: none; border: none; color: #dc2626; cursor: pointer; text-decoration: underline; padding: 0;">
                                Hapus
                            </button>
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