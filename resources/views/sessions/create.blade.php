@include('layout.head')

<body class="bg-light mt-5">

    <div class="container pt-5 ">
        @if (Session::has('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1 class="text-center my-5">সাইন ইন ফর্ম</h1>
        <form class="my-5 w-50 mx-auto" method="POST" action="/login">
            @csrf
            <div class="mb-3">
                <label for="credential" class="form-label">ফোন নম্বর/ই-মেইল</label>
                <input type="text" class="form-control" id="login_credential_fake" name="credential_fake"
                    placeholder="আপনার ফোন নম্বর অথবা ই-মেইল লিখুন..." required>
                <input style="display: none" type="text" class="form-control" id="login_credential_actual" name="credential"
                    placeholder="আপনার ফোন নম্বর অথবা ই-মেইল লিখুন..." required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">পাসওয়ার্ড</label>
                <input type="password" minlength="8" class="form-control" id="password" name="password" placeholder="আপনার পাসওয়ার্ড লিখুন..."
                    required>
            </div>
            <button type="submit" class="btn btn-primary mb-3" id="submit_button">সাইন ইন</button>
            <div>
                <a href="{{ url('/') }}">প্রস্থান করুন</a>
            </div>
        </form>
    </div>

    @include('layout.script')

</body>

</html>
