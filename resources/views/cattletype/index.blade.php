<x-master>
    <ul class="nav nav-tabs d-flex justify-content-between">
        <div class="d-flex">
            <li class="nav-item">
                <a class="nav-link active bg-light" aria-current="page" href="/cattletype">পশুর ধরণ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-secondary" href="/cattlecolor">পশুর রং</a>
            </li>
        </div>
        <div>
            <a href="{{ url('/cattletype/create') }}" class="btn btn-info">পশুর ধরণ সংযোজন করুন</a>
        </div>
    </ul>
    <table class="table table-striped table-primary table-hover mt-4 w-75 mx-auto">
        <thead class="table-dark">
            <tr>
                <th scope="col" class="w-75">পশুর ধরণ</th>
                <th scope="col">পরিবর্তন</th>
                {{-- @if (Auth::user()->userRole->role_name != 'operator')
                    <th scope="col">মুছুন</th>
                @endif --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($cattletypes as $cattletype)
                <tr>
                    <td><a href="/cattletype/{{ $cattletype->id }}" class="text-decoration-none">{{ $cattletype->name }}</a></td>
                    <td>
                        <a href="/cattletype/{{ $cattletype->id }}/edit" class="btn btn-primary me-2">পরিবর্তন</a>
                    </td>
                    {{-- @if (Auth::user()->userRole->role_name != 'operator')
                        <td>
                            <form method="POST" action="{{ url('/cattletype', $cattletype->id) }}" class="d-inline">
                                @csrf
                                @method('delete')
                                <input type="submit" value="মুছুন" class="btn btn-danger"></input>
                            </form>
                        </td>
                    @endif --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</x-master>
