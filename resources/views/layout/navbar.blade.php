<nav class="navbar sticky-top navbar-expand-lg bg-light" id="navbar">
    <div class="container-fluid">
        @auth
            <button class="btn border rounded-circle" id="sidebar-toggle">
                <span class="text-secondary">&#8647;</span>
            </button>
        @endauth
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-2">
                    <li class="nav-item">
                        <a class="nav-link btn dashboard-nav-link" aria-current="page" href="{{ url('/dashboard') }}">ড্যাশবোর্ড</a>
                    </li>
                </ul>
            @endauth
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ url('/dashboard') }}">কে.সি.সি. গরুর হাট</a>
                </li>
            </ul>
            @auth
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <span style="width: 270px" class="border border-secondary rounded btn px-auto me-3" id="current-date-time-display""></span>
                                    </li>
                                </ul>
            @endauth
                @if (auth()->check())
                        <a class="btn btn-info me-3" href="{{ url('/user', auth()->user()->id) }}">{{ auth()->user()->name }}</a>
                        <a class="btn btn-danger me-3" href="{{ url('/logout') }}">সাইন আউট</a>
                    @else
                        <a href="{{ url('/login/create') }}" class="btn btn-success me-3">সাইন ইন</a>
                        <a href="{{ url('/register/create') }}" class="btn btn-primary me-3">নিবন্ধন করুন</a>
                        @endif
        </div>
    </div>
</nav>
