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
            <a href="/subdistrict/{{ $subdistrict->id }}/edit" class="btn btn-info">উপজেলা পরিবর্তন করুন</a>
        </div>
    </ul>
    <table class="table table-bordered mt-4 w-75 mx-auto">
        <thead class="table-dark">
            <tr>
                <th scope="col">উপজেলা</th>
                <th scope="col">জেলা</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $subdistrict->name }}</td>
                <td>{{ $subdistrict->district->name }}</td>
            </tr>
        </tbody>
    </table>
</x-master>
