//var price = "0 UAH";
$(document).ready(function() {
    var text_list = "Без сортировки";
    var check_category = getUrlVars()["category"];
    var check_age = getUrlVars()["age"];
    var check_sex = getUrlVars()["sex"];
    var id;
    var check_log;
    var check_pass;
    var delete_id;


    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
            vars[key] = value;
        });
        return vars;
    }

    function language() {
        if ($.cookie("lang") == "ru") {
            $('#language-rus').attr('id', 'language-rus_active');
            $('#language-ua_active').attr('id', 'language-ua');
            $('#language-en_active').attr('id', 'language-en');
        }
        if ($.cookie("lang") == "ua") {
            $('#language-ua').attr('id', 'language-ua_active');
            $('#language-ru_active').attr('id', 'language-ru');
            $('#language-en_active').attr('id', 'language-en');
        }
        if ($.cookie("lang") == "en") {
            $('#language-en').attr('id', 'language-en_active');
            $('#language-ua_active').attr('id', 'language-ua');
            $('#language-rus_active').attr('id', 'language-rus');
        }
    }

    language();

    if (window.location.pathname == "/tovar.php") {
        check_search_filter();
    }

    if (window.location.pathname == "/colections.php") {
        $('body,html').animate({ scrollTop: 330 }, 800);
    }

    cart_price();


    if (window.location.pathname == "/product.php") {
        $('body,html').animate({ scrollTop: 255 }, 800);
        recommended_pr();

    }



    function check_search_filter() {

        var check_color = $(".check_color").map(function(i, el) {
            if ($(el).prop("checked")) {
                return $(el).val();
            }
        }).get();

        var price_from = $("#price_from").val();
        var price_to = $("#price_to").val();

        //alert (battery);

        $.ajax({
            url: 'search_filter.php',
            data: "sort=" + id + "&color=" + check_color + "&category=" + check_category + "&price_from=" + price_from + "&price_to=" + price_to + "&age=" + check_age + "&sex=" + check_sex,
            type: 'post',
            success: function(html) {

                $(".content-position").html(html).hide().fadeIn();
                $("#sorting-list").hide();
                $("#select-sort").text(text_list);
            }

        });
    }

    function cart_price() {
        $.ajax({
            url: 'models/cart_price.php',
            success: function(data) {
                $("#cart_price").text(data + " UAH");
                if ($.cookie("lang") == "ru") {
                    $("#all-price-cart").text("Общая сумма " + data + " UAH");
                }
                if ($.cookie("lang") == "ua") {
                    $("#all-price-cart").text("Загальна сума " + data + " UAH");
                }
                if ($.cookie("lang") == "en") {
                    $("#all-price-cart").text("Total amount " + data + " UAH");
                }

            }

        });
    }

    function recommended_pr() {
        var products_id = getUrlVars()["id"];
        var color = $("#color").text();
        $.ajax({
            url: 'models/recommended_products.php',
            data: "id=" + products_id + "&color=" + color,
            type: 'post',
            success: function(html) {
                $(".wrapper-recomended").html(html).fadeIn(0);
            }

        });
    }


    $("#select-sort").click(function() {
        $("#sorting-list").slideToggle(80);

    });

    $("#sorting-list a").click(function() {
        id = $(this).attr('id');
        check_search_filter();
        text_list = $(this).text();
    });





    $('#price_to').focusout(function() {
        check_search_filter();
    });

    $(".check_color").click(function() {
        check_search_filter();
    });




    $("#reg-form").submit(function(event) {
        // event.preventDefault(); // прерываем отправку формы

        var data = $("#reg-form").serialize();
        $.ajax({
            type: "POST",
            url: "reg/handler_reg.php",
            data: data,
            //dataType: "html",
            /*error: function(req, text, error) {
                $("#reg_message").addClass("reg_mess_error").fadeIn(400).html("Net");
            },
            beforeSend: function() {
                $("#reg_message").html('Загрузка...');
            },*/
            success: function(html) {
                if ((check_log != true) && (check_pass != true)) {
                    $(".reg-form").fadeOut(300);
                    $("#reg_message").addClass("reg_mess_good").fadeIn(400).html("Вы успешно зарегистрированы!");
                    $.ajax({
                        type: "POST",
                        url: "include/auth.php",
                        data: "login=" + $("#username").val() + "&pass=" + $("#password").val(),
                        dataType: "html",
                        cache: false,
                        success: function(data) {}
                    });
                    setTimeout(function() {
                        document.location.href = "index.php";
                    }, 3000);

                } else {
                    $("#reg_message").addClass("reg_mess_error").fadeIn(400).html("net");
                }




            }
        });

        return false;
    });

    $("#username").focusout(function() {
        var login = $("#username").val();
        $.ajax({
            type: "POST",
            url: "reg/check_login.php",
            data: "login=" + login,
            dataType: "json"
        }).done(function(data) {
            $('#check_log').show();
            if (data == true) {
                check_log = true;
                $("#check_log").attr("src", "img/krestik.png");
            } else {
                $("#check_log").attr("src", "img/galochka.png");
                check_log = false;
            }


        });
    });



    $("#password1").focusout(function() {
        var password = $("#password").val();
        var password1 = $("#password1").val();

        $('#check_pass').show();
        if (password == password1) {
            check_pass = false;
            $("#check_pass").attr("src", "img/galochka.png");
        } else {
            $("#check_pass").attr("src", "img/krestik.png");
            check_pass = true;
        }
    });




    $("#cart_add").click(function() {
        var check_id = getUrlVars()["id"];
        var size = $("#size").val();
        var color = $(".select-color").val();
        var quantity = $("#quantity").val();
        var comment = $("#comment").val();
        //alert(color);
        if ((size != "") && (parseInt($("#quantity").val()) != "NaN") && (parseInt($("#quantity").val()) > 0)) {
            if (size == undefined) {
                if ($.cookie("lang") == "ru") {
                    size = "Без размера";
                }
                if ($.cookie("lang") == "ua") {
                    size = "Без розміру";
                }
                if ($.cookie("lang") == "en") {
                    size = "Without size";
                }

            }

            if ($("#quantity_p").text() != "") {
                var q = parseInt($("#quantity_p").text()) - parseInt($("#quantity").val());
                if (q >= 0) {
                    $.ajax({
                        type: "POST",
                        url: "models/add_cart.php",
                        data: "id=" + check_id + "&size=" + size + "&quantity=" + quantity + "&comment=" + comment + "&color=" + color,
                        dataType: "html",
                        cache: false,
                        success: function(data) {
                            if ($.cookie("lang") == "ru") {
                                $("#cart_message").fadeIn(600).html("Товар успешно добавлен в корзину");
                            }
                            if ($.cookie("lang") == "ua") {
                                $("#cart_message").fadeIn(600).html("Товар успішно доданий до кошика");
                            }
                            if ($.cookie("lang") == "en") {
                                $("#cart_message").fadeIn(600).html("Product succeful was added to cart");
                            }
                            cart_price();
                            setTimeout(function() {
                                $("#cart_message").fadeOut(1500);
                            }, 1500);
                        }
                    });
                } else {
                    if ($.cookie("lang") == "ru") {
                        $("#size_message").fadeIn(600).html("Выберите размер или введите корректное количество");
                    }
                    if ($.cookie("lang") == "ua") {
                        $("#size_message").fadeIn(600).html("Виберіть розмір або введіть коректну кількість");
                    }
                    if ($.cookie("lang") == "en") {
                        $("#size_message").fadeIn(600).html("Chose size");
                    }

                    setTimeout(function() {
                        $("#size_message").fadeOut(1500);
                    }, 1500);
                }

            } else {
                $.ajax({
                    type: "POST",
                    url: "models/add_cart.php",
                    data: "id=" + check_id + "&size=" + size + "&quantity=" + quantity + "&comment=" + comment + "&color=" + color,
                    dataType: "html",
                    cache: false,
                    success: function(data) {
                        if ($.cookie("lang") == "ru") {
                            $("#cart_message").fadeIn(600).html("Товар успешно добавлен в корзину");
                        }
                        if ($.cookie("lang") == "ua") {
                            $("#cart_message").fadeIn(600).html("Товар успішно доданий до кошика");
                        }
                        if ($.cookie("lang") == "en") {
                            $("#cart_message").fadeIn(600).html("Product succeful was added to cart");
                        }
                        cart_price();
                        setTimeout(function() {
                            $("#cart_message").fadeOut(1500);
                        }, 1500);
                    }
                });
            }



        } else {
            if ($.cookie("lang") == "ru") {
                $("#size_message").fadeIn(600).html("Выберите размер или введите корректное количество");
            }
            if ($.cookie("lang") == "ua") {
                $("#size_message").fadeIn(600).html("Виберіть розмір або введіть коректну кількість");
            }
            if ($.cookie("lang") == "en") {
                $("#size_message").fadeIn(600).html("Chose size");
            }

            setTimeout(function() {
                $("#size_message").fadeOut(1500);
            }, 1500);
        }

    });



    //$('.delete_from_cart').click(function(){
    $('.cart-item').on('click', '.delete_from_cart', function() {
        delete_id = $(this).attr("id");
        //alert(1);
        $.ajax({
            type: "POST",
            url: "include/delete_from_cart.php",
            data: "id=" + delete_id,
            dataType: "html",
            cache: false,
            success: function(html) {
                //$(".wrapper-cart").html(html).hide().fadeIn(500);
                //alert(2);
                location.reload();

            }
        });

    });



    $("#button-auth").click(function() {
        var auth_login = $("#auth_login").val();
        var auth_pass = $("#auth_pass").val();


        if (auth_login == "" || auth_login.length > 30) {
            $("#auth_login").css("borderColor", "red");
            send_login = "no";
        } else {
            $("#auth_login").css("borderColor", "green");
            send_login = "yes";
        }


        if (auth_pass == "" || auth_pass.length > 15) {
            $("#auth_pass").css("borderColor", "red");
            send_pass = "no";
        } else {
            $("#auth_pass").css("borderColor", "green");
            send_pass = "yes";
        }

        /*if ($("#rememberme").prop('checked')){
        auth_rememberme = "yes";

     }else { auth_rememberme = "no"; }*/


        if (send_login == "yes" && send_pass == "yes") {

            $.ajax({
                type: "POST",
                url: "include/auth.php",
                data: "login=" + auth_login + "&pass=" + auth_pass,
                dataType: "html",
                cache: false,
                success: function(data) {
                    if (data == "yes_auth" || data == "yes_auth_wholesaler") {
                        $("#auth_login").css("borderColor", "green");
                        $("#auth_pass").css("borderColor", "green");
                        location.reload();
                    } else {
                        $("#message-auth").slideDown(400);
                        $("#auth_pass").css("borderColor", "red");
                        $("#auth_login").css("borderColor", "red");
                        //alert("qwe");
                    }

                }
            });
        }
    });

    $('#exit').click(function() {
        $.ajax({
            type: "POST",
            url: "include/logout.php",
            success: function(html) {

            }

        });
        location.reload();
    });

    $('#acept-btn').click(function() {
        $('.wrapper-cart').hide();
        $('.form-cart').show().fadeIn();
        $('html, body').animate({ scrollTop: 0 }, 300);


    });

    $("#form-cart-id").submit(function(event) {
        event.preventDefault(); // прерываем отправку формы
        var data = $("#form-cart-id").serialize();
        $.ajax({
            type: "POST",
            url: "models/order.php",
            data: data,
            success: function(html) {

                $.ajax({
                    type: "POST",
                    url: "include/delete_users_cart.php",
                    data: data,
                    success: function(data) {

                        //                        if ($.cookie("lang") == "ru") {
                        //                            alert("Ваш заказ принят");
                        //                        }
                        //                        if ($.cookie("lang") == "ua") {
                        //                            alert("Ваше замовлення прийнято");
                        //                        }
                        //                        if ($.cookie("lang") == "en") {
                        //                            alert("Your arder was accepted");
                        //                        }


                        document.location.href = "index.php";

                    }
                });
                alert(html);
                /*$("#success_message").fadeIn(600).html("Ваш заказ принят");
                        setTimeout(function () {
                            $("#success_message").fadeOut(1500);
                           
                        }, 1500);*/

            }
        });

    });

    $('#plus').click(function() {
        var q = parseInt($("#quantity").val()) + 1;
        $("#quantity").val(q);

    });

    $('#minus').click(function() {
        var q = parseInt($("#quantity").val()) - 1;
        $("#quantity").val(q);
        //alert(parseInt("q"));

    });


    $('#button_search').click(function() {

        var request = $("#text").val();
        $.cookie("request", $("#text").val());

    });

});
