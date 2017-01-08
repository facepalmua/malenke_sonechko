$(document).ready(function(){
    var v;
    var id;
    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
    }
    
    $("#button_search").click(function () {
        var search = $("#search_product").val();
        
        
        $.ajax({
            url:'include/search.php',
            data : "title="+search,
            type:'post',
            success:function (html) {
                    
                    $("#tovar").html(html).hide().fadeIn(200);
				    
            }
				
        });
    });      
    
    
    $('#tovar').on('click', '.hide-btn',function(){
        //alert("wfw");
        var id = $(this).attr("id");
        v = 0;
        $(this).text("Показать товар");
        $(this).removeClass("hide-btn");
        $(this).addClass("show-btn");
        $.ajax({
            url:'include/hide_show_product.php',
            data : "id="+id+"&v="+v,
            type:'post',
            success:function (html) {
                
            }
				
        });
    });      
    
    $('#tovar').on('click', '.show-btn',function(){
        //alert("wfw");
        var id = $(this).attr("id");
        v = 1;
        $(this).text("Спрятать товар");
        $(this).removeClass("show-btn");
        $(this).addClass("hide-btn");
        
        $.ajax({
            url:'include/hide_show_product.php',
            data : "id="+id+"&v="+v,
            type:'post',
            success:function (html) {
                
            }
		
        
        });
    }); 
    
    
    $("#edit_product").submit(function(event) {
        event.preventDefault();
        var data = $("#edit_product").serialize();
        id = getUrlVars()["id"];
        //alert(id);
        $.ajax({
            type: "POST",
            url:"include/data_form_edit_product.php",
            data:data+"&id="+id,
        
            success: function(html){
                $("#edit_product").fadeOut(100);
                $("#message").fadeIn(400).html("Изменения внесены");
                setTimeout(function () {
                     document.location.href="tovar.php";
                }, 2000);
            }
        });
 
        
    });
    
    
    $("#new_product").submit(function(event) {
        event.preventDefault();
        var data = $("#new_product").serialize();
        
        $.ajax({
            type: "POST",
            url:"include/add_new_product.php",
            data:data,
        
            success: function(html){
                $("#new_product").fadeOut(100);
                $("#message").fadeIn(400).html("Товар добавлен");
                setTimeout(function () {
                     document.location.href="tovar.php";
                }, 2000);
            }
        });
 
        
    });
    
      
    
    $('.take_order').click(function () {
        //var search = $("#search_product").val();
        //alert("wef");
        var login = $(this).attr("id");
        var id = "#"+$(".take_order").attr("name");
        //alert(login);
        html2canvas($(id), {
                onrendered: function (canvas) {
                    var img = canvas.toDataURL('image/jpg').replace("image/jpg", "image/octet-stream");
                    window.open(img).href;
                    //window.location.href = img;                     
                }
            });
        $.ajax({
            type: "POST",
            url:"include/take_order.php",
            data: "login="+login,
            success: function(html){
                
                location.reload();
                //$("#block-header1").html(html).hide().fadeIn(200);
            }
        });
    }); 
    
    
    $('#tovar').on('click', '.remove_rights',function(){
        //alert("wfw");
        var id = $(this).attr("id");
        v = 0;
        $(this).text("Дать права");
        $(this).removeClass("remove_rights");
        $(this).addClass("give_the_right");
        $.ajax({
            url:'include/right.php',
            data : "id="+id+"&v="+v,
            type:'post',
            success:function (html) {
                
            }
				
        });
    });      
    
    $('#tovar').on('click', '.give_the_right',function(){
        //alert("wfw");
        var id = $(this).attr("id");
        v = 1;
        $(this).text("Снять права");
        $(this).removeClass("give_the_right");
        $(this).addClass("remove_rights");
        $.ajax({
            url:'include/right.php',
            data : "id="+id+"&v="+v,
            type:'post',
            success:function (html) {
                
            }
				
        });
    }); 
    
    
    $("#search_user").click(function () {
        var search = $("#search_login").val();
        
        
        $.ajax({
            url:'include/search_user.php',
            data : "login="+search,
            type:'post',
            success:function (html) {
                    
                    $("#tovar").html(html).hide().fadeIn(200);
				    
            }
				
        });
    });
    
    $("#button_active").click(function () {
        $("#orders").show();
        $("#active_orders").hide();
    });   
    
    $("#button_orders").click(function () {
        $("#active_orders").show();
        $("#orders").hide();
    });   
     
    $("#add_image").click(function () {
        var img = $("#slider_img").val();
        var id = $("#slider_id").val();
        
        $.ajax({
            url:'include/add_slider.php',
            data : "img="+img+"&id="+id,
            type:'post',
            success:function (html) {
                    
                $("#new_product").fadeOut(100);
                $("#message").fadeIn(400).html("Товар добавлен");
                setTimeout(function () {
                     document.location.href="tovar.php";
                }, 2000);
				    
            }
				
        });
    });
    
    $('.delete').click(function(){
        delete_id = $(this).attr("id");
        if (confirm("Удалить товар?")) {
             $.ajax({
                type: "POST",
                url: "include/delete.php",
                data: "id=" + delete_id,
                dataType: "html",
                cache: false,
                success: function(html) {
                    location.reload();

                }
            });
        } 

       

    });
    
});

