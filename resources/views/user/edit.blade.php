<x-master>
    <h1 class="text-center my-5">ব্যবহারকারীর তথ্য পরিবর্তন করুন</h1>
    <form class="my-5 w-50 mx-auto" method="POST" action="{{ url('/user', $user->id) }}">
        @csrf
        @method('patch')
        @if (Auth::user()->userRole->role_name == 'super admin')
            <div class="mb-3">
                <label for="user_id" class="form-label">ইউজার আই.ডি.</label>
                <input class="form-control" type="text" id="edit_user_id_fake" name="user_id_fake" placeholder="ইউজার আই.ডি. প্রদান করুন..."
                    aria-label="Disabled input example" value="{{ $user->user_id }}">
                <input style="display: none" class="form-control" type="number" id="edit_user_id_actual" name="user_id" placeholder="Disabled input"
                    aria-label="Disabled input example" value="{{ $user->user_id }}">
            </div>
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">নাম</label>
            <input type="name" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">ফোন নম্বর</label>
            <input type="text" minlength="11" maxlength="13" class="form-control" id="edit_user_phone_fake" name="phone_fake"
                value="{{ $user->phone }}">
            <input style="display: none" type="text" minlength="11" maxlength="13" class="form-control" id="edit_user_phone_actual" name="phone"
                value="{{ $user->phone }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">ই-মেইল</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
        @if (Auth::user()->userRole->role_name == 'admin' || Auth::user()->userRole->role_name == 'super admin')
            <div class="mb-3">
                <label for="role_id" class="form-label">অবস্থা</label>
                <select class="form-select" aria-label="Default select example" name="active" id="active">
                    <option selected="true" disabled="disabled">{{ $user->active ? 'লগড ইন' : 'লগড আউট' }}</option>
                    <option value="1">লগ ইন</option>
                    <option value="2">লগ আউট</option>
                </select>
            </div>
        @endif
        <div class="mb-3">
            <label for="password" class="form-label">পাসওয়ার্ড</label>
            <input type="password" minlength="8" class="form-control" id="password" name="password" placeholder="পাসওয়ার্ড পরিবর্তন করুন...">
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">পাসওয়ার্ড নিশ্চিত করুন</label>
            <input type="password" minlength="8" class="form-control" id="confirm_password" name="confirm_password"
                placeholder="পাসওয়ার্ড পুনরায় লিখুন...">
            <div id="confirm_password_error" class="form-text"></div>
        </div>
        @if (Auth::user()->userRole->role_name == 'admin' || Auth::user()->userRole->role_name == 'super admin')
            <div class="mb-3">
                <label for="role_id" class="form-label">পদবি নিযুক্ত করুন</label>
                <select class="form-select" aria-label="Default select example" name="role_id" id="role_id">
                    <option selected="true" disabled="disabled">
                        {{ $user->userRole->role_id == 1 ? 'কালেক্টর' : ($user->userRole->role_id == 2 ? 'একাউন্টেন্ট' : ($user->userRole->role_id == 3 ? 'অ্যাডমিন' : ($user->userRole->role_id == 4 ? 'সুপার অ্যাডমিন' : ''))) }}
                    </option>
                    <option value="1">কালেক্টর</option>
                    <option value="2">একাউন্টেন্ট</option>
                    <option value="3">অ্যাডমিন</option>
                    @if (Auth::user()->userRole->role_name == 'super admin')
                        <option value="4">সুপার অ্যাডমিন</option>
                    @endif
                </select>
            </div>
        @endif
        <button type="submit" class="btn btn-primary mb-3" id="submit_button">দাখিল করুন</button>
        <div>
            <a href="{{ url('/user') }}">প্রস্থান করুন</a>
        </div>
    </form>
</x-master>
