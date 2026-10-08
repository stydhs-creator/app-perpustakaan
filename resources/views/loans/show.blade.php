@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')
    <h1>Detail Peminjaman #{{ $loan->id }}</h1>

    <table style="margin-bottom: 2rem;">
        <tr>
            <th style="width: 200px;">ID Peminjaman</th>
            <td>{{ $loan->id }}</td>
        </tr>
        <tr>
            <th>Nama Anggota</th>
            <td>{{ $loan->member->nama ?? '-' }}</td>
        </tr>
        <tr>
            <th>Nama Petugas</th>
            <td>{{ $loan->user->name ?? '-' }}</td>
        </tr>
        <tr>
            <th>Tanggal Pinjam</th>
            <td>{{ $loan->tanggal_pinjam }}</td>
        </tr>
        <tr>
            <th>Rencana Tanggal Kembali</th>
            <td>{{ $loan->tanggal_kembali ?? '-' }}</td>
        </tr>
        <tr>
            <th>Tanggal Dikembalikan</th>
            <td>{{ $loan->tanggal_dikembalikan ?? '-' }}</td>
        </tr>
        <tr>
            <th>Status</th>
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
        </tr>
    </table>

    <h2>Daftar Buku Dipinjam</h2>
    <ul style="margin-bottom: 1.5rem;">
        @foreach ($loan->loanItems as $item)
            <li>{{ $item->book->judul ?? 'Buku tidak ditemukan' }}</li>
        @endforeach
    </ul>

    <div>
        <a href="{{ route('loans.index') }}" class="btn" style="background-color: #64748b;">Kembali</a>
    </div>
@endsection