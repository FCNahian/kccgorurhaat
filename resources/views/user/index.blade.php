<x-master>
    <div class="d-flex justify-content-between align-items-end pb-3">
        <h4>সকল ব্যবহারকারী</h4>
        @if (Auth::user()->userRole->role_name == 'admin' || Auth::user()->userRole->role_name == 'super admin')
            <a href="{{ url('/user/create') }}" class="btn btn-success">নতুন ব্যবহারকারী যুক্ত করুন</a>
        @endif
    </div>
    <table class="table table-striped table-primary table-hover">
        <thead>
            <tr class="table-dark">
                <th scope="col">ইউজার আই.ডি.</th>
                <th scope="col">নাম</th>
                <th scope="col">ফোন</th>
                <th scope="col">ই-মেইল</th>
                <th scope="col">পদবি</th>
                <th scope="col">অবস্থা</th>
                <th scope="col">পরিবর্তন</th>
                {{-- @if (Auth::user()->userRole->role_name != 'operator')
                    <th scope="col">মুছুন</th>
                @endif --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="user_id_display">{{ $user->user_id }}</td>
                    <td><a href="{{ url('/user', $user->id) }}" class="text-decoration-none">{{ $user->name }}</a></td>
                    <td class="user_phone_display">{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->userRole->role_id == 1 ? 'কালেক্টর' : ($user->userRole->role_id == 2 ? 'একাউন্টেন্ট' : ($user->userRole->role_id == 3 ? 'অ্যাডমিন' : ($user->userRole->role_id == 4 ? 'সুপার অ্যাডমিন' : ''))) }}
                    </td>
                    <td class="{{ $user->active ? 'text-success' : 'text-danger' }}">{{ $user->active ? 'লগড ইন' : 'লগড আউট' }}</td>
                    <td>
                        @if (Auth::user()->userRole->role_name == 'super admin' || (Auth::user()->userRole->role_name == 'admin' && ($user->userRole->role_name == 'collector' || $user->userRole->role_name == 'accountant' || Auth::user()->id == $user->id)) || Auth::user()->id == $user->id)
                            <a href="/user/{{ $user->id }}/edit" class="btn btn-primary me-2">পরিবর্তন</a>
                        @endif
                    </td>
                    {{-- @if (Auth::user()->userRole->role_name != 'operator')
                        <td>
                            @if (Auth::user()->userRole->role_name == 'super admin' || (Auth::user()->userRole->role_name == 'admin' && ($user->userRole->role_name == 'operator' || Auth::user()->id == $user->id)) || Auth::user()->id == $user->id)
                                <form method="POST" action="{{ url('/user', $user->id) }}" class="d-inline">

                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="মুছুন" class="btn btn-danger"></input>
                                </form>
                            @endif
                        </td>
                    @endif --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</x-master>
