<x-master>
    <div class="d-flex justify-content-between align-items-end w-75 pb-3 mx-auto">
        <h4>ব্যবহারকারীর তথ্য</h4>
        @if (Auth::user()->userRole->role_name == 'super admin' || (Auth::user()->userRole->role_name == 'admin' && ($user->userRole->role_name == 'collector' || $user->userRole->role_name == 'accountant' || Auth::user()->id == $user->id)) || Auth::user()->id == $user->id)
            <div>
                <a href="/user/{{ $user->id }}/edit" class="btn btn-primary">পরিবর্তন</a>
                {{-- @if (Auth::user()->userRole->role_name != 'operator')
                    <form method="POST" action="{{ url('/user', $user->id) }}" class="d-inline">
                        @csrf
                        @method('delete')
                        <input type="submit" value="মুছুন" class="btn btn-danger"></input>
                    </form>
                @endif --}}
            </div>
        @endif
    </div>
    <table class="table table-striped table-primary w-75 mx-auto">
        <tbody>
            <tr>
                <th scope="row" class="table-dark w-25">ইউজার আই.ডি.</th>
                <td class="table-primary user_id_display">{{ $user->user_id }}</td>
            </tr>
            <tr>
                <th scope="row" class="table-dark w-25">নাম</th>
                <td class="table-primary">{{ $user->name }}</td>
            </tr>
            <tr>
                <th scope="row" class="table-dark w-25">ই-মেইল</th>
                <td class="table-primary">{{ $user->email ? $user->email : 'তথ্য প্রদান করা হয়নি' }}</td>
            </tr>
            <tr>
                <th scope="row" class="table-dark w-25">ফোন</th>
                <td class="table-primary user_phone_display">{{ $user->phone ? $user->phone : 'তথ্য প্রদান করা হয়নি' }}</td>
            </tr>
            <tr>
                <th scope="row" class="table-dark w-25">পদবি</th>
                <td class="table-primary">
                    {{ $user->userRole->role_id == 1 ? 'কালেক্টর' : ($user->userRole->role_id == 2 ? 'একাউন্টেন্ট' : ($user->userRole->role_id == 3 ? 'অ্যাডমিন' : ($user->userRole->role_id == 4 ? 'সুপার অ্যাডমিন' : ''))) }}
                </td>
            </tr>
            <tr>
                <th scope="row" class="table-dark w-25">অবস্থা</th>
                <td class="table-primary {{ $user->active ? 'text-success' : 'text-danger' }}">{{ $user->active ? 'লগড ইন' : 'লগড আউট' }}</td>
            </tr>
        </tbody>
    </table>
    <div class="w-75 mx-auto">
        <a href="{{ url('/user') }}">প্রস্থান করুন</a>
    </div>
</x-master>
