<x-master>
    <h1 class="text-center my-5">জেলা পরিবর্তন করুন</h1>
    <form class="my-5 w-50 mx-auto" method="POST" action="/district/{{ $district->id }}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">নাম</label>
            <input type="name" class="form-control" id="name" name="name" value="{{ $district->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary mb-3" id="submit_button">দাখিল করুন</button>
        <div>
            <a href="{{ url('/district') }}">প্রস্থান করুন</a>
        </div>
    </form>
</x-master>
