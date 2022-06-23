@include('layout.head')

<body
    style="background-image: url({{ asset('assets/images/home-background.jpg') }}); background-repeat: no-repeat; background-position: center; background-size: cover;"
    class="p-5">
    <section class="p-5" id="main-body">
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
        <div class="bg-light w-50 p-5 mx-auto rounded-5 text-center">
            <h1 class=" rounded-2 text-center text-danger">কে.সি.সি. গরুর হাট</h1>
            <h2 class=" rounded-2 text-center text-success">২০২২</h2>
            <img src="{{ asset('assets/images/logo.png') }}" class="rounded mt-3" alt="">
            <div class=" rounded-2 row mt-5 px-5 py-3">
                <div class="col-6 d-grid text-end ps-5">
                    <a href="{{ url('/login/create') }}" class="btn btn-success btn-lg btn-block" type="button">সাইন ইন</a>
                </div>
                <div class="col-6 d-grid text-start pe-5">
                    <a href="{{ url('/register/create') }}" class="btn btn-primary btn-lg btn-block" type="button">নিবন্ধন করুন</a>
                </div>
            </div>
        </div>
    </section>

    @include('layout.script')

</body>

</html>
