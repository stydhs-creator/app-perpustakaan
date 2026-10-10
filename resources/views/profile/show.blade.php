@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <h1>Profil Saya</h1>

    {{-- Informasi Profil --}}
    <div style="background-color: #f8fafc; border: 1px solid #e2e8f0; padding: 1.25rem; border-radius: 8px; margin-bottom: 2rem; max-width: 500px;">
        <p style="margin-bottom: 0.5rem;"><strong>Nama:</strong> {{ $user->name }}</p>
        <p style="margin-bottom: 0.5rem;"><strong>Email:</strong> {{ $user->email }}</p>
        <p style="margin: 0;">
            <strong>Role:</strong> 
            <span class="badge badge-success">{{ ucfirst($user->role) }}</span>
        </p>
    </div>

    <h2>Ganti Password</h2>

    <form action="{{ route('profile.password.update') }}" method="POST" style="max-width: 500px; margin-top: 1rem;">
        @csrf
        @method('PUT')

        {{-- Password Lama --}}
        <div style="margin-bottom: 1rem;">
            <label for="current_password" style="display: block; font-weight: bold; margin-bottom: 0.5rem;">Password Lama</label>
            <input type="password" name="current_password" id="current_password" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
            @error('current_password')
                <div style="color: #dc2626; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password Baru --}}
        <div style="margin-bottom: 1rem;">
            <label for="password" style="display: block; font-weight: bold; margin-bottom: 0.5rem;">Password Baru</label>
            <input type="password" name="password" id="password" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
            @error('password')
                <div style="color: #dc2626; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Konfirmasi Password Baru --}}
        <div style="margin-bottom: 1.5rem;">
            <label for="password_confirmation" style="display: block; font-weight: bold; margin-bottom: 0.5rem;">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" id="password_confirmation" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #ccc;">
        </div>

        <button type="submit" class="btn">Ganti Password</button>
    </form>
@endsection