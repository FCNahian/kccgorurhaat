<x-master>
    <ul class="nav nav-tabs d-flex justify-content-between">
        <div class="d-flex">
            <li class="nav-item">
                <a class="nav-link link-secondary" aria-current="page" href="/location">স্থান সমূহ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active bg-light" href="/district">জেলা</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-secondary" href="/subdistrict">উপজেলা</a>
            </li>
        </div>
        <div>
            <a href="{{ url('/district/create') }}" class="btn btn-info">জেলা সংযোজন করুন</a>
        </div>
    </ul>
    <table class="table table-striped table-primary table-hover mt-4 w-75 mx-auto">
        <thead class="table-dark">
            <tr>
                <th scope="col" class="w-75">জেলার নাম</th>
                <th scope="col">পরিবর্তন</th>
                {{-- @if (Auth::user()->userRole->role_name != 'operator')
                    <th scope="col">মুছুন</th>
                @endif --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($districts as $district)
                <tr>
                    <td><a href="/district/{{ $district->id }}" class="text-decoration-none">{{ $district->name }}</a></td>
                    <td>
                        <a href="/district/{{ $district->id }}/edit" class="btn btn-primary me-2">পরিবর্তন</a>
                    </td>
                    {{-- @if (Auth::user()->userRole->role_name != 'operator')
                        <td>
                            <form method="POST" action="{{ url('/district', $district->id) }}" class="d-inline">
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
