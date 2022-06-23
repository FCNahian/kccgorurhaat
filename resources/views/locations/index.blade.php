<x-master>
    <ul class="nav nav-tabs d-flex justify-content-between">
        <div class="d-flex">
            <li class="nav-item">
                <a class="nav-link active bg-light" aria-current="page" href="/location">স্থান সমূহ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-secondary" href="/district">জেলা</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-secondary" href="/subdistrict">উপজেলা</a>
            </li>
        </div>
        <div>
            <a href="{{ url('/district/create') }}" class="btn btn-info">জেলা সংযোজন করুন</a>
            <a href="{{ url('/subdistrict/create') }}" class="btn btn-info">উপজেলা সংযোজন করুন</a>
        </div>
    </ul>
    <table class="table table-bordered mt-4 w-75 mx-auto">
        <thead class="table-dark">
            <tr>
                <th scope="col">জেলা</th>
                <th scope="col">উপজেলা</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($districts as $district)
                <tr>
                    <th scope="row">{{ $district->name }}</th>
                    <td>
                        <table class="table table-borderless">
                            <tbody>
                                @foreach ($district->subDistricts as $subdistrict)
                                    <tr>
                                        <td>{{ $subdistrict->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-master>
