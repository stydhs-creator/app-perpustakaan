@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
    <h1>Daftar Peminjaman</h1>

    <p style="margin-bottom: 1rem;">
        <a href="{{ route('loans.create') }}" class="btn">+ Tambah Peminjaman</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>ID Pinjam</th>
                <th>Nama Anggota</th>
                <th>Nama Petugas</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Buku Dipinjam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($loans as $loan)
                <tr>
                    <td>{{ $loan->id }}</td>
                    <td>{{ $loan->member->nama ?? '-' }}</td>
                    <td>{{ $loan->user->name ?? '-' }}</td>
                    <td>{{ $loan->tanggal_pinjam }}</td>
                    <td>{{ $loan->tanggal_kembali ?? '-' }}</td>
                    <td>
                        @if ($loan->status === 'dikembalikan')
                            <span class="badge badge-success">Dikembalikan</span>
                        @elseif ($loan->status === 'dipinjam')
                            <span class="badge badge-warning">Dipinjam</span>
                        @elseif ($loan->status === 'terlambat')
                            <span class="badge badge-danger">Terlambat</span>
                        @else
                            <span class="badge">{{ ucfirst($loan->status) }}</span>
                        @endif
                    </td>
                    <td>
                        <ul style="margin: 0; padding-left: 1.2rem;">
                            @foreach ($loan->loanItems as $item)
                                <li>{{ $item->book->judul ?? '-' }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('loans.show', $loan->id) }}">Detail</a>

                        @if ($loan->status === 'dipinjam')
                            |
                            <form action="{{ route('loans.kembalikan', $loan->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" onclick="return confirm('Proses pengembalian buku ini?')" style="background: none; border: none; color: #2563eb; cursor: pointer; text-decoration: underline; padding: 0;">
                                    Kembalikan
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Belum ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 1.5rem;">
        {{ $loans->links() }}
    </div>
@endsection