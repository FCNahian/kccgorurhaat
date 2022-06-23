@include('layout.head')

<body>
    @auth
        @include('layout.sidebar')
    @endauth
    <section class="{{ Auth::user() ? 'main-body-inactive' : 'main-body-active' }}" id="main-body">
        @include('layout.navbar')
        @if (session('message'))
            <div class="mx-3 mt-3">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="mx-3 mt-3">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="sub-body p-3">
            <div class="bg-light border border-light rounded-3 py-4 px-5">
                {{ $slot }}
            </div>
        </div>
    </section>

    @include('layout.script')

</body>

</html>
