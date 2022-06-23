<x-master>
    <div class="row">
        <div class="col-6">
            <h4>বিক্রয় তথ্যাবলী প্রদান করুন</h4>
        </div>
        <div class="col-5 text-end">
            <div class="btn border border-secondary rounded">
                ক্রমিক নং: <span class="tax-collection-form-seriel-number-display">{{ Auth::user()->last_receipt_seriel_number + 1 }}</span>
            </div>
        </div>
    </div>
    <hr>
    <form id="tax_collection_form">
        @csrf
        <div class="row align-items-start">
            <div class="row col-6">
                <div class="row col-11 bg-info bg-opacity-10 border rounded-3 pt-3">
                    <div class="col-12 pb-2">
                        <h5>বিক্রেতার তথ্য</h5>
                        <hr>
                    </div>
                    <div class="col-3 mb-3">
                        <label for="seller_name" class="form-label col-form-label">নাম</label>
                    </div>
                    <div class="col-9 mb-3">
                        <input type="text" class="form-control" id="seller_name" name="seller_name" placeholder="বিক্রেতার নাম লিখুন..." required>
                    </div>
                    <div class="col-3 mb-3">
                        <label for="seller_father_name" class="form-label col-form-label">পিতার নাম</label>
                    </div>
                    <div class="col-9 mb-3">
                        <input type="text" class="form-control" id="seller_father_name" name="seller_father_name"
                            placeholder="বিক্রেতার পিতার নাম লিখুন...">
                    </div>
                    <div class="col-3 mb-3">
                        <label for="seller_district" class="form-label">জেলা</label>
                    </div>
                    <div class="col-9 mb-3">
                        <select class="form-select" aria-label="Default select example" name="seller_district" id="seller_district">
                            <option selected="true" value="">জেলা নির্বাচন করুন</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 mb-3">
                        <label for="seller_subdistrict" class="form-label">উপজেলা</label>
                    </div>
                    <div class="col-9 mb-3">
                        <select class="form-select" aria-label="Default select example" name="seller_subdistrict" id="seller_subdistrict">
                            <option selected="true" value="">উপজেলা নির্বাচন করুন</option>
                            @foreach ($subdistricts as $subdistrict)
                                <option value="{{ $subdistrict->id }}">{{ $subdistrict->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 mb-3">
                        <label for="seller_village_name" class="form-label col-form-label">গ্রাম</label>
                    </div>
                    <div class="col-9 mb-3">
                        <input type="text" class="form-control" id="seller_village_name" name="seller_village_name"
                            placeholder="বিক্রেতার গ্রামের নাম লিখুন...">
                    </div>
                </div>
            </div>
            <div class="row col-6">
                <div class="row col-11 bg-success bg-opacity-10 border rounded-3 pt-3">
                    <div class="col-12 pb-2">
                        <h5>ক্রেতার তথ্য</h5>
                        <hr>
                    </div>
                    <div class="col-3 mb-3">
                        <label for="buyer_name" class="form-label col-form-label">নাম</label>
                    </div>
                    <div class="col-9 mb-3">
                        <input type="text" class="form-control" id="buyer_name" name="buyer_name" placeholder="ক্রেতার নাম লিখুন..." required>
                    </div>
                    <div class="col-3 mb-3">
                        <label for="buyer_father_name" class="form-label col-form-label">পিতার নাম</label>
                    </div>
                    <div class="col-9 mb-3">
                        <input type="text" class="form-control" id="buyer_father_name" name="buyer_father_name"
                            placeholder="ক্রেতার পিতার নাম লিখুন...">
                    </div>
                    <div class="col-3 mb-3">
                        <label for="buyer_district" class="form-label">জেলা</label>
                    </div>
                    <div class="col-9 mb-3">
                        <select class="form-select" aria-label="Default select example" name="buyer_district" id="buyer_district">
                            <option selected="true" value="">জেলা নির্বাচন করুন</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 mb-3">
                        <label for="buyer_subdistrict" class="form-label">উপজেলা</label>
                    </div>
                    <div class="col-9 mb-3">
                        <select class="form-select" aria-label="Default select example" name="buyer_subdistrict" id="buyer_subdistrict">
                            <option selected="true" value="">উপজেলা নির্বাচন করুন</option>
                            @foreach ($subdistricts as $subdistrict)
                                <option value="{{ $subdistrict->id }}">{{ $subdistrict->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 mb-3">
                        <label for="buyer_village_name" class="form-label col-form-label">গ্রাম</label>
                    </div>
                    <div class="col-9 mb-3">
                        <input type="text" class="form-control" id="buyer_village_name" name="buyer_village_name"
                            placeholder="ক্রেতার গ্রামের নাম লিখুন...">
                    </div>
                </div>
            </div>
            <div class="row col-6 mt-3">
                <div class="row col-11 bg-warning bg-opacity-10 border rounded-3 pt-3">
                    <div class="col-12 pb-2">
                        <h5>পশুর তথ্য</h5>
                        <hr>
                    </div>
                    <div class="col-3 mb-3">
                        <label for="cattletype_id" class="form-label">পশুর ধরণ</label>
                    </div>
                    <div class="col-9 mb-3">
                        <select class="form-select" aria-label="Default select example" name="cattletype_id" id="cattletype_id" required>
                            <option selected="true" disabled="disabled">পশুর ধরণ নির্বাচন করুন</option>
                            @foreach ($cattletypes as $cattletype)
                                <option value="{{ $cattletype->id }}">{{ $cattletype->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 mb-3">
                        <label for="cattlecolor_id" class="form-label">পশুর রং</label>
                    </div>
                    <div class="col-9 mb-3">
                        <select class="form-select" aria-label="Default select example" name="cattlecolor_id" id="cattlecolor_id">
                            <option selected="true" disabled="disabled">পশুর রং নির্বাচন করুন</option>
                            @foreach ($cattlecolors as $cattlecolor)
                                <option value="{{ $cattlecolor->id }}">{{ $cattlecolor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row col-11 pt-5">
                    <div class="col-4 mb-3 d-grid">
                        <input id="tax-form-reset" type="reset" class="btn btn-outline-primary btn-lg" type="button" value="ফর্ম রিসেট করুন">
                    </div>
                    <div class="col-4 mb-3 d-grid">
                        <button id="submit-and-save" class="btn btn-outline-success btn-lg" type="button">সেভ করুন</button>
                    </div>
                    <div class="col-4 mb-3 d-grid">
                        <button id="submit-and-print" class="btn btn-outline-danger btn-lg" type="button">সেভ এবং প্রিন্ট</button>
                    </div>
                </div>
            </div>
            <div class="row col-6 mt-3">
                <div class="row col-11 bg-danger bg-opacity-10 border rounded-3 pt-3">
                    <div class="col-12 pb-2">
                        <h5>মূল্য বিবরণী</h5>
                        <hr>
                    </div>
                    <div class="col-3 mb-3">
                        <label for="sale_price" class="form-label col-form-label">বিক্রয় মূল্য (টাকা)</label>
                    </div>
                    <div class="col-3 mb-3">
                        <input type="text" maxlength="9" class="form-control" id="sale_price" name="sale_price" placeholder="বিক্রয় মূল্য"
                            required>
                    </div>
                    <div class="col-3 mb-3">
                        <label for="pole_count" class="form-label col-form-label">খুঁটির সংখ্যা</label>
                    </div>
                    <div class="col-3 mb-3">
                        <input type="text" class="form-control" id="pole_count" name="pole_count" value="1" placeholder="খুঁটির সংখ্যা"
                            required>
                    </div>
                    <div class="col-3 mb-3">
                        <label for="tax_rate" class="form-label col-form-label">খাজনার হার (%)</label>
                    </div>
                    <div class="col-3 mb-3">
                        <input type="text" class="form-control" id="tax_rate" name="tax_rate" value="{{ $costinfos[1]->amount }}"
                            placeholder="{{ $costinfos[1]->amount }}%" readonly required>
                    </div>
                    <div class="col-3 mb-3">
                        <label for="pole_cost_rate" class="form-label col-form-label">প্রতি খুঁটির মূল্য (টাকা)</label>
                    </div>
                    <div class="col-3 mb-3">
                        <input type="text" class="form-control" id="pole_cost_rate" name="pole_cost_rate"
                            value="{{ $costinfos[0]->amount }}" placeholder="{{ $costinfos[0]->amount }}" readonly required>
                    </div>
                    <div class="col-3 mb-3">
                        <label for="tax" class="form-label col-form-label">মোট খাজনা (টাকা)</label>
                    </div>
                    <div class="col-3 mb-3">
                        <input type="text" class="form-control" id="tax" name="tax" placeholder="মোট খাজনা" readonly required>
                    </div>
                    <div class="col-3 mb-3">
                        <label for="pole_cost" class="form-label col-form-label">খুঁটির মূল্য (টাকা)</label>
                    </div>
                    <div class="col-3 mb-3">
                        <input type="text" class="form-control" id="pole_cost" name="pole_cost" placeholder="খুঁটির মূল্য" readonly required>
                    </div>
                    <div class="col-6 mb-3"></div>
                    <div class="col-3 mb-3">
                        <label for="total_cost" class="form-label col-form-label">মোট মূল্য (টাকা)</label>
                    </div>
                    <div class="col-3 mb-3">
                        <input type="text" class="form-control" id="total_cost" name="total_cost" placeholder="মোট মূল্য" readonly required>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                {{-- <button id="submit" class="btn btn-primary">SAVE</button> --}}
            </div>
        </div>
    </form>
    <div style="display: none" id="print-receipt">
        <div id="printable-area">
            <div class="row pt-5 ms-1">
                <div class="row col-6">
                    <div class="row col-12 justify-content-center border-end">
                        <div class="col-2">
                            <img width="100%" src="{{ asset('assets/images/logo.png') }}" alt="">
                        </div>
                        <div class="col-6 text-center">
                            <h5>খুলনা সিটি কর্পোরেশন</h5>
                            <h6>কোরবানির পশুরহাট-২০২২</h6>
                            <h6>পশু বিক্রয় রশিদ</h6>
                        </div>
                        <div class="col-3 align-self-end">
                            <h6>অফিস কপি</h6>
                        </div>
                        <div class="col-12 pt-3">
                            <ul class="list-group bg-light">
                                <li class="list-group-item bg-light border-secondary">
                                    <div class="row">
                                        <div class="col-2">ক্রমিক নং:</div>
                                        <div class="col-2 text-end seriel_number_display">১২৩৪</div>
                                        <div class="col-8 text-end">তারিখ: <span class="date_display">১০/০৫/২০২২</span></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="row col-12 pt-3">
                            <div class="col-3">বিক্রেতার নাম:</div>
                            <div class="col-5 seller_name_display">আনিসুল হক</div>
                            <div class="col-4 text-end">সময়: <span class="time_display">৫:৩০:০৫ পিএম</span></div>
                        </div>
                        <div class="row col-12 pt-1">
                            <div class="col-3">পিতার নাম:</div>
                            <div class="col-9 seller_father_name_display">আনিসুল হক</div>
                        </div>
                        <div class="row col-12 pt-1">
                            <div class="col-3">গ্রাম:</div>
                            <div class="col-3 seller_village_name_display">রূপসা</div>
                            <div class="col-3">উপজেলা:</div>
                            <div class="col-3 seller_subdistrict_display">রূপসা</div>
                        </div>
                        <div class="row col-12 pt-1">
                            <div class="col-3">জেলা:</div>
                            <div class="col-9 seller_district_display">খুলনা</div>
                        </div>
                        <div class="row col-12 pt-3">
                            <div class="col-3">ক্রেতার নাম:</div>
                            <div class="col-9 buyer_name_display">আনিসুল হক</div>
                        </div>
                        <div class="row col-12 pt-1">
                            <div class="col-3">পিতার নাম:</div>
                            <div class="col-9 buyer_father_name_display">আনিসুল হক</div>
                        </div>
                        <div class="row col-12 pt-1">
                            <div class="col-3">গ্রাম:</div>
                            <div class="col-3 buyer_village_name_display">রূপসা</div>
                            <div class="col-3">উপজেলা:</div>
                            <div class="col-3 buyer_subdistrict_display">রূপসা</div>
                        </div>
                        <div class="row col-12 pt-1">
                            <div class="col-3">জেলা:</div>
                            <div class="col-9 buyer_district_display">খুলনা</div>
                        </div>
                        <div class="row col-12 pt-3">
                            <div class="col-3">পশুর ধরণ:</div>
                            <div class="col-3 cattletype_name_display">গরু</div>
                            <div class="col-3">পশুর রং:</div>
                            <div class="col-3 cattlecolor_name_display">সাদা</div>
                        </div>
                        <div class="row col-12 pt-3">
                            <div class="col-3">বিক্রয় মূল্য (টাকা):</div>
                            <div class="col-3 text-end sale_price_display">৫০,০০০.০০</div>
                            <div class="col-6"></div>
                            <div class="col-3">খাজনা (টাকা):</div>
                            <div class="col-3 text-end tax_display">২,৫০০.০০</div>
                            <div class="col-6"></div>
                            <div class="col-3">খুঁটির মূল্য (টাকা):</div>
                            <div class="col-3 text-end pole_cost_display">৫০.০০</div>
                            <div class="col-6">(<span class="pole_cost_rate_display">৫০</span>×<span class="pole_count_display">১</span>)
                            </div>
                            <div class="col-3 pt-2">মোট মূল্য (টাকা):</div>
                            <div class="col-3 pt-2 text-end total_cost_display">২,৫৫০.০০</div>
                            <div class="col-6 pt-2"></div>
                        </div>
                        <div class="row col-12 pt-3">
                            <div class="col-12 total_cost_text_display">দুই হাজার পাঁচ শত পঞ্চাশ টাকা মাত্র</div>
                        </div>
                        <div class="row col-12 align-items-end">
                            <div class="col-6">
                                <div class="operator_name_display">আনিসুল হক</div>
                                <div>আদায়কারী</div>
                            </div>
                            <div class="col-6">
                                <div class="col-6 mx-auto">
                                    <img width="100%" src="{{ asset('assets/images/signature.png') }}" alt="">
                                </div>
                                <div class="text-center">মেয়র</div>
                                <div class="text-center">খুলনা সিটি কর্পোরেশন</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-6">
                    <div class="row col-12 justify-content-center">
                        <div class="col-2">
                            <img width="100%" src="{{ asset('assets/images/logo.png') }}" alt="">
                        </div>
                        <div class="col-6 text-center">
                            <h5>খুলনা সিটি কর্পোরেশন</h5>
                            <h6>কোরবানির পশুরহাট-২০২২</h6>
                            <h6>পশু বিক্রয় রশিদ</h6>
                        </div>
                        <div class="col-3 align-self-end">
                            <h6>গ্রাহক কপি</h6>
                        </div>
                        <div class="col-12 pt-3">
                            <ul class="list-group bg-light">
                                <li class="list-group-item bg-light border-secondary">
                                    <div class="row">
                                        <div class="col-2">ক্রমিক নং:</div>
                                        <div class="col-2 text-end seriel_number_display">১২৩৪</div>
                                        <div class="col-8 text-end">তারিখ: <span class="date_display">১০/০৫/২০২২</span></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="row col-12 pt-3">
                            <div class="col-3">বিক্রেতার নাম:</div>
                            <div class="col-5 seller_name_display">আনিসুল হক</div>
                            <div class="col-4 text-end">সময়: <span class="time_display">৫:৩০:০৫ পিএম</span></div>
                        </div>
                        <div class="row col-12 pt-1">
                            <div class="col-3">পিতার নাম:</div>
                            <div class="col-9 seller_father_name_display">আনিসুল হক</div>
                        </div>
                        <div class="row col-12 pt-1">
                            <div class="col-3">গ্রাম:</div>
                            <div class="col-3 seller_village_name_display">রূপসা</div>
                            <div class="col-3">উপজেলা:</div>
                            <div class="col-3 seller_subdistrict_display">রূপসা</div>
                        </div>
                        <div class="row col-12 pt-1">
                            <div class="col-3">জেলা:</div>
                            <div class="col-9 seller_district_display">খুলনা</div>
                        </div>
                        <div class="row col-12 pt-3">
                            <div class="col-3">ক্রেতার নাম:</div>
                            <div class="col-9 buyer_name_display">আনিসুল হক</div>
                        </div>
                        <div class="row col-12 pt-1">
                            <div class="col-3">পিতার নাম:</div>
                            <div class="col-9 buyer_father_name_display">আনিসুল হক</div>
                        </div>
                        <div class="row col-12 pt-1">
                            <div class="col-3">গ্রাম:</div>
                            <div class="col-3 buyer_village_name_display">রূপসা</div>
                            <div class="col-3">উপজেলা:</div>
                            <div class="col-3 buyer_subdistrict_display">রূপসা</div>
                        </div>
                        <div class="row col-12 pt-1">
                            <div class="col-3">জেলা:</div>
                            <div class="col-9 buyer_district_display">খুলনা</div>
                        </div>
                        <div class="row col-12 pt-3">
                            <div class="col-3">পশুর ধরণ:</div>
                            <div class="col-3 cattletype_name_display">গরু</div>
                            <div class="col-3">পশুর রং:</div>
                            <div class="col-3 cattlecolor_name_display">সাদা</div>
                        </div>
                        <div class="row col-12 pt-3">
                            <div class="col-3">বিক্রয় মূল্য (টাকা):</div>
                            <div class="col-3 text-end sale_price_display">৫০,০০০.০০</div>
                            <div class="col-6"></div>
                            <div class="col-3">খাজনা (টাকা):</div>
                            <div class="col-3 text-end tax_display">২,৫০০.০০</div>
                            <div class="col-6"></div>
                            <div class="col-3">খুঁটির মূল্য (টাকা):</div>
                            <div class="col-3 text-end pole_cost_display">৫০.০০</div>
                            <div class="col-6">(<span class="pole_cost_rate_display">৫০</span>×<span class="pole_count_display">১</span>)
                            </div>
                            <div class="col-3 pt-2">মোট মূল্য (টাকা):</div>
                            <div class="col-3 pt-2 text-end total_cost_display">২,৫৫০.০০</div>
                            <div class="col-6 pt-2"></div>
                        </div>
                        <div class="row col-12 pt-3">
                            <div class="col-12 total_cost_text_display">দুই হাজার পাঁচ শত পঞ্চাশ টাকা মাত্র</div>
                        </div>
                        <div class="row col-12 align-items-end">
                            <div class="col-6">
                                <div class="operator_name_display">আনিসুল হক</div>
                                <div>আদায়কারী</div>
                            </div>
                            <div class="col-6">
                                <div class="col-6 mx-auto">
                                    <img width="100%" src="{{ asset('assets/images/signature.png') }}" alt="">
                                </div>
                                <div class="text-center">মেয়র</div>
                                <div class="text-center">খুলনা সিটি কর্পোরেশন</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>
