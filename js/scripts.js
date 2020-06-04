// Переменные
const script_file = path_to_files + '/main.php';

// Календарь
$('#date').click(function () {
    $(document).ready(function () {
        $("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            cell_border: true,
            today: true,
            weekstartson: 0,
            nav_icon: {
                prev: '<i class="fa fa-arrow-circle-left"></i>',
                next: '<i class="fa fa-arrow-circle-right"></i>'
            },
            data: eventData,
            legend: [{
                    type: "text",
                    label: "Rates:"
                },
                {
                    type: "block",
                    label: "Discounted",
                    classname: "green"
                },
                {
                    type: "block",
                    label: "Regular",
                    classname: "yellow"
                },
                {
                    type: "block",
                    label: "Peak",
                    classname: "red"
                }
            ]
        });
    });
});

function myDateFunction(id) {
    var date = $("#" + id).data("date");
    $("#date").val(date);
    $("#date").text(date);
    var container = $(".zabuto_calendar");
    container.hide();
    return true;
};

$(document).mouseup(function (e) {
    var container = $(".zabuto_calendar");
    if (container.has(e.target).length === 0) {
        container.hide();
    }
});

$('#date').on('click', function () {
    $('.zabuto_calendar').show();
});

// Сбор первой информация с calculator
function CalculatorInfo() {
    // Собираем данные
    move = $('#move option:selected').text();
    from = $('#from option:selected').text();
    to = $('#to option:selected').text();
    // Вывод количества рабочих
    crew = $('#move').val();
    date = $("#date").val();
    console.log(date);

    // Расчет цены работы за час
    hour_cost = $('#move').val();
    if (hour_cost == 2) {
        $('#movers_cost').text('90')
    } else if (hour_cost == 3) {
        $('#movers_cost').text('130')
    } else {
        $('#movers_cost').text('165')
    }

    // Рачет время работы
    time_form = $('#from').val();
    time_to = $('#to').val();
    time_min = ((Number(time_form) + Number(time_to)) / 2).toFixed(0);
    time_max = (((Number(time_form) + Number(time_to)) / 2) + 2).toFixed(0);

    // Расчет стоимости
    movers_cost = $('#movers_cost').text();
    sum_min = movers_cost * time_min;
    sum_max = movers_cost * time_max;

    // Расчет времени доставки
    distance = $('#distance').text();

    // Записываем данные
    $('#result_move').text(move);
    $('#result_from').text(from);
    $('#result_to').text(to);
    $('#movers_crew').text(crew);
    $('#min').text(time_min);
    $('#max').text(time_max);
    $('#cost_min').text(sum_min);
    $('#cost_max').text(sum_max);
    $('#date_input').val(date);
};

// Валидация формы
function Validate() {
    $(".calculator").validate({
        rules: {
            date: {
                required: true,
            },
            zipcode1: {
                required: true,
                digits: true,
            },
            zipcode2: {
                required: true,
                digits: true,
            },
            from: {
                required: true,
            },
            to: {
                required: true,
            },
            move: {
                required: true,
            },
        },
        messages: {
            date: {
                required: '',
            },
            zipcode1: {
                required: '',
            },
            zipcode2: {
                required: '',
            },
            from: {
                required: '',
            },
            to: {
                required: '',
            },
            move: {
                required: '',
            },
        }
    });
    if ($('.calculator').valid()) {
        $('.calculator').removeClass("active");
        $('.result').addClass("active");
    }
}

function FormSend() {
    let data = {
        date: $("#date").val(),
        size_move: $('#move option:selected').text(),
        from: $('#from option:selected').text(),
        to: $('#to option:selected').text(),
        from_sity: $('.fromcity').text(),
        from_state: $('.fromstate').text(),
        to_sity: $('.tocity').text(),
        to_state: $('.tostate').text(),
        name: $('[name="name"]').val(),
        lname: $('[name="lname"]').val(),
        email: $('[name="email"]').val(),
        phone: $('[name="phone"]').val(),
        start_time: $('[name="start_time"] option:selected').val(),
        comments: $('[name="comments"]').text(),
    };
    let validate = formValidate(data);
    if (validate !== true) {
        validate.classList.add('error');
        return false;
    }
    $.ajax({
        url: script_file,
        method: 'POST',
        data: {
            request: 'orderFormSend',
            data: data
        },
        success: (data) => {
            if (data == 'manager: 1') {
                setTimeout(() => {
                    $('.success, .overlay').show();
                }, 1000);
                setTimeout(() => {
                    $('.success, .overlay').hide();
                    $('.book').removeClass("active");
                    $('.calculator').addClass("active");
                }, 2000);
            } else {
                return false;
            }
        }
    });
}

/*  */
function formValidate(data) {
    let elements = {
            name: document.querySelector('[name="name"]'),
            lname: document.querySelector('[name="lname"]'),
            email: document.querySelector('[name="email"]'),
            phone: document.querySelector('[name="phone"]'),
            start_time: document.querySelector('[name="start_time"]'),
        },
        email_rule = /^[\w\.\d-_]+@[\w\.\d-_]+\.\w{2,8}$/i;
    console.log(data);
    for (elem in elements) {
        elements[elem].classList.remove('error');
    }
    if (data.name.length < 1) return elements.name;
    if (data.lname.length < 1) return elements.lname;
    if (!email_rule.test(data.email)) return elements.email;
    if (data.phone.length < 5) return elements.phone;
    if (data.start_time === '') return elements.start_time;
    return true;
}

$('.result_back').click(function () {
    $('.result').removeClass("active");
    $('.calculator').addClass("active");
});

$('.result__book').click(function () {
    $('.result').removeClass("active");
    $('.book').addClass("active");
});


$('.calculator').submit(function (e) {
    e.preventDefault();
});

// Действия при нажатии кнопки "Calculate" 
$('#calc').click(function () {
    Validate();
    CalculatorInfo();
});

// Действия при нажатии кнопки "Book now" 
$('#book_now').click(function () {
    FormSend();
});

$(document).ready(function () {

});

/*  */
$(function () {
    // IMPORTANT: Fill in your client key
    var clientKey = "js-TBApvBKp9qIpRBYc0B4uh5Gk8Q1DqV4z643kPYKZMgNVZAJmVQngPVL8XBTC3nxu";

    var cache = {};
    var container = $("#calculatorform");
    var cont = $("#result");
    var errorDiv = container.find("div.text-error");

    /** Handle successful response */
    function handleResp(data) {
        // Check for error
        if (data.error_msg)
            errorDiv.text(data.error_msg);
        else if ("city" in data) {
            // Set city and state
            cont.find("div.fromcity").text(data.city);
            cont.find("div.fromstate").text(data.state);
        }
    }

    // Set up event handlers
    container.find("input[name='zipcode1']").on("keyup change", function () {
        // Get zip code
        var zipcode = $(this).val().substring(0, 5);
        if (zipcode.length == 5 && /^[0-9]+$/.test(zipcode)) {
            // Clear error
            errorDiv.empty();

            // Check cache
            if (zipcode in cache) {
                handleResp(cache[zipcode]);
            } else {
                // Build url
                var url = "https://www.zipcodeapi.com/rest/" + clientKey + "/info.json/" + zipcode + "/radians";

                // Make AJAX request
                $.ajax({
                    "url": url,
                    "dataType": "json"
                }).done(function (data) {
                    handleResp(data);

                    // Store in cache
                    cache[zipcode] = data;
                }).fail(function (data) {
                    if (data.responseText && (json = $.parseJSON(data.responseText))) {
                        // Store in cache
                        cache[zipcode] = json;

                        // Check for error
                        if (json.error_msg)
                            errorDiv.text(json.error_msg);
                    } else
                        errorDiv.text('Request failed.');
                });
            }
        }
    }).trigger("change");
});

$(function () {
    // IMPORTANT: Fill in your client key
    var clientKey = "js-2WJFALyJ821muR9b6oiuL8pfhJ5w2VthtrktdRBVK4DkoL123ZT1JLSxGN81Yqc2";

    var cache = {};
    var container = $("#calculatorform");
    var cont = $("#result");
    var errorDiv = container.find("div.text-error");

    /** Handle successful response */
    function handleResp(data) {
        // Check for error
        if (data.error_msg)
            errorDiv.text(data.error_msg);
        else if ("city" in data) {
            // Set city and state
            cont.find("div.tocity").text(data.city);
            cont.find("div.tostate").text(data.state);
        }
    }

    // Set up event handlers
    container.find("input[name='zipcode2']").on("keyup change", function () {
        // Get zip code
        var zipcode = $(this).val().substring(0, 5);
        if (zipcode.length == 5 && /^[0-9]+$/.test(zipcode)) {
            // Clear error
            errorDiv.empty();

            // Check cache
            if (zipcode in cache) {
                handleResp(cache[zipcode]);
            } else {
                // Build url
                var url = "https://www.zipcodeapi.com/rest/" + clientKey + "/info.json/" + zipcode + "/radians";

                // Make AJAX request
                $.ajax({
                    "url": url,
                    "dataType": "json"
                }).done(function (data) {
                    handleResp(data);

                    // Store in cache
                    cache[zipcode] = data;
                }).fail(function (data) {
                    if (data.responseText && (json = $.parseJSON(data.responseText))) {
                        // Store in cache
                        cache[zipcode] = json;

                        // Check for error
                        if (json.error_msg)
                            errorDiv.text(json.error_msg);
                    } else
                        errorDiv.text('Request failed.');
                });
            }
        }
    }).trigger("change");
});

$(function () {
    // IMPORTANT: Fill in your client key
    var clientKey = "js-wmY91riSMsKSbPBf1kavU7QMxqpI6dfouvgqALcwLEbgSG0ODOhHjt0d5e7RjmSI";

    var cache = {};
    var container = $("#calculatorform");
    var cont = $("#result");
    var errorDiv = container.find("div.text-error");

    /** Handle successful response */
    function handleResp(data) {
        // Check for error
        if (data.error_msg)
            errorDiv.text(data.error_msg);
        else if ("distance" in data) {
            // Show div
            cont.find("div.distance").show()
                // Set distance
                .find("span.distance").text((data.distance).toFixed(1));
        }
    }

    // Set up event handlers
    container.find("input[name='zipcode1'],input[name='zipcode2']").on("keyup change", function () {
        // Get zip code
        var zipcode1 = $("input[name='zipcode1']").val().substring(0, 5);
        var zipcode2 = $("input[name='zipcode2']").val().substring(0, 5);
        if (zipcode1.length == 5 && /^[0-9]+$/.test(zipcode1) && zipcode2.length == 5 && /^[0-9]+$/.test(zipcode2)) {
            // Clear error
            errorDiv.empty();

            // Check cache
            var cacheKey = zipcode1 + '-' + zipcode2;
            if (cacheKey in cache) {
                handleResp(cache[cacheKey]);
            } else {
                // Build url
                var url = "https://www.zipcodeapi.com/rest/" + clientKey + "/distance.json/" + zipcode1 + "/" + zipcode2 + "/mile";

                // Make AJAX request
                $.ajax({
                    "url": url,
                    "dataType": "json"
                }).done(function (data) {
                    handleResp(data);

                    // Store in cache
                    cache[cacheKey] = data;
                }).fail(function (data) {
                    if (data.responseText && (json = $.parseJSON(data.responseText))) {
                        // Store in cache
                        cache[cacheKey] = json;

                        // Check for error
                        if (json.error_msg)
                            errorDiv.text(json.error_msg);
                    } else
                        errorDiv.text('Request failed.');
                });
            }
        }
    }).trigger("change");
});

$(document).ready(function () {
    $('a[href^="#"], *[data-href^="#"]').on('click', function (e) {
        e.preventDefault();
        var t = 100;
        var d = $(this).attr('data-href') ? $(this).attr('data-href') : $(this).attr('href');
        $('html,body').stop().animate({
            scrollTop: $(d).offset().top - 100
        }, t);
    });
});