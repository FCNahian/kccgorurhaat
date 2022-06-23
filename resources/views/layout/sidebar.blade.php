<nav class="navbar navbar-expand d-flex flex-column aliign-item-start bg-light border-end" id="sidebar">
    <a href="{{ url('/dashboard') }}" class="navbar-brand mt-5">
        <div class="display-5 font-weight-bold">
            <h4>কে.সি.সি. গরুর হাট</h4>
        </div>
    </a>
    <ul class="navbar-nav d-flex flex-column mt-5 w-100">
        @if (Auth::user()->userRole->role_name != 'accountant')
            <li class="nav-item w-100">
                <a class="nav-link taxcollection-nav-link" href="/taxcollection" class="nav-link pl-4">
                    খাজনা আদায়
                </a>
            </li>
        @endif
        @if (Auth::user()->userRole->role_name != 'collector')
            <li class="nav-item dropdown dropend w-100">
                <a href="" class="nav-link dropdown-toggle pl-4 cashcollection-nav-link" id="sidebar-dropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    ক্যাশ কালেকশন
                </a>
                <ul class="dropdown-menu w-100" area-labelledby="navbarDropdown">
                    <li>
                        <a href="{{ url('/cashcollection/receipt/create') }}" class="dropdown-item pl-4 p-2">
                            কালেকশন রিসিট
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/cashcollection/receivecash/create') }}" class="dropdown-item pl-4 p-2">
                            ক্যাশ গ্রহণ
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <li class="nav-item dropdown dropend w-100">
            <a href="" class="nav-link dropdown-toggle pl-4 user-nav-link" id="sidebar-dropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                ব্যবহারকারী
            </a>
            <ul class="dropdown-menu w-100" area-labelledby="navbarDropdown">
                <li>
                    <a href="{{ url('/user') }}" class="dropdown-item pl-4 p-2">
                        ব্যবহারকারীগণ
                    </a>
                </li>
                @if (Auth::user()->userRole->role_name == 'admin' || Auth::user()->userRole->role_name == 'super admin')
                    <li>
                        <a href="{{ url('/user/create') }}" class="dropdown-item pl-4 p-2">
                            নতুন ব্যবহারকারী
                        </a>
                    </li>
                @endif
            </ul>
        </li>
        <li class="nav-item dropdown dropend w-100">
            <a href="" class="nav-link dropdown-toggle pl-4 location-nav-link" id="sidebar-dropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                স্থান বিবরণী
            </a>
            <ul class="dropdown-menu w-100" area-labelledby="navbarDropdown">
                <li>
                    <a href="{{ url('/location') }}" class="dropdown-item pl-4 p-2">
                        স্থান সমূহ
                    </a>
                </li>
                <li>
                    <a href="{{ url('/district') }}" class="dropdown-item pl-4 p-2">
                        জেলা
                    </a>
                </li>
                <li>
                    <a href="{{ url('/subdistrict') }}" class="dropdown-item pl-4 p-2">
                        উপজেলা
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown dropend w-100">
            <a href="" class="nav-link dropdown-toggle pl-4 cattleinfo-nav-link" id="sidebar-dropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                পশু বিবরণী
            </a>
            <ul class="dropdown-menu w-100" area-labelledby="navbarDropdown">
                <li>
                    <a href="{{ url('/cattletype') }}" class="dropdown-item pl-4 p-2">
                        পশুর ধরণ
                    </a>
                </li>
                <li>
                    <a href="{{ url('/cattlecolor') }}" class="dropdown-item pl-4 p-2">
                        পশুর রং
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown dropend w-100">
            <a href="" class="nav-link dropdown-toggle pl-4 settings-nav-link" id="sidebar-dropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                সেটিংস
            </a>
            <ul class="dropdown-menu w-100" area-labelledby="navbarDropdown">
                <li>
                    <a href="/costinfo" class="dropdown-item pl-4 p-2">
                        মূল্য বিবরণী
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
