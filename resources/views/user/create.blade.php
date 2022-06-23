<x-master>
    <h1 class="text-center my-5">নতুন ব্যবহারকারী নিবন্ধন ফর্ম</h1>
    <form class="my-5 w-50 mx-auto" method="POST" action="/user">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">ইউজার আই.ডি.</label>
            <input class="form-control" type="text" id="add_user_id_fake" name="user_id_fake" placeholder="ইউজার আই.ডি. প্রদান করুন..."
                aria-label="Disabled input example" value="{{ $nextUserId }}">
            <input style="display: none" class="form-control" type="number" id="add_user_id_actual" name="user_id" placeholder="Disabled input"
                aria-label="Disabled input example" value="{{ $nextUserId }}">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">নাম</label>
            <input type="name" class="form-control" id="name" name="name" placeholder="ব্যবহারকারীর নাম লিখুন..." required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">ফোন নম্বর</label>
            <input type="text" minlength="11" maxlength="13" class="form-control" id="add_user_phone_fake" name="phone_fake"
                placeholder="ব্যবহারকারীর ফোন নম্বর লিখুন..." required>
            <input style="display: none" type="text" minlength="11" maxlength="13" class="form-control" id="add_user_phone_actual" name="phone"
                placeholder="ব্যবহারকারীর ফোন নম্বর লিখুন..." required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">ই-মেইল</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="ব্যবহারকারীর ই-মেইল এড্রেস প্রদান করুন...">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">পাসওয়ার্ড</label>
            <input type="password" minlength="8" class="form-control" id="password" name="password" placeholder="পাসওয়ার্ড প্রদান করুন..." required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">পাসওয়ার্ড নিশ্চিত করুন</label>
            <input type="password" minlength="8" class="form-control" id="confirm_password" name="confirm_password"
                placeholder="পাসওয়ার্ড পুনরায় লিখুন..." required>
            <div id="confirm_password_error" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="role_id" class="form-label">পদবি নিযুক্ত করুন</label>
            <select class="form-select" aria-label="Default select example" name="role_id" id="role_id" required>
                <option selected="true" disabled="disabled">পদবি নির্বাচন করুন</option>
                <option value="1">কালেক্টর</option>
                <option value="2">একাউন্টেন্ট</option>
                <option value="3">অ্যাডমিন</option>
                @if (Auth::user()->userRole->role_name == 'super admin')
                    <option value="4">সুপার অ্যাডমিন</option>
                @endif
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-3" id="submit_button">দাখিল করুন</button>
        <div>
            <a href="{{ url('/user') }}">প্রস্থান করুন</a>
        </div>
    </form>
</x-master>
