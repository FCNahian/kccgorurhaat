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
            <a href="/district/{{ $district->id }}/edit" class="btn btn-info">জেলা পরিবর্তন করুন</a>
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
        </tbody>
    </table>
</x-master>
