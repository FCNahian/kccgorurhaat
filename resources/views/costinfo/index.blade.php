<x-master>
    <h4>মূল্য বিবরণী</h4>
    <hr>
    <div>
        <div class="d-flex align-items-center mb-4">
            <div class="d-flex justify-content-between align-items-center w-25 me-5">
                <h5>{{ $costinfos[0]->name }}</h5>
                <h5><span id="cost_info_pole_cost_rate_display">{{ $costinfos[0]->amount }}</span> টাকা</h5>
            </div>
            @if (Auth::user()->userRole->role_name == 'super admin')
                <div class="d-flex align-items-center ms-5">
                    <button class="btn btn-info mx-5" onclick="poleCostEditFormShow()">পরিবর্তন</button>
                    <form class="d-flex ms-5 d-none" method="POST" action="/costinfo/{{ $costinfos[0]->id }}" id="pole-cost-form">
                        @csrf
                        @method('patch')
                        <input type="text" class="form-control w-25" id="cost_info_pole_cost_rate_fake" name="amount_fake"
                            value="{{ $costinfos[0]->amount }}" required>
                        <input style="display: none" type="text" class="form-control w-25" id="cost_info_pole_cost_rate_actual" name="amount"
                            value="{{ $costinfos[0]->amount }}" required>
                        <button type="submit" class="btn btn-success ms-5" id="submit_button">দাখিল করুন</button>
                    </form>
                </div>
            @endif
        </div>
        <div class="d-flex align-items-center">
            <div class="d-flex justify-content-between align-items-center w-25 me-5">
                <h5>{{ $costinfos[1]->name }}</h5>
                <h5><span id="cost_info_tax_rate_display">{{ $costinfos[1]->amount }}</span> %</h5>
            </div>
            @if (Auth::user()->userRole->role_name == 'super admin')
                <div class="d-flex align-items-center ms-5">
                    <button class="btn btn-info mx-5" onclick="taxEditFormShow()">পরিবর্তন</button>
                    <form class="d-flex ms-5 d-none" method="POST" action="/costinfo/{{ $costinfos[1]->id }}" id="tax-form">
                        @csrf
                        @method('patch')
                        <input type="text" class="form-control w-25" id="cost_info_tax_rate_fake" name="amount_fake"
                            value="{{ $costinfos[1]->amount }}" required>
                        <input style="display: none" type="text" class="form-control w-25" id="cost_info_tax_rate_actual" name="amount"
                            value="{{ $costinfos[1]->amount }}" required>
                        <button type="submit" class="btn btn-success ms-5" id="submit_button">দাখিল করুন</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-master>
