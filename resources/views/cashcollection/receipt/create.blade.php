<x-master>
    <h4>ক্যাশ গ্রহণ রিসিট প্রস্তুত করুন</h4>
    <hr>
    <form class="my-5 w-50 mx-auto" id="cash_collection_receipt_form">
        @csrf
        <div class="mb-3">
            <label for="tax_collector_id" class="form-label">ট্যাক্স কালেক্টর</label>
            <select class="form-select" aria-label="Default select example" name="tax_collector_user_id" id="tax_collector_user_id">
                <option selected="true" value="">কালেক্টর নির্বাচন করুন</option>
                @foreach ($collectors as $collector)
                    <option value="{{ $collector->user_id }}">{{ $collector->name }}</option>
                @endforeach
            </select>
        </div>
        <div style="display: none" id="cash_collection_receipt_form_expansion">
            <div class="mb-3">
                <label for="tax_collection_seriel_start" class="form-label">সর্বশেষ জমাকৃত রিসিট এর সিরিয়াল নম্বর</label>
                <input type="text" class="form-control" id="tax_collection_seriel_start_fake" name="tax_collection_seriel_start_fake"
                    value="" placeholder="ট্যাক্স কালেক্টর এর সর্বশেষ জমাকৃত রিসিট এর সিরিয়াল নম্বর প্রদান করুন..." required disabled>
                <input style="display: none" type="text" class="form-control" id="tax_collection_seriel_start_actual"
                    name="tax_collection_seriel_start" value=""
                    placeholder="ট্যাক্স কালেক্টর এর সর্বশেষ জমাকৃত রিসিট এর সিরিয়াল নম্বর প্রদান করুন..." required>
            </div>
            <div class="mb-3">
                <label for="tax_collection_seriel_end" class="form-label">সর্বশেষ আদায়কৃত রিসিট এর সিরিয়াল নম্বর</label>
                <input type="text" class="form-control" id="tax_collection_seriel_end_fake" name="tax_collection_seriel_end_fake" value=""
                    placeholder="ট্যাক্স কালেক্টর এর সর্বশেষ আদায়কৃত রিসিট এর সিরিয়াল নম্বর প্রদান করুন..." required disabled>
                <input style="display: none" type="text" class="form-control" id="tax_collection_seriel_end_actual"
                    name="tax_collection_seriel_end" value=""
                    placeholder="ট্যাক্স কালেক্টর এর সর্বশেষ আদায়কৃত রিসিট এর সিরিয়াল নম্বর প্রদান করুন..." required>
            </div>
            <div class="mb-3">
                <label for="pole_count" class="form-label">ট্যাক্স আদায়কৃত খুঁটির সংখ্যা</label>
                <input type="text" class="form-control" id="pole_count_fake" name="pole_count_fake" value=""
                    placeholder="ট্যাক্স আদায়কৃত খুঁটির সংখ্যা প্রদান করুন..." required disabled>
                <input style="display: none" type="text" class="form-control" id="pole_count_actual" name="pole_count" value=""
                    placeholder="ট্যাক্স আদায়কৃত খুঁটির সংখ্যা প্রদান করুন..." required>
            </div>
            <div class="mb-3">
                <label for="pole_cost" class="form-label">ট্যাক্স আদায়কৃত খুঁটির মূল্য (টাকা)</label>
                <input type="text" class="form-control" id="pole_cost_fake" name="pole_cost_fake" value=""
                    placeholder="ট্যাক্স আদায়কৃত খুঁটির মূল্য প্রদান করুন..." required disabled>
                <input style="display: none" type="text" class="form-control" id="pole_cost_actual" name="pole_cost" value=""
                    placeholder="ট্যাক্স আদায়কৃত খুঁটির মূল্য প্রদান করুন..." required>
            </div>
            <div class="mb-3">
                <label for="tax" class="form-label">আদায়কৃত পশুর খাজনা (টাকা)</label>
                <input type="text" class="form-control" id="tax_fake" name="tax_fake" value=""
                    placeholder="আদায়কৃত পশুর খাজনা প্রদান করুন..." required disabled>
                <input style="display: none" type="text" class="form-control" id="tax_actual" name="tax" value=""
                    placeholder="আদায়কৃত পশুর খাজনা প্রদান করুন..." required>
            </div>
            <div class="mb-3">
                <label for="total_cash" class="form-label">আদায়কৃত মোট অর্থ (টাকা)</label>
                <input type="text" class="form-control" id="total_cash_fake" name="total_cash_fake" value=""
                    placeholder="আদায়কৃত মোট অর্থ প্রদান করুন..." required disabled>
                <input style="display: none" type="text" class="form-control" id="total_cash_actual" name="total_cash" value=""
                    placeholder="আদায়কৃত মোট অর্থ প্রদান করুন..." required>
            </div>
        </div>
        <button type="button" class="btn btn-primary mb-3" id="cash_receipt_submit">দাখিল করুন</button>
    </form>
    <div style="display: none" id="print_cash_receipt">
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
                            <h6>ক্যাশ কালেকশন রশিদ</h6>
                        </div>
                        <div class="col-3 align-self-end">
                            <h6>অফিস কপি</h6>
                        </div>
                        <div class="col-12 pt-3">
                            <ul class="list-group bg-light">
                                <li class="list-group-item bg-light border-secondary">
                                    <div class="row">
                                        <div class="col-2">রশিদ নং:</div>
                                        <div class="col-2 text-end cash_receipt_seriel_number_display">১২৩৪</div>
                                        <div class="col-8 text-end">তারিখ: <span class="cash_receipt_date_display">১০/০৫/২০২২</span></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="row col-12 pt-3">
                            <div class="col-5">খাজনা আদায়কারী:</div>
                            <div class="col-3 text-end tax_collector_name_display">আনিসুল হক</div>
                            <div class="col-4 text-end">সময়: <span class="cash_receipt_time_display">৫:৩০:০৫ পিএম</span></div>
                        </div>
                        <div class="row col-12 pt-3">
                            <div class="col-5">খাজনা আদায় রশিদের সিরিয়াল নম্বর:</div>
                            <div class="col-3 text-end tax_collectoin_receipt_seriel_number_display">১১০০০১ - ১১০০০১</div>
                            <div class="col-4"></div>
                        </div>
                        <div class="row col-12 pt-3">
                            <div class="col-5">ট্যাক্স আদায়কৃত খুঁটির মূল্য (টাকা):</div>
                            <div class="col-3 text-end tax_received_pole_cost_display">১১,০০০.০০</div>
                            <div class="col-4"></div>
                            <div class="col-5">ট্যাক্স আদায়কৃত খুঁটির সংখ্যা:</div>
                            <div class="col-3 text-end tax_received_pole_count_display">১০০০</div>
                            <div class="col-4"></div>
                            <div class="col-5">আদায়কৃত পশুর খাজনা (টাকা):</div>
                            <div class="col-3 text-end received_tax_display">১১,০০০.০০</div>
                            <div class="col-4"></div>
                            <div class="col-5 pt-2">আদায়কৃত মোট অর্থ (টাকা):</div>
                            <div class="col-3 pt-2 text-end received_total_cost_display">১১,০০০.০০</div>
                            <div class="col-4 pt-2"></div>
                        </div>
                        <div class="row col-12 pt-2">
                            <div class="col-12 received_total_cost_text_display">দুই হাজার পাঁচ শত পঞ্চাশ টাকা মাত্র</div>
                        </div>
                        <div class="row col-12 align-items-end">
                            <div class="col-6">
                                <div class="cash_collector_name_display">আনিসুল হক</div>
                                <div>ক্যাশ আদায়কারী</div>
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
                            <h6>ক্যাশ কালেকশন রশিদ</h6>
                        </div>
                        <div class="col-3 align-self-end">
                            <h6>কালেক্টর কপি</h6>
                        </div>
                        <div class="col-12 pt-3">
                            <ul class="list-group bg-light">
                                <li class="list-group-item bg-light border-secondary">
                                    <div class="row">
                                        <div class="col-2">রশিদ নং:</div>
                                        <div class="col-2 text-end cash_receipt_seriel_number_display">১২৩৪</div>
                                        <div class="col-8 text-end">তারিখ: <span class="cash_receipt_date_display">১০/০৫/২০২২</span></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="row col-12 pt-3">
                            <div class="col-5">খাজনা আদায়কারী:</div>
                            <div class="col-3 text-end tax_collector_name_display">আনিসুল হক</div>
                            <div class="col-4 text-end">সময়: <span class="cash_receipt_time_display">৫:৩০:০৫ পিএম</span></div>
                        </div>
                        <div class="row col-12 pt-3">
                            <div class="col-5">খাজনা আদায় রশিদের সিরিয়াল নম্বর:</div>
                            <div class="col-3 text-end tax_collectoin_receipt_seriel_number_display">১১০০০১ - ১১০০০১</div>
                            <div class="col-4"></div>
                        </div>
                        <div class="row col-12 pt-3">
                            <div class="col-5">ট্যাক্স আদায়কৃত খুঁটির মূল্য (টাকা):</div>
                            <div class="col-3 text-end tax_received_pole_cost_display">১১,০০০.০০</div>
                            <div class="col-4"></div>
                            <div class="col-5">ট্যাক্স আদায়কৃত খুঁটির সংখ্যা:</div>
                            <div class="col-3 text-end tax_received_pole_count_display">১০০০</div>
                            <div class="col-4"></div>
                            <div class="col-5">আদায়কৃত পশুর খাজনা (টাকা):</div>
                            <div class="col-3 text-end received_tax_display">১১,০০০.০০</div>
                            <div class="col-4"></div>
                            <div class="col-5 pt-2">আদায়কৃত মোট অর্থ (টাকা):</div>
                            <div class="col-3 pt-2 text-end received_total_cost_display">১১,০০০.০০</div>
                            <div class="col-4 pt-2"></div>
                        </div>
                        <div class="row col-12 pt-2">
                            <div class="col-12 received_total_cost_text_display">দুই হাজার পাঁচ শত পঞ্চাশ টাকা মাত্র</div>
                        </div>
                        <div class="row col-12 align-items-end">
                            <div class="col-6">
                                <div class="cash_collector_name_display">আনিসুল হক</div>
                                <div>ক্যাশ আদায়কারী</div>
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
