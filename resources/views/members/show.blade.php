@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')
    <h1>Detail Anggota</h1>

    <table style="margin-bottom: 1.5rem;">
        <tr>
            <th style="width: 200px;">ID</th>
            <td>{{ $member->id }}</td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $member->nama }}</td>
        </tr>
        <tr>
            <th>NIM</th>
            <td>{{ $member->nim }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $member->email }}</td>
        </tr>
        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $member->nomor_telepon }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $member->alamat }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($member->status) }}</td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td>{{ $member->created_at }}</td>
        </tr>
    </table>

    <a href="{{ url('/members/' . $member->id . '/edit') }}" class="btn">Edit Data</a>
    <a href="{{ url('/members') }}" class="btn" style="background-color: #64748b;">Kembali</a>
@endsection