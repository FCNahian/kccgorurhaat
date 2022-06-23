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
            <a href="/cattlecolor/{{ $cattlecolor->id }}/edit" class="btn btn-info">পশুর রং পরিবর্তন করুন</a>
        </div>
    </ul>
    <table class="table table-bordered mt-4 w-75 mx-auto">
        <thead class="table-dark">
            <tr>
                <th scope="col">পশুর ধরণ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $cattlecolor->name }}</td>
            </tr>
        </tbody>
    </table>
</x-master>
