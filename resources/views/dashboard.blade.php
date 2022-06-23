<x-master>
    <h1 class="text-center"><span class="text-success">কে.সি.সি. গরুর হাট</span> <span class="text-danger">২০২২</span></h1>
    <div class="row justify-content-around my-5 px-5">
        <div class="col-3" id="dashboard-analytics">
            <div class="bg-info bg-opacity-10 border rounded-2 text-center py-5">
                <h2 class="text-danger" id="total-cattle-sale-display">00</h2>
                <h3 class="mt-5 text-success">বিকৃত পশুর সংখ্যা</h3>
            </div>
        </div>
        <div class="col-3">
            <div class="bg-success bg-opacity-10 border rounded-2 text-center py-5">
                <h2 class="text-danger" id="total-sale-price-display">00</h2>
                <h3 class="mt-5 text-success">বিকৃত পশুর মূল্য</h3>
            </div>
        </div>
        <div class="col-3">
            <div class="bg-warning bg-opacity-10 border rounded-2 text-center py-5">
                <h2 class="text-danger" id="total-tax-collection-display">00</h2>
                <h3 class="mt-5 text-success">মোট আদায়কৃত কর</h3>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <h4 class="text-center text-secondary">সফটওয়্যার ন্যাভিগেশন</h4>
        <div class="row justify-content-around mt-5">
            <div class="col-2 rounded-2 bg-primary bg-opacity-10 border text-center py-5">
                <a class="text-decoration-none text-dark" href="/taxcollection">
                    <div class="mb-3">
                        <svg width="50" height="50" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                            <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                            <path
                                d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                        </svg>
                    </div>
                    <h4>খাজনা আদায়</h4>
                </a>
            </div>
            <div class="col-2 rounded-2 bg-warning bg-opacity-10 border text-center py-5">
                <a class="text-decoration-none text-dark" href="/user">
                    <div class="mb-3">
                        <svg width="50" height="50" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd"
                                d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                        </svg>
                    </div>
                    <h4>ব্যবহারকারী</h4>
                </a>
            </div>
            <div class="col-2 rounded-2 bg-success bg-opacity-10 border text-center py-5">
                <a class="text-decoration-none text-dark" href="/location">
                    <div class="mb-3">
                        <svg width="50" height="50" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path
                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                    </div>
                    <h4>স্থান বিবরণী</h4>
                </a>
            </div>
            <div class="col-2 rounded-2 bg-danger bg-opacity-10 border text-center py-5">
                <a class="text-decoration-none text-dark" href="/cattletype">
                    <div class="mb-3">
                        <svg width="50" height="50" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                    </div>
                    <h4>পশু বিবরণী</h4>
                </a>
            </div>
            <div class="col-2 rounded-2 bg-info bg-opacity-10 border text-center py-5">
                <a class="text-decoration-none text-dark" href="/settings">
                    <div class="mb-3">
                        <svg width="50" height="50" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path
                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                            <path
                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                        </svg>
                    </div>
                    <h4>সেটিংস</h4>
                </a>
            </div>
        </div>
    </div>
    <div class="mt-5 text-center">
        <img width="120px" src="{{ asset('assets/images/logo.png') }}" class="rounded" alt="">
    </div>
</x-master>
