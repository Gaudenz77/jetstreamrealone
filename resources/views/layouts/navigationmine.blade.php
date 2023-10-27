<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('/') }}">Home</a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('showroom') }}">Showroom</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('testsiteone') }}">Testsite</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('create') }}">Add Entry</a>
                </li>

                <li class="nav-item">
                    <!-- Account Management Dropdown -->
<div class="ml-3 dropdown">
    <a href="#" class="btn btn-link dropdown-toggle" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
        @else
            {{ Auth::user()->name }}
        @endif
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="accountDropdown">
        <!-- Account Management -->
        <div class="px-4 py-2 text-sm text-muted">
            {{ __('Manage Account') }}
        </div>

        <!-- Profile Link -->
        <a class="dropdown-item" href="{{ route('profile.show') }}">
            {{ __('Profile') }}
        </a>

        <!-- API Tokens Link (if needed) -->
        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
            <a class="dropdown-item" href="{{ route('api-tokens.index') }}">
                {{ __('API Tokens') }}
            </a>
        @endif

        <div class="dropdown-divider"></div>

        <!-- Logout Form -->
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <button type="submit" class="dropdown-item">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</div>

                </li>
            </ul>
        </div>
    </div>
</nav>