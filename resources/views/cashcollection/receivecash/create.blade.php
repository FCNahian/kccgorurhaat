<x-master>
    <h4>ক্যাশ গ্রহণ</h4>
    <hr>
    <table class="table table-striped table-primary table-hover">
        <thead>
            <tr class="table-dark">
                <th scope="col">ক্যাশ কালেকশন রশিদ নম্বর</th>
                <th scope="col">খাজনা আদায়কারী</th>
                <th scope="col">খাজনা আদায় রশিদের সিরিয়াল</th>
                <th scope="col">আদায়কৃত মোট অর্থ (টাকা)</th>
                <th scope="col">অবস্থা</th>
                <th scope="col">ক্যাশ গ্রহণ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($uncollectedcashes as $uncollectedcash)
                <tr id="row_{{ $uncollectedcash->cash_receipt_seriel_number }}">
                    <td class="cash_receipt_seriel_number_display_html">{{ $uncollectedcash->cash_receipt_seriel_number }}</td>
                    <td>{{ $uncollectedcash->taxCollector->name }}</td>
                    <td class="tax_collection_seriel_number_display_html">{{ $uncollectedcash->tax_collection_seriel_start }} -
                        {{ $uncollectedcash->tax_collection_seriel_end }}</td>
                    <td class="total_cash_display_html">{{ $uncollectedcash->total_cash }}</td>
                    <td>{{ $uncollectedcash->cash_collection_completed != 1 ? 'ক্যাশ গ্রহণ করা হয়নি' : 'ক্যাশ গ্রহণ করা হয়েছে' }}</td>
                    <td>
                        <form id="cash_receive_form">
                            @csrf
                            <input style="display: none" type="number" value="{{ $uncollectedcash->cash_receipt_seriel_number }}"
                                name="cash_receipt_seriel_number"
                                id="cash_receipt_seriel_number_input_{{ $uncollectedcash->cash_receipt_seriel_number }}">
                            <button class="btn btn-primary cash_receive_submit" id="{{ $uncollectedcash->cash_receipt_seriel_number }}">ক্যাশ গ্রহণ
                                করুন</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="display: none" id="print_cash_receive_receipt">
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
                            <div class="col-4">
                                <div class="cash_collector_name_display">আনিসুল হক</div>
                                <div>ক্যাশ আদায়কারী</div>
                            </div>
                            <div class="col-4">
                                <div class="border rounded-3 border-2 border-dark btn text-center py-auto">
                                    <div class="border rounded-3 border-2 border-dark btn fs-5">ক্যাশ আদায়কৃত</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="col-10 mx-auto">
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
                            <div class="col-4">
                                <div class="cash_collector_name_display">আনিসুল হক</div>
                                <div>ক্যাশ আদায়কারী</div>
                            </div>
                            <div class="col-4">
                                <div class="border rounded-3 border-2 border-dark btn text-center py-auto">
                                    <div class="border rounded-3 border-2 border-dark btn fs-5">ক্যাশ আদায়কৃত</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="col-10 mx-auto">
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
