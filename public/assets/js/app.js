// Translate String
const toBn = (n) => n.replace(/\d/g, (d) => "০১২৩৪৫৬৭৮৯"[d]);
const toEn = (n) => n.replace(/[০-৯]/g, (d) => "০১২৩৪৫৬৭৮৯".indexOf(d));

//Check Numbers For Form Input
function checkNumber(input) {
    var n = input.length;
    for (var i = 0; i < n; i++) {
        if (isNaN(input[i]) && input[i] != ".") {
            return false;
        }
    }
    return true;
}

// Number Separate With Comma
function numberSeparateWithComma(input) {
    var indexOfDecilam = input.indexOf(".");
    var mainString = input.substring(0, indexOfDecilam);
    var decimalString = input.substring(indexOfDecilam + 1);

    switch (mainString.length) {
        case 4:
            mainString =
                mainString.substring(0, 1) + "," + mainString.substring(1);
            break;
        case 5:
            mainString =
                mainString.substring(0, 2) + "," + mainString.substring(2);
            break;
        case 6:
            mainString =
                mainString.substring(0, 1) +
                "," +
                mainString.substring(1, 3) +
                "," +
                mainString.substring(3);
            break;
        case 7:
            mainString =
                mainString.substring(0, 2) +
                "," +
                mainString.substring(2, 4) +
                "," +
                mainString.substring(4);
            break;
        case 8:
            mainString =
                mainString.substring(0, 1) +
                "," +
                mainString.substring(1, 3) +
                "," +
                mainString.substring(3, 5) +
                "," +
                mainString.substring(5);
            break;
        case 9:
            mainString =
                mainString.substring(0, 2) +
                "," +
                mainString.substring(2, 4) +
                "," +
                mainString.substring(4, 6) +
                "," +
                mainString.substring(6);
            break;
        case 10:
            mainString =
                mainString.substring(0, 1) +
                "," +
                mainString.substring(1, 3) +
                "," +
                mainString.substring(3, 5) +
                "," +
                mainString.substring(5, 7) +
                "," +
                mainString.substring(7);
            break;
        default:
            break;
    }

    return mainString + "." + decimalString;
}

// Number To Words
function numberToWords(input) {
    var indexOfDecilam = input.indexOf(".");
    var mainString = input.substring(0, indexOfDecilam);
    var decimalString = input.substring(indexOfDecilam + 1);
    var mainWord = "";
    var decimalWord = "";
    var word = "";

    var numberToWordMap = {
        0: "শূন্য",
        1: "এক",
        2: "দুই",
        3: "তিন",
        4: "চার",
        5: "পাঁচ",
        6: "ছয়",
        7: "সাত",
        8: "আট",
        9: "নয়",
        10: "দশ",
        11: "এগারো",
        12: "বারো",
        13: "তেরো",
        14: "চৌদ্দ",
        15: "পনের",
        16: "ষোল",
        17: "সতের",
        18: "আঠার",
        19: "উনিশ",
        20: "বিশ",
        21: "একুশ",
        22: "বাইশ",
        23: "তেইশ",
        24: "চব্বিশ",
        25: "পঁচিশ",
        26: "ছাব্বিশ",
        27: "সাতাশ",
        28: "আটাশ",
        29: "ঊনত্রিশ",
        30: "ত্রিশ",
        31: "একত্রিশ",
        32: "বত্রিশ",
        33: "তেত্রিশ",
        34: "চৌত্রিশ",
        35: "পঁয়ত্রিশ",
        36: "ছত্রিশ",
        37: "সাইত্রিশ",
        38: "আটত্রিশ",
        39: "ঊনচল্লিশ",
        40: "চল্লিশ",
        41: "একচল্লিশ",
        42: "বিয়াল্লিশ",
        43: "তেতাল্লিশ",
        44: "চুয়াল্লিশ",
        45: "পঁয়তাল্লিশ",
        46: "ছিচল্লিশ",
        47: "সাতচল্লিশ",
        48: "আটচল্লিশ",
        49: "ঊনপঞ্চাশ",
        50: "পঞ্চাশ",
        51: "একান্ন",
        52: "বাহান্ন",
        53: "তেপ্পান্ন",
        54: "চুয়ান্ন",
        55: "পঞ্চান্ন",
        56: "ছাপ্পান্ন",
        57: "সাতান্ন",
        58: "আটান্ন",
        59: "ঊনষাট",
        60: "ষাট",
        61: "একষট্টি",
        62: "বাষট্টি",
        63: "তেষট্টি",
        64: "চৌষট্টি",
        65: "পঁয়ষট্টি",
        66: "ছেষট্টি",
        67: "সাতষট্টি",
        68: "আটষট্টি",
        69: "উনসত্তুর",
        70: "সত্তর",
        71: "একাত্তর",
        72: "বাহাত্তর",
        73: "তেহাত্তুর",
        74: "চুয়াত্তর",
        75: "পঁচাত্তর",
        76: "ছিয়াত্তর",
        77: "সাতাত্তর",
        78: "আটাত্তর",
        79: "ঊনআশি",
        80: "আশি",
        81: "একাশি",
        82: "বিরাশি",
        83: "তিরাশি",
        84: "চুরাশি",
        85: "পঁচাশি",
        86: "ছিয়াশি",
        87: "সাতাশি",
        88: "আটাশি",
        89: "উননব্বই",
        90: "নব্বই",
        91: "একানব্বই",
        92: "বিরানব্বই",
        93: "তিরানব্বই",
        94: "চুরানব্বই",
        95: "পঁচানব্বই",
        96: "ছিয়ানব্বই",
        97: "সাতানব্বই",
        98: "আটানব্বই",
        99: "নিরানব্বই",
        100: "শত",
        1000: "হাজার",
        100000: "লক্ষ",
        10000000: "কোটি",
        1000000000: "বিলিয়ন",
        1000000000000: "ট্রিলিয়ন",
        1000000000000000: "কোয়াড্রিলিয়ন",
    };

    if (mainString.length <= 2) {
        mainWord = mainWord + numberToWordMap[parseInt(mainString)] + " ";
    } else if (mainString.length == 3) {
        mainWord =
            mainWord +
            numberToWordMap[parseInt(mainString[0])] +
            " " +
            numberToWordMap[100] +
            " ";
        if (mainString.substring(1) != "00") {
            mainWord =
                mainWord +
                numberToWordMap[parseInt(mainString.substring(1))] +
                " ";
        }
    } else if (mainString.length == 4) {
        mainWord =
            mainWord +
            numberToWordMap[parseInt(mainString.substring(0, 1))] +
            " " +
            numberToWordMap[1000] +
            " ";
        if (mainString.substring(1, 2) != "0") {
            mainWord =
                mainWord +
                numberToWordMap[parseInt(mainString.substring(1, 2))] +
                " " +
                numberToWordMap[100] +
                " ";
        }
        if (mainString.substring(2) != "00") {
            mainWord =
                mainWord +
                numberToWordMap[parseInt(mainString.substring(2))] +
                " ";
        }
    } else if (mainString.length == 5) {
        mainWord =
            mainWord +
            numberToWordMap[parseInt(mainString.substring(0, 2))] +
            " " +
            numberToWordMap[1000] +
            " ";
        if (mainString.substring(2, 3) != "0") {
            mainWord =
                mainWord +
                numberToWordMap[parseInt(mainString.substring(2, 3))] +
                " " +
                numberToWordMap[100] +
                " ";
        }
        if (mainString.substring(3) != "00") {
            mainWord =
                mainWord +
                numberToWordMap[parseInt(mainString.substring(3))] +
                " ";
        }
    } else if (mainString.length == 6) {
        mainWord =
            mainWord +
            numberToWordMap[parseInt(mainString.substring(0, 1))] +
            " " +
            numberToWordMap[100000] +
            " ";
        if (mainString.substring(1, 3) != "00") {
            mainWord =
                mainWord +
                numberToWordMap[parseInt(mainString.substring(1, 3))] +
                " " +
                numberToWordMap[1000] +
                " ";
        }
        if (mainString.substring(3, 4) != "0") {
            mainWord =
                mainWord +
                numberToWordMap[parseInt(mainString.substring(3, 4))] +
                " " +
                numberToWordMap[100] +
                " ";
        }
        if (mainString.substring(4) != "00") {
            mainWord =
                mainWord +
                numberToWordMap[parseInt(mainString.substring(4))] +
                " ";
        }
    } else if (mainString.length == 7) {
        mainWord =
            mainWord +
            numberToWordMap[parseInt(mainString.substring(0, 2))] +
            " " +
            numberToWordMap[100000] +
            " ";
        if (mainString.substring(2, 4) != "00") {
            mainWord =
                mainWord +
                numberToWordMap[parseInt(mainString.substring(2, 4))] +
                " " +
                numberToWordMap[1000] +
                " ";
        }
        if (mainString.substring(4, 5) != "0") {
            mainWord =
                mainWord +
                numberToWordMap[parseInt(mainString.substring(4, 5))] +
                " " +
                numberToWordMap[100] +
                " ";
        }
        if (mainString.substring(5) != "00") {
            mainWord =
                mainWord +
                numberToWordMap[parseInt(mainString.substring(5))] +
                " ";
        }
    } else if (mainString.length == 8) {
        mainWord =
            mainWord +
            numberToWordMap[parseInt(mainString.substring(0, 1))] +
            " " +
            numberToWordMap[10000000] +
            " ";
        if (mainString.substring(1, 3) != "00") {
            mainWord =
                mainWord +
                numberToWordMap[parseInt(mainString.substring(1, 3))] +
                " " +
                numberToWordMap[100000] +
                " ";
        }
        if (mainString.substring(3, 5) != "00") {
            mainWord =
                mainWord +
                numberToWordMap[parseInt(mainString.substring(3, 5))] +
                " " +
                numberToWordMap[1000] +
                " ";
        }
        if (mainString.substring(5, 6) != "0") {
            mainWord =
                mainWord +
                numberToWordMap[parseInt(mainString.substring(5, 6))] +
                " " +
                numberToWordMap[100] +
                " ";
        }
        if (mainString.substring(6) != "00") {
            mainWord =
                mainWord +
                numberToWordMap[parseInt(mainString.substring(6))] +
                " ";
        }
    }

    if (decimalString != "00") {
        for (let i = 0; i < decimalString.length; i++) {
            decimalWord =
                decimalWord + numberToWordMap[parseInt(decimalString[i])] + " ";
        }

        word = mainWord + "দশমিক " + decimalWord;
    } else {
        word = mainWord;
    }

    return word + "টাকা মাত্র";
}

// Receipt Date Builder
function receiptDateBuilder(input) {
    var month = input.substring(0, 3);
    var date = input.substring(4, 6);
    var year = input.substring(7, 11);
    var newDate = date + "/";
    switch (month) {
        case "Jan":
            newDate = newDate + "01";
            break;
        case "Feb":
            newDate = newDate + "02";
            break;
        case "Mar":
            newDate = newDate + "03";
            break;
        case "Apr":
            newDate = newDate + "04";
            break;
        case "May":
            newDate = newDate + "05";
            break;
        case "Jun":
            newDate = newDate + "06";
            break;
        case "Jul":
            newDate = newDate + "07";
            break;
        case "Aug":
            newDate = newDate + "08";
            break;
        case "Sep":
            newDate = newDate + "09";
            break;
        case "Oct":
            newDate = newDate + "10";
            break;
        case "Nov":
            newDate = newDate + "11";
            break;
        case "Dec":
            newDate = newDate + "12";
            break;
    }

    newDate = newDate + "/" + year;

    return newDate;
}

// Receipt Time Builder
function receiptTimeBuilder(input) {
    var hour = input.substring(0, 2);
    var min = input.substring(3, 5);
    var sec = input.substring(6, 9);
    var state = "এ.এম.";
    var newTime = "";

    switch (hour) {
        case "12":
            hour = "12";
            state = "পি.এম.";
            break;
        case "13":
            hour = "1";
            state = "পি.এম.";
            break;
        case "14":
            hour = "2";
            state = "পি.এম.";
            break;
        case "15":
            hour = "3";
            state = "পি.এম.";
            break;
        case "16":
            hour = "4";
            state = "পি.এম.";
            break;
        case "17":
            hour = "5";
            state = "পি.এম.";
            break;
        case "18":
            hour = "6";
            state = "পি.এম.";
            break;
        case "19":
            hour = "7";
            state = "পি.এম.";
            break;
        case "20":
            hour = "8";
            state = "পি.এম.";
            break;
        case "21":
            hour = "9";
            state = "পি.এম.";
            break;
        case "22":
            hour = "10";
            state = "পি.এম.";
            break;
        case "23":
            hour = "11";
            state = "পি.এম.";
            break;
    }

    newTime = toBn(hour + ":" + min + ":" + sec + " " + state);

    return newTime;
}

// Display Current Date Time On Navbar
function currentDateTime() {
    var currentDateTimeDisplay = document.querySelector(
        "#current-date-time-display"
    );
    var currentDateTime = new Date();
    var day = currentDateTime.getDate();
    var month = currentDateTime.getMonth() + 1;
    var year = currentDateTime.getFullYear();
    var hour = currentDateTime.getHours();
    var minute = currentDateTime.getMinutes();
    var sec = currentDateTime.getSeconds();

    if (parseInt(hour) > 12) {
        hour = (parseInt(hour) % 12).toString();
    }

    if (minute < 10) {
        minute = "0" + minute;
    }
    if (sec < 10) {
        sec = "0" + sec;
    }
    if (hour < 10) {
        hour = "0" + hour;
    }

    if (month < 10) {
        month = "0" + month;
    }

    var timeString = hour + ":" + minute + ":" + sec + " ";
    var dateString = day + "/" + month + "/" + year;
    if (hour > 11) {
        timeString += "পি.এম.";
    } else {
        timeString += "এ.এম.";
    }
    currentDateTimeDisplay.innerHTML = toBn(timeString + "&emsp;" + dateString);
}

// Sidebar Toggle
if (document.getElementById("sidebar-toggle")) {
    var sidebarToggleButton = document.getElementById("sidebar-toggle"),
        sidebar = document.getElementById("sidebar"),
        mainBody = document.getElementById("main-body");
    sidebarToggleButton.addEventListener("click", () => {
        sidebarToggleButton.classList.toggle("sidebar-toggle-button-rotate");
        sidebar.classList.toggle("sidebar-inactive");
        mainBody.classList.toggle("main-body-active");
    });
}

// Sidebar Links Switch Active
if (document.querySelector("#sidebar")) {
    if (window.location.href.includes("taxcollection")) {
        document
            .querySelector(".taxcollection-nav-link")
            .classList.add("active");
    } else if (window.location.href.includes("cashcollection")) {
        document
            .querySelector(".cashcollection-nav-link")
            .classList.add("active");
    } else if (window.location.href.includes("user")) {
        document.querySelector(".user-nav-link").classList.add("active");
    } else if (
        window.location.href.includes("location") ||
        window.location.href.includes("district")
    ) {
        document.querySelector(".location-nav-link").classList.add("active");
    } else if (window.location.href.includes("cattle")) {
        document.querySelector(".cattleinfo-nav-link").classList.add("active");
    }
}

// Navbar Links Switch Active
if (document.querySelector("#navbar")) {
    if (window.location.href.includes("dashboard")) {
        document.querySelector(".dashboard-nav-link").classList.add("active");
    }
}

// Navbar Date Time Show
if (document.querySelector("#current-date-time-display")) {
    currentDateTime();
    setInterval(currentDateTime, 1000);
}

// Registration Use ID Translate
if (document.getElementById("register_user_id_actual")) {
    document.getElementById("register_user_id_fake").value = toBn(
        document.getElementById("register_user_id_actual").value.toString()
    );
}

// Registration Form Post
function updateRegistrationPhone() {
    document.getElementById("registration_phone_actual").value = toEn(
        document.getElementById("registration_phone_fake").value
    );
    document.getElementById("registration_phone_fake").value = toBn(
        document.getElementById("registration_phone_fake").value
    );
}
if (document.getElementById("registration_phone_fake")) {
    document.getElementById("registration_phone_fake").onkeyup =
        updateRegistrationPhone;
}

// Confirm password
function validatePassword() {
    var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm_password"),
        confirm_password_error = document.getElementById(
            "confirm_password_error"
        ),
        submit_button = document.getElementById("submit_button");

    if (password.value != confirm_password.value) {
        confirm_password_error.innerHTML = "একই পাসওয়ার্ড প্রদান করুন";
        submit_button.style.display = "none";
    } else {
        confirm_password_error.innerHTML = "";
        submit_button.style.display = "block";
    }
}
if (document.getElementById("password")) {
    document.getElementById("password").onkeyup = validatePassword;
}

if (document.getElementById("confirm_password")) {
    document.getElementById("confirm_password").onkeyup = validatePassword;
}

// Login Form Post
function updateLoginCredential() {
    document.getElementById("login_credential_actual").value = toEn(
        document.getElementById("login_credential_fake").value
    );
    document.getElementById("login_credential_fake").value = toBn(
        document.getElementById("login_credential_fake").value
    );
}
if (document.getElementById("login_credential_fake")) {
    document.getElementById("login_credential_fake").onkeyup =
        updateLoginCredential;
}

// Dashboard Analytics
function dashboardAnalytics() {
    $.ajax({
        url: "/dashboard/analytics",
        type: "GET",
        data: { _token: "{{ csrf_token() }}" },
        dataType: "json",
        success: function (data) {
            total_cattle_sale_display.innerHTML = toBn(
                data.totalCattleSale.toString()
            );
            total_sale_price_display.innerHTML = toBn(
                numberSeparateWithComma(data.totalSalePrice.toString())
            );
            total_tax_collection_display.innerHTML = toBn(
                numberSeparateWithComma(data.totalTaxCollection.toString())
            );
        },
        error: function (error) {
            console.log(error);
        },
    });
}

if (document.querySelector("#dashboard-analytics")) {
    var total_cattle_sale_display = document.querySelector(
            "#total-cattle-sale-display"
        ),
        total_sale_price_display = document.querySelector(
            "#total-sale-price-display"
        ),
        total_tax_collection_display = document.querySelector(
            "#total-tax-collection-display"
        );

    dashboardAnalytics();
    setInterval(dashboardAnalytics, 10000);
}

// Add User ID Form Post
function updateAddUserID() {
    document.getElementById("add_user_id_actual").value = toEn(
        document.getElementById("add_user_id_fake").value
    );
    document.getElementById("add_user_id_fake").value = toBn(
        document.getElementById("add_user_id_fake").value
    );
}
if (document.getElementById("add_user_id_fake")) {
    document.getElementById("add_user_id_fake").value = toBn(
        document.getElementById("add_user_id_fake").value
    );
    document.getElementById("add_user_id_fake").onkeyup = updateAddUserID;
}

// Add User Phone Form Post
function updateAddUserPhone() {
    document.getElementById("add_user_phone_actual").value = toEn(
        document.getElementById("add_user_phone_fake").value
    );
    document.getElementById("add_user_phone_fake").value = toBn(
        document.getElementById("add_user_phone_fake").value
    );
}
if (document.getElementById("add_user_phone_fake")) {
    document.getElementById("add_user_phone_fake").onkeyup = updateAddUserPhone;
}

// Edit User ID Form Post
function updateEditUserID() {
    document.getElementById("edit_user_id_actual").value = toEn(
        document.getElementById("edit_user_id_fake").value
    );
    document.getElementById("edit_user_id_fake").value = toBn(
        document.getElementById("edit_user_id_fake").value
    );
}
if (document.getElementById("edit_user_id_fake")) {
    document.getElementById("edit_user_id_fake").value = toBn(
        document.getElementById("edit_user_id_fake").value
    );
    document.getElementById("edit_user_id_fake").onkeyup = updateEditUserID;
}

// Edit User Form Post
function updateEditUserPhone() {
    document.getElementById("edit_user_phone_actual").value = toEn(
        document.getElementById("edit_user_phone_fake").value
    );
    document.getElementById("edit_user_phone_fake").value = toBn(
        document.getElementById("edit_user_phone_fake").value
    );
}
if (document.getElementById("edit_user_phone_fake")) {
    document.getElementById("edit_user_phone_fake").value = toBn(
        document.getElementById("edit_user_phone_fake").value
    );
    document.getElementById("edit_user_phone_fake").onkeyup =
        updateEditUserPhone;
}

// User ID Display Translation
if (document.getElementsByClassName("user_id_display")) {
    var elements = document.querySelectorAll(".user_id_display");
    elements.forEach((element) => {
        element.innerHTML = toBn(element.innerHTML);
    });
}

// User Phone Display Translation
if (document.getElementsByClassName("user_phone_display")) {
    var elements = document.querySelectorAll(".user_phone_display");
    elements.forEach((element) => {
        element.innerHTML = toBn(element.innerHTML);
    });
}

// Cost Info Translation
if (document.getElementById("cost_info_pole_cost_rate_display")) {
    document.getElementById("cost_info_pole_cost_rate_display").innerHTML =
        toBn(
            document.getElementById("cost_info_pole_cost_rate_display")
                .innerHTML
        );
}

if (document.getElementById("cost_info_tax_rate_display")) {
    document.getElementById("cost_info_tax_rate_display").innerHTML = toBn(
        document.getElementById("cost_info_tax_rate_display").innerHTML
    );
}

// Pole Cost Rate Edit Form Show
function poleCostEditFormShow() {
    var poleCostForm = document.getElementById("pole-cost-form");
    poleCostForm.classList.toggle("d-none");
}

// Tax Rate Edit Form Show
function taxEditFormShow() {
    var taxForm = document.getElementById("tax-form");
    taxForm.classList.toggle("d-none");
}

// Cost Info Form Post
function updateTaxRateValue() {
    document.getElementById("cost_info_tax_rate_actual").value = toEn(
        document.getElementById("cost_info_tax_rate_fake").value
    );
    document.getElementById("cost_info_tax_rate_fake").value = toBn(
        document.getElementById("cost_info_tax_rate_fake").value
    );
}

function updatePoleCostRateValue() {
    document.getElementById("cost_info_pole_cost_rate_actual").value = toEn(
        document.getElementById("cost_info_pole_cost_rate_fake").value
    );
    document.getElementById("cost_info_pole_cost_rate_fake").value = toBn(
        document.getElementById("cost_info_pole_cost_rate_fake").value
    );
}

if (document.getElementById("cost_info_tax_rate_fake")) {
    document.getElementById("cost_info_tax_rate_fake").value = toBn(
        document.getElementById("cost_info_tax_rate_fake").value
    );
    document.getElementById("cost_info_tax_rate_fake").onkeyup =
        updateTaxRateValue;
}

if (document.getElementById("cost_info_pole_cost_rate_fake")) {
    document.getElementById("cost_info_pole_cost_rate_fake").value = toBn(
        document.getElementById("cost_info_pole_cost_rate_fake").value
    );
    document.getElementById("cost_info_pole_cost_rate_fake").onkeyup =
        updatePoleCostRateValue;
}

// Tax Collection Form Seriel Number Display
if (document.querySelector(".tax-collection-form-seriel-number-display")) {
    document.querySelector(
        ".tax-collection-form-seriel-number-display"
    ).innerHTML = toBn(
        document
            .querySelector(".tax-collection-form-seriel-number-display")
            .innerHTML.toString()
    );
}

// Seller District to Sub District
$(document).ready(function () {
    $("#seller_district").on("change", function () {
        var sellerDistrictId = $(this).val();
        if (sellerDistrictId) {
            $.ajax({
                url: "/getsubdistrict/" + sellerDistrictId,
                type: "GET",
                data: { _token: "{{ csrf_token() }}" },
                dataType: "json",
                success: function (data) {
                    if (data) {
                        $("#seller_subdistrict").empty();
                        $("#seller_subdistrict").append(
                            // "<option hidden>Choose Course</option>"
                            "<option selected='true' value=''>উপজেলা নির্বাচন করুন</option>"
                        );
                        $.each(data, function (key, subDistrict) {
                            $('select[name="seller_subdistrict"]').append(
                                '<option value="' +
                                    subDistrict.id +
                                    '">' +
                                    subDistrict.name +
                                    "</option>"
                            );
                        });
                    } else {
                        $("#seller_subdistrict").empty();
                    }
                },
            });
        } else {
            $.ajax({
                url: "/getsubdistrict",
                type: "GET",
                data: { _token: "{{ csrf_token() }}" },
                dataType: "json",
                success: function (data) {
                    if (data) {
                        console.log(data);
                        $("#seller_subdistrict").empty();
                        $("#seller_subdistrict").append(
                            // "<option hidden>Choose Course</option>"
                            "<option selected='true' value=''>উপজেলা নির্বাচন করুন</option>"
                        );
                        $.each(data, function (key, subDistrict) {
                            $('select[name="seller_subdistrict"]').append(
                                '<option value="' +
                                    subDistrict.id +
                                    '">' +
                                    subDistrict.name +
                                    "</option>"
                            );
                        });
                    } else {
                        $("#seller_subdistrict").empty();
                    }
                },
            });
            $("#seller_subdistrict").empty();
        }
    });
});

// Buyer District to Sub District
$(document).ready(function () {
    $("#buyer_district").on("change", function () {
        var buyerDistrictId = $(this).val();
        if (buyerDistrictId) {
            $.ajax({
                url: "/getsubdistrict/" + buyerDistrictId,
                type: "GET",
                data: { _token: "{{ csrf_token() }}" },
                dataType: "json",
                success: function (data) {
                    if (data) {
                        console.log(data);
                        $("#buyer_subdistrict").empty();
                        $("#buyer_subdistrict").append(
                            // "<option hidden>Choose Course</option>"
                            "<option selected='true' value=''>উপজেলা নির্বাচন করুন</option>"
                        );
                        $.each(data, function (key, subDistrict) {
                            $('select[name="buyer_subdistrict"]').append(
                                '<option value="' +
                                    subDistrict.id +
                                    '">' +
                                    subDistrict.name +
                                    "</option>"
                            );
                        });
                    } else {
                        $("#buyer_subdistrict").empty();
                    }
                },
            });
        } else {
            $.ajax({
                url: "/getsubdistrict",
                type: "GET",
                data: { _token: "{{ csrf_token() }}" },
                dataType: "json",
                success: function (data) {
                    if (data) {
                        console.log(data);
                        $("#buyer_subdistrict").empty();
                        $("#buyer_subdistrict").append(
                            // "<option hidden>Choose Course</option>"
                            "<option selected='true' value=''>উপজেলা নির্বাচন করুন</option>"
                        );
                        $.each(data, function (key, subDistrict) {
                            $('select[name="buyer_subdistrict"]').append(
                                '<option value="' +
                                    subDistrict.id +
                                    '">' +
                                    subDistrict.name +
                                    "</option>"
                            );
                        });
                    } else {
                        $("#buyer_subdistrict").empty();
                    }
                },
            });
            $("#buyer_subdistrict").empty();
        }
    });
});

//Make Tax Collection Form Calculate In Bangla
if (document.getElementById("tax_collection_form")) {
    var sale_price = document.getElementById("sale_price"),
        tax_rate = document.getElementById("tax_rate"),
        tax = document.getElementById("tax"),
        pole_count = document.getElementById("pole_count"),
        pole_cost_rate = document.getElementById("pole_cost_rate"),
        pole_cost = document.getElementById("pole_cost"),
        total_cost = document.getElementById("total_cost");

    pole_count.value = toBn(pole_count.value);
    pole_cost_rate.value = toBn(pole_cost_rate.value);
    tax_rate.value = toBn(tax_rate.value);

    function calculateCost() {
        sale_price.value = toEn(sale_price.value);
        pole_count.value = toEn(pole_count.value);
        if (
            (sale_price.value == "" || checkNumber(sale_price.value)) &&
            (pole_count.value == "" || checkNumber(pole_count.value))
        ) {
            sale_price.value == "" ? 0 : sale_price.value;
            pole_count.value == "" ? 0 : pole_count.value;

            tax_rate.value = toEn(tax_rate.value);
            pole_cost_rate.value = toEn(pole_cost_rate.value);

            tax.value = (sale_price.value * tax_rate.value) / 100;

            pole_cost.value = pole_cost_rate.value * pole_count.value;

            total_cost.value =
                (sale_price.value * tax_rate.value) / 100 +
                pole_cost_rate.value * pole_count.value;

            sale_price.value = toBn(sale_price.value);
            tax_rate.value = toBn(tax_rate.value);
            tax.value = toBn(parseFloat(tax.value).toFixed(2).toString());
            pole_count.value = toBn(pole_count.value);
            pole_cost_rate.value = toBn(pole_cost_rate.value);
            pole_cost.value = toBn(
                parseFloat(pole_cost.value).toFixed(2).toString()
            );
            total_cost.value = toBn(
                parseFloat(total_cost.value).toFixed(2).toString()
            );
        } else {
            sale_price.value = toBn(sale_price.value);
            pole_count.value = toBn(pole_count.value);
            tax.value = "সঠিক সংখ্যা চাপুন";
            pole_cost.value = "সঠিক সংখ্যা চাপুন";
            total_cost.value = "সঠিক সংখ্যা চাপুন";
        }
    }

    sale_price.onkeyup = calculateCost;
    pole_count.onkeyup = calculateCost;
}

// Tax Receipt Builder

function buildReceipt(newTaxData) {
    var seriel_number_display = document.querySelectorAll(
            ".seriel_number_display"
        ),
        date_display = document.querySelectorAll(".date_display"),
        time_display = document.querySelectorAll(".time_display"),
        operator_name_display = document.querySelectorAll(
            ".operator_name_display"
        ),
        seller_name_display = document.querySelectorAll(".seller_name_display"),
        seller_father_name_display = document.querySelectorAll(
            ".seller_father_name_display"
        ),
        seller_village_name_display = document.querySelectorAll(
            ".seller_village_name_display"
        ),
        seller_district_display = document.querySelectorAll(
            ".seller_district_display"
        ),
        seller_subdistrict_display = document.querySelectorAll(
            ".seller_subdistrict_display"
        ),
        buyer_name_display = document.querySelectorAll(".buyer_name_display"),
        buyer_father_name_display = document.querySelectorAll(
            ".buyer_father_name_display"
        ),
        buyer_village_name_display = document.querySelectorAll(
            ".seller_village_name_display"
        ),
        buyer_district_display = document.querySelectorAll(
            ".buyer_district_display"
        ),
        buyer_subdistrict_display = document.querySelectorAll(
            ".buyer_subdistrict_display"
        ),
        cattletype_name_display = document.querySelectorAll(
            ".cattletype_name_display"
        ),
        cattlecolor_name_display = document.querySelectorAll(
            ".cattlecolor_name_display"
        ),
        sale_price_display = document.querySelectorAll(".sale_price_display"),
        tax_display = document.querySelectorAll(".tax_display"),
        pole_cost_display = document.querySelectorAll(".pole_cost_display"),
        pole_cost_rate_display = document.querySelectorAll(
            ".pole_cost_rate_display"
        ),
        pole_count_display = document.querySelectorAll(".pole_count_display"),
        total_cost_display = document.querySelectorAll(".total_cost_display"),
        total_cost_text_display = document.querySelectorAll(
            ".total_cost_text_display"
        );

    var created_at_datetime = Date(newTaxData.created_at);

    var created_at_date = created_at_datetime.substring(4, 15);
    var created_at_time = created_at_datetime.substring(16, 24);

    var newDate = receiptDateBuilder(created_at_date);
    var newTime = receiptTimeBuilder(created_at_time);

    seriel_number_display.forEach((element) => {
        element.innerHTML = toBn(newTaxData.seriel_id.toString());
    });

    date_display.forEach((element) => {
        element.innerHTML = toBn(newDate);
    });

    time_display.forEach((element) => {
        element.innerHTML = toBn(newTime);
    });

    operator_name_display.forEach((element) => {
        element.innerHTML = newTaxData.soldby_name;
    });

    seller_name_display.forEach((element) => {
        element.innerHTML = newTaxData.seller_name;
    });

    seller_father_name_display.forEach((element) => {
        element.innerHTML = newTaxData.seller_father_name
            ? newTaxData.seller_father_name
            : "";
    });

    seller_village_name_display.forEach((element) => {
        element.innerHTML = newTaxData.seller_village
            ? newTaxData.seller_village
            : "";
    });

    seller_district_display.forEach((element) => {
        element.innerHTML = newTaxData.seller_district_name
            ? newTaxData.seller_district_name
            : "";
    });

    seller_subdistrict_display.forEach((element) => {
        element.innerHTML = newTaxData.seller_subdistrict_name
            ? newTaxData.seller_subdistrict_name
            : "";
    });

    buyer_name_display.forEach((element) => {
        element.innerHTML = newTaxData.buyer_name;
    });

    buyer_father_name_display.forEach((element) => {
        element.innerHTML = newTaxData.buyer_father_name
            ? newTaxData.buyer_father_name
            : "";
    });

    buyer_village_name_display.forEach((element) => {
        element.innerHTML = newTaxData.buyer_village
            ? newTaxData.buyer_village
            : "";
    });

    buyer_district_display.forEach((element) => {
        element.innerHTML = newTaxData.buyer_district_name
            ? newTaxData.buyer_district_name
            : "";
    });

    buyer_subdistrict_display.forEach((element) => {
        element.innerHTML = newTaxData.buyer_subdistrict_name
            ? newTaxData.buyer_subdistrict_name
            : "";
    });

    cattletype_name_display.forEach((element) => {
        element.innerHTML = newTaxData.cattletype_name
            ? newTaxData.cattletype_name
            : "";
    });

    cattlecolor_name_display.forEach((element) => {
        element.innerHTML = newTaxData.cattlecolor_name
            ? newTaxData.cattlecolor_name
            : "";
    });

    sale_price_display.forEach((element) => {
        element.innerHTML = newTaxData.sale_price
            ? toBn(
                  numberSeparateWithComma(
                      parseFloat(newTaxData.sale_price).toFixed(2).toString()
                  )
              )
            : "";
    });

    tax_display.forEach((element) => {
        element.innerHTML = newTaxData.tax
            ? toBn(numberSeparateWithComma(newTaxData.tax))
            : "";
    });

    pole_cost_display.forEach((element) => {
        element.innerHTML = newTaxData.pole_cost
            ? toBn(numberSeparateWithComma(newTaxData.pole_cost))
            : "";
    });

    pole_cost_rate_display.forEach((element) => {
        element.innerHTML = newTaxData.pole_cost_rate
            ? toBn(numberSeparateWithComma(newTaxData.pole_cost_rate))
            : "";
    });

    pole_count_display.forEach((element) => {
        element.innerHTML = newTaxData.pole_count
            ? toBn(newTaxData.pole_count)
            : "";
    });

    total_cost_display.forEach((element) => {
        element.innerHTML = newTaxData.total_cost
            ? toBn(numberSeparateWithComma(newTaxData.total_cost))
            : "";
    });

    total_cost_text_display.forEach((element) => {
        element.innerHTML = newTaxData.total_cost
            ? numberToWords(newTaxData.total_cost)
            : "";
    });
}

// Tax Receipt Printer
function printReceipt() {
    var originalContents = document.body.innerHTML;
    $("#print-receipt").show();
    html2canvas(document.getElementById("printable-area")).then((canvas) => {
        var myImage = canvas.toDataURL("image/png");
        var tmp = window.open();
        $(tmp.document.body)
            .html("<img src=" + myImage + " alt=''>")
            .ready(function () {
                tmp.print();
                tmp.close();
            });
    });
    $("#print-receipt").hide();
}

function toastrBox(title, message) {
    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: false,
        progressBar: false,
        positionClass: "toast-top-center",
        preventDuplicates: false,
        onclick: null,
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };

    if (title == "Success") {
        $(document).ready(function onDocumentReady() {
            toastr.success(message, "সফল");
        });
    }

    if (title == "Error") {
        $(document).ready(function onDocumentReady() {
            toastr.error(message, "এরর");
        });
    }
}

// Tax Form Reset Button
$("#tax-form-reset").click(function (event) {
    event.preventDefault();
    $("#tax_collection_form")[0].reset();
    document.getElementById("pole_count").value = toBn(
        document.getElementById("pole_count").value
    );
    document.getElementById("pole_cost_rate").value = toBn(
        document.getElementById("pole_cost_rate").value
    );
    document.getElementById("tax_rate").value = toBn(
        document.getElementById("tax_rate").value
    );
});

// Tax Form Submit Ajax Request
function taxFormSubmitAjaxRequest(print = true) {
    $.ajax({
        url: "/taxcollection",
        type: "POST",
        data: {
            seller_name: $("#seller_name").val(),
            seller_father_name: $("#seller_father_name").val(),
            seller_district: $("#seller_district").val(),
            seller_subdistrict: $("#seller_subdistrict").val(),
            seller_village_name: $("#seller_village_name").val(),
            buyer_name: $("#buyer_name").val(),
            buyer_father_name: $("#buyer_father_name").val(),
            buyer_district: $("#buyer_district").val(),
            buyer_subdistrict: $("#buyer_subdistrict").val(),
            buyer_village_name: $("#buyer_village_name").val(),
            cattletype_id: $("#cattletype_id").val(),
            cattlecolor_id: $("#cattlecolor_id").val(),
            sale_price: toEn($("#sale_price").val()),
            tax_rate: toEn($("#tax_rate").val()),
            tax: toEn($("#tax").val()),
            pole_count: toEn($("#pole_count").val()),
            pole_cost_rate: toEn($("#pole_cost_rate").val()),
            pole_cost: toEn($("#pole_cost").val()),
            total_cost: toEn($("#total_cost").val()),
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            console.log(response);
            if (response) {
                buildReceipt(response);

                toastrBox(
                    "Success",
                    "খাজনা আদায়ের তথ্যাবলী সফলভাবে নিবন্ধিত হয়েছে।"
                );

                if (print) {
                    printReceipt();
                }

                $("#tax_collection_form")[0].reset();

                if (
                    response.seriel_id.toString() ==
                    response.soldby_user_id.toString() + "9999"
                ) {
                    console.log("111");
                    window.location = "/taxcollection";
                }

                document.querySelector(
                    ".tax-collection-form-seriel-number-display"
                ).innerHTML = toBn((response.seriel_id + 1).toString());
                document.getElementById("pole_count").value = toBn(
                    document.getElementById("pole_count").value
                );
                document.getElementById("pole_cost_rate").value = toBn(
                    document.getElementById("pole_cost_rate").value
                );
                document.getElementById("tax_rate").value = toBn(
                    document.getElementById("tax_rate").value
                );
            }
        },
        error: function (response) {
            if (response.responseJSON.errors.seller_name) {
                toastrBox("Error", response.responseJSON.errors.seller_name);
            }

            if (response.responseJSON.errors.buyer_name) {
                toastrBox("Error", response.responseJSON.errors.buyer_name);
            }

            if (response.responseJSON.errors.cattletype_id) {
                toastrBox("Error", response.responseJSON.errors.cattletype_id);
            }

            if (response.responseJSON.errors.sale_price) {
                toastrBox("Error", response.responseJSON.errors.sale_price);
            }

            if (response.responseJSON.errors.tax_rate) {
                toastrBox("Error", response.responseJSON.errors.tax_rate);
            }

            if (response.responseJSON.errors.tax) {
                toastrBox("Error", response.responseJSON.errors.tax);
            }

            if (response.responseJSON.errors.pole_count) {
                toastrBox("Error", response.responseJSON.errors.pole_count);
            }

            if (response.responseJSON.errors.pole_cost_rate) {
                toastrBox("Error", response.responseJSON.errors.pole_cost_rate);
            }

            if (response.responseJSON.errors.pole_cost) {
                toastrBox("Error", response.responseJSON.errors.pole_cost);
            }

            if (response.responseJSON.errors.total_cost) {
                toastrBox("Error", response.responseJSON.errors.total_cost);
            }
        },
    });
}

// Submit Tax Collection Form Without Print
$("#submit-and-save").click(function (event) {
    event.preventDefault();

    taxFormSubmitAjaxRequest((print = false));
});

// Submit Tax Collection Form And Print
$("#submit-and-print").click(function (event) {
    event.preventDefault();

    // let _token = $('meta[name="csrf-token"]').attr("content");

    taxFormSubmitAjaxRequest((print = true));
});

// Cash Collection Receipt Form Select Collector
$(document).ready(function () {
    $("#tax_collector_user_id").on("change", function () {
        var collectorId = $(this).val();
        if (collectorId) {
            $.ajax({
                url: "/gettaxcollectorinfo/" + collectorId,
                type: "GET",
                data: { _token: "{{ csrf_token() }}" },
                dataType: "json",
                success: function (data) {
                    if (data) {
                        console.log("got data");
                        console.log(data);
                        $("#cash_collection_receipt_form_expansion").show();
                        $("#tax_collection_seriel_start_fake").val(
                            toBn(
                                data.last_cash_receipt_seriel_number.toString()
                            )
                        );
                        $("#tax_collection_seriel_start_actual").val(
                            data.last_cash_receipt_seriel_number
                        );

                        $("#tax_collection_seriel_end_fake").val(
                            toBn(data.last_receipt_seriel_number.toString())
                        );
                        $("#tax_collection_seriel_end_actual").val(
                            data.last_receipt_seriel_number
                        );

                        $("#pole_count_fake").val(
                            toBn(data.pole_count.toString())
                        );
                        $("#pole_count_actual").val(data.pole_count);

                        $("#pole_cost_fake").val(
                            toBn(data.pole_cost.toString())
                        );
                        $("#pole_cost_actual").val(data.pole_cost);

                        $("#tax_fake").val(toBn(data.tax.toString()));
                        $("#tax_actual").val(data.tax);

                        $("#total_cash_fake").val(
                            toBn(data.total_cost.toString())
                        );
                        $("#total_cash_actual").val(data.total_cost);
                    } else {
                        console.log("not got data");
                    }
                },
                error: function (error) {
                    // console.log(error);
                },
            });
        } else {
            console.log("no selection");
            $("#cash_collection_receipt_form_expansion").hide();
            $("#tax_collection_seriel_start_fake").val("");
            $("#tax_collection_seriel_start_actual").val("");

            $("#tax_collection_seriel_end_fake").val("");
            $("#tax_collection_seriel_end_actual").val("");

            $("#pole_count_fake").val("");
            $("#pole_count_actual").val("");

            $("#pole_cost_fake").val("");
            $("#pole_cost_actual").val("");

            $("#tax_fake").val("");
            $("#tax_actual").val("");

            $("#total_cash_fake").val("");
            $("#total_cash_actual").val("");
        }
    });
});

// Cash Collection Receipt Form Post
function updateCashCollectionReceiptStartSeriel() {
    document.getElementById("tax_collection_seriel_start_actual").value = toEn(
        document
            .getElementById("tax_collection_seriel_start_fake")
            .value.toString()
    );
    document.getElementById("tax_collection_seriel_start_fake").value = toBn(
        document
            .getElementById("tax_collection_seriel_start_fake")
            .value.toString()
    );
}

function updateCashCollectionReceiptEndSeriel() {
    document.getElementById("tax_collection_seriel_end_actual").value = toEn(
        document
            .getElementById("tax_collection_seriel_end_fake")
            .value.toString()
    );
    document.getElementById("tax_collection_seriel_end_fake").value = toBn(
        document
            .getElementById("tax_collection_seriel_end_fake")
            .value.toString()
    );
}

function updateCashCollectionReceiptPoleCount() {
    document.getElementById("pole_count_actual").value = toEn(
        document.getElementById("pole_count_fake").value.toString()
    );
    document.getElementById("pole_count_fake").value = toBn(
        document.getElementById("pole_count_fake").value.toString()
    );
}

function updateCashCollectionReceiptPoleCost() {
    document.getElementById("pole_cost_actual").value = toEn(
        document.getElementById("pole_cost_fake").value.toString()
    );
    document.getElementById("pole_cost_fake").value = toBn(
        document.getElementById("pole_cost_fake").value.toString()
    );
}

function updateCashCollectionReceiptTax() {
    document.getElementById("tax_actual").value = toEn(
        document.getElementById("tax_fake").value.toString()
    );
    document.getElementById("tax_fake").value = toBn(
        document.getElementById("tax_fake").value.toString()
    );
}

function updateCashCollectionReceiptTotalCash() {
    document.getElementById("total_cash_actual").value = toEn(
        document.getElementById("total_cash_fake").value.toString()
    );
    document.getElementById("total_cash_fake").value = toBn(
        document.getElementById("total_cash_fake").value.toString()
    );
}

if (document.getElementById("cash_collection_receipt_form")) {
    if (document.getElementById("tax_collection_seriel_start_fake")) {
        document.getElementById("tax_collection_seriel_start_fake").onkeyup =
            updateCashCollectionReceiptStartSeriel;
    }
    if (document.getElementById("tax_collection_seriel_end_fake")) {
        document.getElementById("tax_collection_seriel_end_fake").onkeyup =
            updateCashCollectionReceiptEndSeriel;
    }
    if (document.getElementById("pole_count_fake")) {
        document.getElementById("pole_count_fake").onkeyup =
            updateCashCollectionReceiptPoleCount;
    }
    if (document.getElementById("pole_cost_fake")) {
        document.getElementById("pole_cost_fake").onkeyup =
            updateCashCollectionReceiptPoleCost;
    }
    if (document.getElementById("tax_fake")) {
        document.getElementById("tax_fake").onkeyup =
            updateCashCollectionReceiptTax;
    }
    if (document.getElementById("total_cash_fake")) {
        document.getElementById("total_cash_fake").onkeyup =
            updateCashCollectionReceiptTotalCash;
    }
}

// Build Cash Receipt
function buildCashReceipt(newCashReceiptData) {
    var cash_receipt_seriel_number_display = document.querySelectorAll(
            ".cash_receipt_seriel_number_display"
        ),
        cash_receipt_date_display = document.querySelectorAll(
            ".cash_receipt_date_display"
        ),
        cash_receipt_time_display = document.querySelectorAll(
            ".cash_receipt_time_display"
        ),
        tax_collector_name_display = document.querySelectorAll(
            ".tax_collector_name_display"
        ),
        tax_collectoin_receipt_seriel_number_display =
            document.querySelectorAll(
                ".tax_collectoin_receipt_seriel_number_display"
            ),
        tax_received_pole_cost_display = document.querySelectorAll(
            ".tax_received_pole_cost_display"
        ),
        tax_received_pole_count_display = document.querySelectorAll(
            ".tax_received_pole_count_display"
        ),
        received_tax_display = document.querySelectorAll(
            ".received_tax_display"
        ),
        received_total_cost_display = document.querySelectorAll(
            ".received_total_cost_display"
        ),
        received_total_cost_text_display = document.querySelectorAll(
            ".received_total_cost_text_display"
        ),
        cash_collector_name_display = document.querySelectorAll(
            ".cash_collector_name_display"
        );

    var created_at_datetime = Date(newCashReceiptData.created_at);

    var created_at_date = created_at_datetime.substring(4, 15);
    var created_at_time = created_at_datetime.substring(16, 24);

    var newDate = receiptDateBuilder(created_at_date);
    var newTime = receiptTimeBuilder(created_at_time);

    cash_receipt_seriel_number_display.forEach((element) => {
        element.innerHTML = toBn(
            newCashReceiptData.cash_receipt_seriel_number.toString()
        );
    });

    cash_receipt_date_display.forEach((element) => {
        element.innerHTML = toBn(newDate);
    });

    cash_receipt_time_display.forEach((element) => {
        element.innerHTML = toBn(newTime);
    });

    cash_collector_name_display.forEach((element) => {
        element.innerHTML = newCashReceiptData.cash_collector_user_name;
    });

    tax_collector_name_display.forEach((element) => {
        element.innerHTML = newCashReceiptData.tax_collector_user_name;
    });

    tax_collectoin_receipt_seriel_number_display.forEach((element) => {
        element.innerHTML =
            toBn(newCashReceiptData.tax_collection_seriel_start.toString()) +
            " - " +
            toBn(newCashReceiptData.tax_collection_seriel_end.toString());
    });

    tax_received_pole_cost_display.forEach((element) => {
        element.innerHTML = toBn(
            numberSeparateWithComma(
                parseFloat(newCashReceiptData.pole_cost).toFixed(2).toString()
            )
        );
    });

    tax_received_pole_count_display.forEach((element) => {
        element.innerHTML = toBn(newCashReceiptData.pole_count);
    });

    received_tax_display.forEach((element) => {
        element.innerHTML = toBn(
            numberSeparateWithComma(
                parseFloat(newCashReceiptData.tax).toFixed(2).toString()
            )
        );
    });

    received_total_cost_display.forEach((element) => {
        element.innerHTML = toBn(
            numberSeparateWithComma(
                parseFloat(newCashReceiptData.total_cash).toFixed(2).toString()
            )
        );
    });

    received_total_cost_text_display.forEach((element) => {
        element.innerHTML = numberToWords(
            parseFloat(newCashReceiptData.total_cash).toFixed(2).toString()
        );
    });
}

// Cash Receipt Printer
function printCashReceipt() {
    var originalContents = document.body.innerHTML;
    $("#print_cash_receipt").show();
    html2canvas(document.getElementById("printable-area")).then((canvas) => {
        var myImage = canvas.toDataURL("image/png");
        var tmp = window.open();
        $(tmp.document.body)
            .html("<img src=" + myImage + " alt=''>")
            .ready(function () {
                tmp.print();
                tmp.close();
            });
    });
    $("#print_cash_receipt").hide();
}

// Cash Receipt Form Ajax Submit Request
function cashReceiptFormSubmitAjaxRequest(print = true) {
    $.ajax({
        url: "/cashcollection/receipt",
        type: "POST",
        data: {
            tax_collector_user_id: $("#tax_collector_user_id").val(),
            tax_collection_seriel_start: $(
                "#tax_collection_seriel_start_actual"
            ).val(),
            tax_collection_seriel_end: $(
                "#tax_collection_seriel_end_actual"
            ).val(),
            pole_count: $("#pole_count_actual").val(),
            pole_cost: $("#pole_cost_actual").val(),
            tax: $("#tax_actual").val(),
            total_cash: $("#total_cash_actual").val(),
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            console.log(response);
            if (response) {
                buildCashReceipt(response);

                toastrBox(
                    "Success",
                    "ক্যাশ আদায়ের তথ্যাবলী সফলভাবে নিবন্ধিত হয়েছে।"
                );

                if (print) {
                    printCashReceipt();
                }

                $("#cash_collection_receipt_form_expansion").hide();

                $("#cash_collection_receipt_form")[0].reset();
            }
        },
        error: function (response) {
            if (response.responseJSON.errors.tax_collector_user_id) {
                toastrBox(
                    "Error",
                    response.responseJSON.errors.tax_collector_user_id
                );
            }

            if (response.responseJSON.errors.tax_collection_seriel_start) {
                toastrBox(
                    "Error",
                    response.responseJSON.errors.tax_collection_seriel_start
                );
            }

            if (response.responseJSON.errors.tax_collection_seriel_end) {
                toastrBox(
                    "Error",
                    response.responseJSON.errors.tax_collection_seriel_end
                );
            }

            if (response.responseJSON.errors.pole_count) {
                toastrBox("Error", response.responseJSON.errors.pole_count);
            }

            if (response.responseJSON.errors.pole_cost) {
                toastrBox("Error", response.responseJSON.errors.pole_cost);
            }

            if (response.responseJSON.errors.tax) {
                toastrBox("Error", response.responseJSON.errors.tax);
            }

            if (response.responseJSON.errors.total_cash) {
                toastrBox("Error", response.responseJSON.errors.total_cash);
            }
        },
    });
}

// Submit Cash Collection Form And Print
$("#cash_receipt_submit").click(function (event) {
    event.preventDefault();

    // let _token = $('meta[name="csrf-token"]').attr("content");

    cashReceiptFormSubmitAjaxRequest((print = true));
});

// Cash Collection Receive Translation
if (
    document.getElementsByClassName("cash_receipt_seriel_number_display_html")
) {
    var elements = document.querySelectorAll(
        ".cash_receipt_seriel_number_display_html"
    );
    elements.forEach((element) => {
        element.innerHTML = toBn(element.innerHTML);
    });
}

if (
    document.getElementsByClassName("tax_collection_seriel_number_display_html")
) {
    var elements = document.querySelectorAll(
        ".tax_collection_seriel_number_display_html"
    );
    elements.forEach((element) => {
        element.innerHTML = toBn(element.innerHTML);
    });
}

if (document.getElementsByClassName("total_cash_display_html")) {
    var elements = document.querySelectorAll(".total_cash_display_html");
    elements.forEach((element) => {
        element.innerHTML = toBn(numberSeparateWithComma(element.innerHTML));
    });
}

// Build Cash Receive Receipt
function buildCashReceiveReceipt(newCashReceiveReceiptData) {
    var cash_receipt_seriel_number_display = document.querySelectorAll(
            ".cash_receipt_seriel_number_display"
        ),
        cash_receipt_date_display = document.querySelectorAll(
            ".cash_receipt_date_display"
        ),
        cash_receipt_time_display = document.querySelectorAll(
            ".cash_receipt_time_display"
        ),
        tax_collector_name_display = document.querySelectorAll(
            ".tax_collector_name_display"
        ),
        tax_collectoin_receipt_seriel_number_display =
            document.querySelectorAll(
                ".tax_collectoin_receipt_seriel_number_display"
            ),
        tax_received_pole_cost_display = document.querySelectorAll(
            ".tax_received_pole_cost_display"
        ),
        tax_received_pole_count_display = document.querySelectorAll(
            ".tax_received_pole_count_display"
        ),
        received_tax_display = document.querySelectorAll(
            ".received_tax_display"
        ),
        received_total_cost_display = document.querySelectorAll(
            ".received_total_cost_display"
        ),
        received_total_cost_text_display = document.querySelectorAll(
            ".received_total_cost_text_display"
        ),
        cash_collector_name_display = document.querySelectorAll(
            ".cash_collector_name_display"
        );

    var created_at_datetime = Date(newCashReceiveReceiptData.updated_at);

    var created_at_date = created_at_datetime.substring(4, 15);
    var created_at_time = created_at_datetime.substring(16, 24);

    var newDate = receiptDateBuilder(created_at_date);
    var newTime = receiptTimeBuilder(created_at_time);

    cash_receipt_seriel_number_display.forEach((element) => {
        element.innerHTML = toBn(
            newCashReceiveReceiptData.cash_receipt_seriel_number.toString()
        );
    });

    cash_receipt_date_display.forEach((element) => {
        element.innerHTML = toBn(newDate);
    });

    cash_receipt_time_display.forEach((element) => {
        element.innerHTML = toBn(newTime);
    });

    cash_collector_name_display.forEach((element) => {
        element.innerHTML = newCashReceiveReceiptData.cash_collector_user_name;
    });

    tax_collector_name_display.forEach((element) => {
        element.innerHTML = newCashReceiveReceiptData.tax_collector_user_name;
    });

    tax_collectoin_receipt_seriel_number_display.forEach((element) => {
        element.innerHTML =
            toBn(
                newCashReceiveReceiptData.tax_collection_seriel_start.toString()
            ) +
            " - " +
            toBn(
                newCashReceiveReceiptData.tax_collection_seriel_end.toString()
            );
    });

    tax_received_pole_cost_display.forEach((element) => {
        element.innerHTML = toBn(
            numberSeparateWithComma(
                parseFloat(newCashReceiveReceiptData.pole_cost)
                    .toFixed(2)
                    .toString()
            )
        );
    });

    tax_received_pole_count_display.forEach((element) => {
        element.innerHTML = toBn(
            newCashReceiveReceiptData.pole_count.toString()
        );
    });

    received_tax_display.forEach((element) => {
        element.innerHTML = toBn(
            numberSeparateWithComma(
                parseFloat(newCashReceiveReceiptData.tax).toFixed(2).toString()
            )
        );
    });

    received_total_cost_display.forEach((element) => {
        element.innerHTML = toBn(
            numberSeparateWithComma(
                parseFloat(newCashReceiveReceiptData.total_cash)
                    .toFixed(2)
                    .toString()
            )
        );
    });

    received_total_cost_text_display.forEach((element) => {
        element.innerHTML = numberToWords(
            parseFloat(newCashReceiveReceiptData.total_cash)
                .toFixed(2)
                .toString()
        );
    });
}

// Cash Receipt Receive Printer
function printCashReceiveReceipt() {
    var originalContents = document.body.innerHTML;
    $("#print_cash_receive_receipt").show();
    html2canvas(document.getElementById("printable-area")).then((canvas) => {
        var myImage = canvas.toDataURL("image/png");
        var tmp = window.open();
        $(tmp.document.body)
            .html("<img src=" + myImage + " alt=''>")
            .ready(function () {
                tmp.print();
                tmp.close();
            });
    });
    $("#print_cash_receive_receipt").hide();
}

// Cash Receive Form Ajax Submit Request
function cashReceiveFormSubmitAjaxRequest(buttonId, print = true) {
    $.ajax({
        url: "/cashcollection/receivecash",
        type: "POST",
        data: {
            cash_receipt_seriel_number: $(
                "#cash_receipt_seriel_number_input_" + buttonId
            ).val(),
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            console.log(response);
            if (response) {
                buildCashReceiveReceipt(response);
                toastrBox("Success", "ক্যাশ আদায় সফল ভাবে সম্পন্ন হয়েছ।");
                if (print) {
                    printCashReceiveReceipt();
                }
                var tableRowId = "#row_" + response.cash_receipt_seriel_number;
                $(tableRowId).hide();
            }
        },
        error: function (response) {
            if (response.responseJSON.errors.cash_receipt_seriel_number) {
                toastrBox(
                    "Error",
                    response.responseJSON.errors.cash_receipt_seriel_number
                );
            }
        },
    });
}

// Submit Cash Receive Form And Print
$(".cash_receive_submit").click(function (event) {
    event.preventDefault();

    var buttonId = this.id;

    // let _token = $('meta[name="csrf-token"]').attr("content");

    cashReceiveFormSubmitAjaxRequest(buttonId, (print = true));
});
