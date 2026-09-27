@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
    <h1>Daftar Anggota</h1>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
        <a href="{{ url('/members/create') }}" class="btn">+ Tambah Anggota</a>

        <form action="{{ url('/members') }}" method="GET" style="display: flex; gap: 0.5rem;">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama anggota..." style="padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;">
            <button type="submit" class="btn">Cari</button>
            @if(request('search'))
                <a href="{{ url('/members') }}" class="btn" style="background-color: #64748b;">Reset</a>
            @endif
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->nim }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->nomor_telepon }}</td>
                    <td>{{ $member->alamat }}</td>
                    <td>{{ ucfirst($member->status) }}</td>
                    <td>
                        <a href="{{ url('/members/' . $member->id) }}">Detail</a> |
                        <a href="{{ url('/members/' . $member->id . '/edit') }}">Edit</a> |
                        <form class="inline" action="{{ url('/members/' . $member->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Belum ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 1.5rem;">
        {{ $members->appends(request()->query())->links() }}
    </div>
@endsection