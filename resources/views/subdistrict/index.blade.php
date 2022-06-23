<x-master>
    <ul class="nav nav-tabs d-flex justify-content-between">
        <div class="d-flex">
            <li class="nav-item">
                <a class="nav-link link-secondary" aria-current="page" href="/location">স্থান সমূহ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-secondary" href="/district">জেলা</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active bg-light" href="/subdistrict">উপজেলা</a>
            </li>
        </div>
        <div>
            <a href="{{ url('/subdistrict/create') }}" class="btn btn-info">উপজেলা সংযোজন করুন</a>
        </div>
    </ul>
    <table class="table table-striped table-primary table-hover mt-4 w-75 mx-auto">
        <thead class="table-dark">
            <tr>
                <th scope="col">উপজেলার নাম</th>
                <th scope="col">জেলার নাম</th>
                <th scope="col">পরিবর্তন</th>
                {{-- @if (Auth::user()->userRole->role_name != 'operator')
                    <th scope="col">মুছুন</th>
                @endif --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($subdistricts as $subdistrict)
                <tr>
                    <td><a href="/subdistrict/{{ $subdistrict->id }}" class="text-decoration-none">{{ $subdistrict->name }}</a></td>
                    <td><a href="/district/{{ $subdistrict->district->id }}" class="text-decoration-none">{{ $subdistrict->district->name }}</a>
                    </td>
                    <td>
                        <a href="/subdistrict/{{ $subdistrict->id }}/edit" class="btn btn-primary me-2">পরিবর্তন</a>
                    </td>
                    {{-- @if (Auth::user()->userRole->role_name != 'operator')
                        <td>
                            <form method="POST" action="{{ url('/subdistrict', $subdistrict->id) }}" class="d-inline">
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
