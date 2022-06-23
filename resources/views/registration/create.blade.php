@include('layout.head')

<body class="bg-light mt-5">
    <div class="container pt-5 ">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        <h1 class="text-center my-5">নিবন্ধন ফর্ম</h1>
        <form class="my-5 w-50 mx-auto" method="POST" action="/register">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">ইউজার আই.ডি.</label>
                <input class="form-control" type="text" id="register_user_id_fake" name="user_id_fake" placeholder="Disabled input"
                    aria-label="Disabled input example" value="{{ $nextUserId }}" disabled>
                <input style="display: none" class="form-control" type="number" id="register_user_id_actual" name="user_id"
                    placeholder="Disabled input" aria-label="Disabled input example" value="{{ $nextUserId }}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">নাম</label>
                <input type="name" class="form-control" id="name" name="name" placeholder="আপনার নাম লিখুন..." required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">ফোন নম্বর</label>
                <input type="text" minlength="11" maxlength="13" class="form-control" id="registration_phone_fake" name="phone_fake"
                    placeholder="আপনার ফোন নম্বর লিখুন..." required>
                <input style="display: none" type="text" minlength="11" maxlength="13" class="form-control" id="registration_phone_actual"
                    name="phone" placeholder="আপনার ফোন নম্বর লিখুন..." required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">ই-মেইল</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="আপনার ই-মেইল এড্রেস প্রদান করুন...">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">পাসওয়ার্ড</label>
                <input type="password" minlength="8" class="form-control" id="password" name="password" placeholder="পাসওয়ার্ড প্রদান করুন..."
                    required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">পাসওয়ার্ড নিশ্চিত করুন</label>
                <input type="password" minlength="8" class="form-control" id="confirm_password" name="confirm_password"
                    placeholder="পাসওয়ার্ড পুনরায় লিখুন..." required>
                <div id="confirm_password_error" class="form-text"></div>
            </div>
            <button type="submit" class="btn btn-primary mb-3" id="submit_button">দাখিল করুন</button>
            <div>
                <a href="{{ url('/') }}">প্রস্থান করুন</a>
            </div>
        </form>
    </div>

    @include('layout.script')

</body>

</html>
