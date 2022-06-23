<x-master>
    <h1 class="text-center my-5">উপজেলা সংযোজন করুন</h1>
    <form class="my-5 w-50 mx-auto" method="POST" action="/subdistrict">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">নাম</label>
            <input type="name" class="form-control" id="name" name="name" placeholder="নতুন উপজেলার নাম লিখুন..." required>
        </div>
        <div class="mb-3">
            <label for="district_id" class="form-label">জেলার অধিভুক্ত করুন</label>
            <select class="form-select" aria-label="Default select example" name="district_id" id="district_id" required>
                <option selected="true" disabled="disabled">জেলা নির্বাচন করুন</option>
                @foreach ($districts as $district)
                    <option value="{{ $district->id }}">{{ ucwords($district->name) }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-3" id="submit_button">দাখিল করুন</button>
        <div>
            <a href="{{ url('/subdistrict') }}">প্রস্থান করুন</a>
        </div>
    </form>
</x-master>
