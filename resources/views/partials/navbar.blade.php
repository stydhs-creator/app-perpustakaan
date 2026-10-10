<nav>
    <div class="brand">
        📚 Perpustakaan Digital Kampus
    </div>

    <ul>
        <li>
            <a href="{{ route('books.index') }}" class="{{ request()->is('books*') ? 'active' : '' }}">Buku</a>
        </li>

        @if (auth()->check() && auth()->user()->role === 'admin')
            <li>
                <a href="{{ route('categories.index') }}" class="{{ request()->is('categories*') ? 'active' : '' }}">Kategori</a>
            </li>
        @endif

        <li>
            <a href="{{ route('members.index') }}" class="{{ request()->is('members*') ? 'active' : '' }}">Anggota</a>
        </li>

        <li>
            <a href="{{ route('loans.index') }}" class="{{ request()->is('loans*') ? 'active' : '' }}">Peminjaman</a>
        </li>
    </ul>

    @auth
        <div class="navbar-user">
            <a href="{{ route('profile.show') }}" class="{{ request()->is('profil*') ? 'active' : '' }}" style="color: #cbd5e1; text-decoration: none;">
                Profil
            </a>
            <span>|</span>
            <span>{{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})</span>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    @endauth
</nav>