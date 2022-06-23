<x-master>
    <ul class="nav nav-tabs d-flex justify-content-between">
        <div class="d-flex">
            <li class="nav-item">
                <a class="nav-link link-secondary" aria-current="page" href="/cattletype">পশুর ধরণ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active bg-light" href="/cattlecolor">পশুর রং</a>
            </li>
        </div>
        <div>
            <a href="{{ url('/cattlecolor/create') }}" class="btn btn-info">পশুর রং সংযোজন করুন</a>
        </div>
    </ul>
    <table class="table table-striped table-primary table-hover mt-4 w-75 mx-auto">
        <thead class="table-dark">
            <tr>
                <th scope="col" class="w-75">পশুর রং</th>
                <th scope="col">পরিবর্তন</th>
                {{-- @if (Auth::user()->userRole->role_name != 'operator')
                    <th scope="col">মুছুন</th>
                @endif --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($cattlecolors as $cattlecolor)
                <tr>
                    <td><a href="/cattlecolor/{{ $cattlecolor->id }}" class="text-decoration-none">{{ $cattlecolor->name }}</a></td>
                    <td>
                        <a href="/cattlecolor/{{ $cattlecolor->id }}/edit" class="btn btn-primary me-2">পরিবর্তন</a>
                    </td>
                    {{-- @if (Auth::user()->userRole->role_name != 'operator')
                        <td>
                            <form method="POST" action="{{ url('/cattlecolor', $cattlecolor->id) }}" class="d-inline">
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
