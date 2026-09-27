@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
    <h1>Tambah Anggota Baru</h1>

    @if ($errors->any())
        <div class="alert-success" style="background-color: #fef2f2; color: #991b1b; border-color: #fecaca;">
            <ul style="margin-left: 1.25rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/members') }}" method="POST">
        @csrf
        <div style="margin-bottom: 1rem;">
            <label style="display: block; font-weight: 500;">Nama Lengkap:</label>
            <input type="text" name="nama" value="{{ old('nama') }}" required style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; font-weight: 500;">NIM:</label>
            <input type="text" name="nim" value="{{ old('nim') }}" required style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; font-weight: 500;">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; font-weight: 500;">Nomor Telepon:</label>
            <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}" required style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; font-weight: 500;">Alamat:</label>
            <textarea name="alamat" required style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; height: 80px;">{{ old('alamat') }}</textarea>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: 500;">Status:</label>
            <select name="status" required style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px;">
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <button type="submit" class="btn">Simpan</button>
        <a href="{{ url('/members') }}" class="btn" style="background-color: #64748b;">Batal</a>
    </form>
@endsection