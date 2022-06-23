<x-master>
    <h1 class="text-center my-5">পশুর রং সংযোজন করুন</h1>
    <form class="my-5 w-50 mx-auto" method="POST" action="/cattlecolor">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">নাম</label>
            <input type="name" class="form-control" id="name" name="name" placeholder="নতুন রং লিখুন..." required>
        </div>
        <button type="submit" class="btn btn-primary mb-3" id="submit_button">দাখিল করুন</button>
        <div>
            <a href="{{ url('/cattlecolor') }}">প্রস্থান করুন</a>
        </div>
    </form>
</x-master>
