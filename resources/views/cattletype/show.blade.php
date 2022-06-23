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
            <a href="/cattletype/{{ $cattletype->id }}/edit" class="btn btn-info">পশুর ধরণ পরিবর্তন করুন</a>
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
                <td>{{ $cattletype->name }}</td>
            </tr>
        </tbody>
    </table>
</x-master>
