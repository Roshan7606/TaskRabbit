$base_url = "http://localhost/MUNCHBOX/";
$("#wishlist-res").click(function(){
    $("#wishlist-cancel").removeClass("wishlist-li");
    $("#wishlist-item").removeClass("wishlist-li");
    $("#wishlist-res").addClass("wishlist-li"); 
    $("#wishlist-res").addClass("animated fade-in"); 
    
});
$("#wishlist-cancel").click(function(){
    $("#wishlist-res").removeClass("wishlist-li");
    $("#wishlist-item").removeClass("wishlist-li");
    $("#wishlist-cancel").addClass("wishlist-li"); 
    $("#wishlist-res").addClass("animated fade-in"); 
    
});
$("#wishlist-item").click(function(){
    $("#wishlist-res").removeClass("wishlist-li");
    $("#wishlist-cancel").removeClass("wishlist-li");
    $("#wishlist-item").addClass("wishlist-li"); 
    $("#wishlist-res").addClass("animated fade-in"); 
    
});
function hello() {
  return "Write something clever here...";
}
function findresindex(id)
{
   window.location = $base_url + "Restaurant/"+id;
   $("#index-serch").html("<option>Select City</option>")
}
function findfood(search,id)
{
            $data = {search: search, id: id,action : "yes"};
            $path = $base_url + "Backend/findfood";
            if($("#food-item-not-found").val() == "no")
            {
                
                    $data = {search: search, id: id,action : "no"};
                    $path = $base_url + "Backend/findfood";
                    $.post($path, $data, function (data) {
                    $("#search_food_item").html(data);
                    $(".search__input").val("");
                     
            });
            }
            else
            {
            $.post($path, $data, function (data) {
                $("#search_food_item").html(data);
            });
            }
}

function cancelorder(id)
{
     $data={bill_id : id};
    $path = $base_url + "Backend/cancelorder";
    $.post($path,$data,function(data){
       //alert(data);
      window.location = $base_url + "User-Order";
    });
}
function reorder(id)
{
    $data={bill_id : id};
    $path = $base_url + "Backend/reorder";
    $.post($path,$data,function(data){
    
      window.location = $base_url + "Order-review";
    });
}
$("#wishlist-product").click(function(){
    $("#wishlist-res").removeClass("wishlist-li");
    $("#wishlist-product").addClass("wishlist-li");
    $("#wishlist-product").addClass("animated fade-in");
});
function setsuggestion(sug){
    $data={suggetion : sug};
    $path = $base_url + "Backend/setsuggestion";
    $.post($path,$data,function(data){
    });
}
$(".user-detail .btn-checkout-confirm").click(function(){
    $data={count_number_confirm : 1};
    $path = $base_url + "Backend/upadateconfirmusersession";
    $.post($path,$data,function(data){
    });
    $(".user-detail #checkout-checkmark-icon").addClass("checkout-display-option-inline");
    $(".user-detail #checkout-btn-change").removeClass("checkout-display-option-none");
    $(".user-detail #checkout-btn-change").addClass("checkout-display-option-inline");
    $(".user-detail .btn-checkout").addClass("checkout-display-option-none");
    $(".title-address").css("display","block");
    $(".address-detail .checkout-address-body-display").addClass("checkout-display-option-flex");
    $(".address-detail h3").removeClass("text-light-white");
    $(".address-detail h3").removeClass("margin-b-none");
    $(".address-detail h3").addClass("margin-b-address-title");
});
$(".user-detail #checkout-btn-change").click(function(){
    $data={count_number_confirm : 0};
    $path = $base_url + "Backend/upadateconfirmusersession";
    $.post($path,$data,function(data){
    });
   $('.checkout-address-body-display').removeClass("checkout-display-option-flex");
   $('.checkout-address-body-display').addClass("checkout-display-option-none");
   $('.checkout-address-body-hidden').removeClass("checkout-display-option-block");
   $('.checkout-address-body-hidden').addClass("checkout-display-option-none");
   $(".address-detail .title-address").addClass("checkout-display-option-none");
   $(".address-detail h3").addClass("text-light-white");
    $(".address-detail h3").addClass("margin-b-none");
        $(".address-detail h3").html("Select delivery address<img id='checkout-checkmark-icon' src='"+$base_url+"assets/img/checkmark.png'><button id='checkout-btn-change'>CHANGE</button>");
    $(".user-detail #checkout-checkmark-icon").removeClass("checkout-display-option-inline");
    $(".user-detail #checkout-btn-change").removeClass("checkout-display-option-inline");
    $(".user-detail #checkout-btn-change").addClass("checkout-display-option-none");
    $(".user-detail .btn-checkout").removeClass("checkout-display-option-none");
    $(".user-detail .btn-checkout").addClass("checkout-display-option-inline");
    $('#address-label-corner-2').css("display","none");
       $('#address-label-corner-1').css("display","block");
       $(".order-content-checkout .place-order-btn").removeClass("checkout-display-option-block");
       $(".order-content-checkout .place-order-btn").addClass("checkout-display-option-none");
       $(".checkout-payment-body-2").addClass("display-none");
        $(".payment-method-show").css("display","none");
       $(".payment-detail #payment-checkmark-icon").removeClass("checkout-display-option-inline");
       $(".payment-detail #payment-checkmark-icon").addClass("display-none");
      $(".payment-detail #payment-btn-change").removeClass("checkout-display-option-inline");
      $(".payment-detail #payment-btn-change").addClass("display-none");
});


function delivercheckout(shid,seid){
    $data = {shipment_id : shid,restaurant_id : seid};
    $path = $base_url + "Backend/updatebill";
    $.post($path,$data,function(data){
        
        $cut_str = data.substring(0,5);
        if($cut_str == "error")
        {
            $ex_id = data.substring(5);
            $("#res-no-found-explore-btn").attr("href",$base_url+"Restaurant/"+$ex_id);
            $(".already-added").css("display","block");
            $(".already-added").removeClass("animated fadeOutDown slow");
            $(".already-added").addClass("animated bounceInUp");   
        }
        else
        {
             
            $('.checkout-address-body-hidden').addClass("checkout-display-option-block");
            $('.checkout-address-body-hidden').html(data);
            $('.checkout-address-body-display').removeClass("checkout-display-option-flex");
            $('#address-label-corner-2').css("display","block");
            $('#address-label-corner-1').css("display","none");
            $(".address-detail h3").html("Delivery Address<img id='checkout-checkmark-icon' src='"+$base_url+"assets/img/checkmark.png'><button id='checkout-btn-change' style='margin-left:311px !important;' onclick='showaddressdisplay();'>CHANGE</button>");;
            $(".address-detail #checkout-checkmark-icon").css("display","inline");
            $(".address-detail #checkout-btn-change").css("display","inline");
            $(".address-detail .title-address").css("display","none");
           
            $(".payment-method-show").css("display","block");
          
        }
    });
}
function showaddressdisplay(){
    $data={count_number_address : 0};
    $path = $base_url + "Backend/upadateconfirmaddresssession";
    $.post($path,$data,function(data){
    });
    $(".address-detail h3").html("Select delivery address<img id='checkout-checkmark-icon' src='"+$base_url+"assets/img/checkmark.png'><button id='checkout-btn-change' onclick='showaddressdisplay();'>CHANGE</button>");
    $(".address-detail #checkout-checkmark-icon").css("display","none");
    $(".address-detail #checkout-btn-change").css("display","nonne");
    $(".address-detail .title-address").css("display","inline-block");
    $(".address-detail h3").removeClass("margin-b-none");
    $('.checkout-address-body-hidden').removeClass("checkout-display-option-block");
    $('.checkout-address-body-hidden').addClass("checkout-display-option-none");
    $('.checkout-address-body-display').removeClass("checkout-display-option-none");
    $('.checkout-address-body-display').addClass("checkout-display-option-flex");
      $('#address-label-corner-2').css("display","none");
       $('#address-label-corner-1').css("display","block");
       $(".order-content-checkout .place-order-btn").removeClass("checkout-display-option-block");
       $(".order-content-checkout .place-order-btn").addClass("checkout-display-option-none");
       $(".payment-method-show").css("display","none");
       $(".checkout-payment-body-2").addClass("display-none");
       $(".payment-detail #payment-checkmark-icon").removeClass("checkout-display-option-inline");
       $(".payment-detail #payment-checkmark-icon").addClass("display-none");
      $(".payment-detail #payment-btn-change").removeClass("checkout-display-option-inline");
      $(".payment-detail #payment-btn-change").addClass("display-none");
    
};
function payment_method(value,amt)
{
    $value_cod = $("#payment-cod").attr("checked"); 
    $value_pod = $("#payment-pod").attr("checked");  

   if(value == "cod")
  {
      $data={payment_value : value};
    $path = $base_url + "Backend/upadatepaymentsession";
    $.post($path,$data,function(data){
        $("#checkout-order-btn-pod").addClass("display-none");
      $("#checkout-order-btn-cod").removeClass("display-none");
      
    });
      $(".payment-detail #payment-checkmark-icon").removeClass("display-none");
      $(".payment-detail #payment-checkmark-icon").addClass("checkout-display-option-inline");
      $(".payment-detail #payment-btn-change").removeClass("display-none");
      $(".payment-detail #payment-btn-change").addClass("checkout-display-option-inline");
     $(".checkout-payment-body-2").removeClass("display-none");
     $(".show-ckecked-payment-method img").attr("src",$base_url+"assets/img/cash-payment.png");
     $(".show-checked-payment-text b").html("Cash On Delivery");
     $(".payment-method-show").css("display","none");
      $(".order-content-checkout .place-order-btn").removeClass("checkout-display-option-none");
            $(".order-content-checkout .place-order-btn").addClass("checkout-display-option-block");
            $(".payment-indicate-icon").removeClass("checkout-label-corner-1");
            $(".payment-indicate-icon").addClass("checkout-label-corner-2");
  }
  else
  {
       $data={payment_value : value};
    $path = $base_url + "Backend/upadatepaymentsession";
    $.post($path,$data,function(data){
      $("#checkout-order-btn-cod").addClass("display-none");
      $("#checkout-order-btn-pod").removeClass("display-none");
    });

       $(".payment-detail #payment-checkmark-icon").removeClass("display-none");
      $(".payment-detail #payment-checkmark-icon").addClass("checkout-display-option-inline");
      $(".payment-detail #payment-btn-change").removeClass("display-none");
      $(".payment-detail #payment-btn-change").addClass("checkout-display-option-inline");
     $(".checkout-payment-body-2").removeClass("display-none");
      $(".checkout-payment-body-2").removeClass("display-none");
     $(".show-ckecked-payment-method img").attr("src",$base_url+"assets/img/online-payment.png");
     $(".show-checked-payment-text b").html("Online Payment");
     $(".payment-method-show").css("display","none");
      $(".order-content-checkout .place-order-btn").removeClass("checkout-display-option-none");
            $(".order-content-checkout .place-order-btn").addClass("checkout-display-option-block");
            $(".payment-indicate-icon").removeClass("checkout-label-corner-1");
            $(".payment-indicate-icon").addClass("checkout-label-corner-2");
  }
}
$(".btn-checkout-no").click(function(){
 $data={payment_value : "no"};
    $path = $base_url + "Backend/upadatepaymentsession";
    $.post($path,$data,function(data){
    });
    
});
function change_payment(){
    $data={payment_value : "no"};
    $path = $base_url + "Backend/upadatepaymentsession";
    $.post($path,$data,function(data){
    });
   document.getElementById('payment-cod').checked = false;
   document.getElementById('payment-pod').checked = false;
    $(".payment-method-show").css("display","block");
    $(".payment-detail #payment-checkmark-icon").removeClass("checkout-display-option-inline");
      $(".payment-detail #payment-checkmark-icon").addClass("display-none");
      $(".payment-detail #payment-btn-change").removeClass("checkout-display-option-inline");
      $(".payment-detail #payment-btn-change").addClass("display-none");
      $(".checkout-payment-body-2").addClass("display-none");
       $(".order-content-checkout .place-order-btn").removeClass("checkout-display-option-block");
            $(".order-content-checkout .place-order-btn").addClass("checkout-display-option-none");
            $(".payment-indicate-icon").removeClass("checkout-label-corner-2");
            $(".payment-indicate-icon").addClass("checkout-label-corner-1");
}
function view_more_item(){
     $id = $("div#last-div-view").last().attr("lastid");
    $data = {last_item_id : $id};
    $path = $base_url + "Backend/viewmoreitem";
    $.post($path,$data,function(data){
       $("#index-product").append(data);
    });
}
function addsubscriber()
{
    $email = $("#email").val();
    $data = {email: $email};
    $path = $base_url + "Backend/sendemail";
    if($email.length == 0)
    {
 
        $("#email-message").html("Please Enter Email to subscribe");
    }
    else
    {
        $.post($path, $data, function (data) {
        if (data == "emp_error")
        {
            $("#email-massage").text("");
        }
        else
        {
            $("#email").val("");
            $("#email-message").html("Thank yoou for subscribing on MUNCHBOX you receive notification when new offer comes ");
        }
        });
    }
}
function wishlist(id,type)
{
    $path = $base_url + "Backend/wishlist";
    $data = {id: id,type:type};
    $.post($path, $data, function (data) {
        $img_value=document.getElementById("add-wishlist-"+type+"-heart-image-"+id).src;
        if($img_value == "http://localhost/MUNCHBOX/assets/img/svg/013-heart-1.svg")
        {
            insert_wishlist(id,type);
        }
        else
        {
            delete_wishlist(id,type);
        }
    });
}
function insert_wishlist(id,type){
    $data = {id: id,type:type,action:"ins"};
    $path = $base_url + "Backend/wishlist";
    $.post($path, $data, function (data) {
    if(data=="ins_success")
    {
            $("#add-wishlist-"+type+"-heart-image-"+id).attr("src",$base_url+"assets/img/svg/010-heart.svg");
            $("#add-wishlist-"+type+"-heart-image-"+id).attr("title","Already Added In Wishlist");
            $(".add-wishlist-msg").css("display","block");
            $(".add-wishlist-msg").removeClass("animated fadeOutDown slow");
            $(".add-wishlist-msg").addClass("animated bounceInUp");
            $(".add-wishlist-msg p").html("<img src='"+$base_url+"assets/img/like.png' class='add-wishlist-msg-image' > "+type+" Added In Account > Favourite");
            setTimeout(function (){
                $(".add-wishlist-msg").removeClass("animated bounceInUp");
                $(".add-wishlist-msg").addClass("animated fadeOutDown slow");
                $(".add-wishlist-msg").css("display","none");
            },2000);
    }
    });
}
function delete_wishlist(id,type){
    $data = {id: id,type:type,action:"del"};
    $path = $base_url + "Backend/wishlist";
    $.post($path, $data, function (data) {
        if(data=="del_success")
        {
            $("#add-wishlist-"+type+"-heart-image-"+id).attr("src",$base_url+"assets/img/svg/013-heart-1.svg");
            $("#add-wishlist-"+type+"-heart-image-"+id).attr("title","Add To Favourite");
            $(".add-wishlist-msg").css("display","block");
            $(".add-wishlist-msg").removeClass("animated fadeOutDown slow");
            $(".add-wishlist-msg").addClass("animated bounceInUp");
            $(".add-wishlist-msg p").html("<img src='"+$base_url+"assets/img/dislike.png' class='add-wishlist-msg-image' > "+type+" Remove In Account > Favourite");
            setTimeout(function (){
                $(".add-wishlist-msg").removeClass("animated bounceInUp");
                $(".add-wishlist-msg").addClass("animated fadeOutDown slow");
                $(".add-wishlist-msg").css("display","none");
            },2000);
        }
    });
}
function remove_wishlist_item(id,type)
{
  
    
    $data = {id: id,type:type};
    $path = $base_url + "Backend/remove_wishlist";
    $.post($path, $data, function (data) {
        $("#user_wishlist_"+type).html(data);
        $(".add-wishlist-msg").css("display","block");
            $(".add-wishlist-msg").removeClass("animated fadeOutDown slow");
            $(".add-wishlist-msg").addClass("animated bounceInUp");
            $(".add-wishlist-msg p").html("<img src='"+$base_url+"assets/img/dislike.png' class='add-wishlist-msg-image' > "+type+" Remove In Account > Favourite");
            setTimeout(function (){
                $(".add-wishlist-msg").removeClass("animated bounceInUp");
                $(".add-wishlist-msg").addClass("animated fadeOutDown slow");
                $(".add-wishlist-msg").css("display","none");
            },2000);
    });
}
function call_cartmodal(pro_id)
{
   
    $("#add-product-" + pro_id).attr("data-toggle","modal");
}
function call_wishlist_modal(id)
{  
           $("#btn_wishlist_"+id).attr("data-toggle","modal");
}
function viewqty(pro_id,sel_id,user_id,price)
{
    
    $data = {pro_id: pro_id,sel_id:sel_id,user_id:user_id,qty:1,action:'ins_cart',price:price};
        $path = $base_url + "addtocart";
        $.post($path, $data, function (data) {
        if(data=="cart_already_added")
        {
            $(".already-added").css("display","block");
            $(".already-added").removeClass("animated fadeOutDown slow");
            $(".already-added").addClass("animated bounceInUp");
        }
        else
        {
            $path = $base_url + "Backend/getcount";
    $data = {};
    $.post($path,$data,function(data){
       
        $("#cart_counter").html(data);
    });
             $("#qty-num-product-"+pro_id).val(1);
            $("#cart_box").html(data);
            $("#cart_shop_"+user_id).html(data);
            $("#add-product-" + pro_id).hide();
            $("#product-qty-" + pro_id).show();
        }
        });
        
        
}
function qtydecre(pro_id,sel_id,user_id,price)
{
    $qty = parseInt($("#qty-num-"+pro_id).val())-1;
    $("#qty-num-"+pro_id).val($qty);
    $("#qty-num-product-"+pro_id).val($qty);
    $data = {pro_id: pro_id,sel_id:sel_id,user_id:user_id,qty:$qty,action:'up_cart',price:price};
    $path = $base_url + "addtocart";
    $.post($path, $data, function (data) {
        if(data=="Error_login")
        {
            $("#add-product-" + pro_id).attr("data-toggle","modal");
        }
        else
        {
             $path = $base_url + "Backend/getcount";
    $data = {};
    $.post($path,$data,function(data){

        $("#cart_counter").html(data);
    });
            $("#cart_box").html(data);
            $("#cart_shop_"+user_id).html(data);
        }
    });
    if($("#qty-num-"+pro_id).val() == "0")
    {
       
        $data = {pro_id: pro_id,sel_id:sel_id,user_id:user_id,action:'del_cart'};
        $.post($path, $data, function (data) {
        if(data=="Error_login")
        {
            $("#add-product-" + pro_id).attr("data-toggle","modal");
        }
        else
        {
              $path = $base_url + "Backend/getcount";
    $data = {};
    $.post($path,$data,function(data){
        
        $("#cart_counter").html(data);
    });
            $("#cart_box").html(data);
            $("#cart_shop_"+user_id).html(data);
            $("#add-product-" + pro_id).show();
            $("#product-qty-" + pro_id).hide();
            $("#qty-num-"+pro_id).val(1);    
        }
    });
    }
    
}
function qtyincre(pro_id,sel_id,user_id,price)
{
    $qty = parseInt($("#qty-num-"+pro_id).val())+1;
    $("#qty-num-"+pro_id).val($qty);
    $("#qty-num-product-"+pro_id).val($qty);
    $data = {pro_id: pro_id,sel_id:sel_id,user_id:user_id,qty:$qty,action:'up_cart',price:price};
    $path = $base_url + "addtocart";
    $.post($path, $data, function (data) {
         $path = $base_url + "Backend/getcount";
    $data = {};
    $.post($path,$data,function(data){
      
        $("#cart_counter").html(data);
    });
       $("#cart_box").html(data);
       $("#cart_shop_"+user_id).html(data); 
    });
}
function findres(search, id)
{
    if (id == 1)
        {
            $(".search-img-find").attr("src",$base_url+"assets/img/food-and-restaurant.png");
            $("#searchbox-textbox").attr("placeholder", "Enter Area To Find");
            $data = {search: search, id: id};
            $path = $base_url + "Backend/findrestaurant";
            $.post($path, $data, function (data) {
               
                $("#result").html(data);
            });
        } else if (id == 2)
        {
            $(".search-img-find").attr("src",$base_url+"assets/img/plate.png");
            $("#searchbox-textbox").attr("placeholder", "Enter Food Item To Find ");
            $data = {search: search, id: id};
            $path = $base_url + "Backend/findrestaurant";
            $.post($path, $data, function (data) {
                $("#result").html(data);
            });
        } else if (id == 3)
        {
            $(".search-img-find").attr("src",$base_url+"assets/img/restaurant.png");
            $("#searchbox-textbox").attr("placeholder", "Enter Restaurant To Find");
            $data = {search: search, id: id};
            $path = $base_url + "Backend/findrestaurant";
            $.post($path, $data, function (data) {
                $("#result").html(data);
            });
        }
    //$id=$("#select_search").val();
    
}
function insert_review(restaurant_id)
{
    var review = $("#review_visitor").val();
    
        var cnt = 0;
        
        for(var i = 1;i<=5;i++)
        {
            
            if($(".rating-star-"+i).hasClass("text-yellow"))
            {
               
                cnt++;
            }
        }
        $data = {message: review,restaurant_id : restaurant_id,rating: cnt };
        $path = $base_url + "Backend/insert_review";
        if (review == "")
        {
            $("#review_message").html("Please Enter Review.");
        }
        else
        {
            $.post($path, $data, function (data) {
            
            var review = $("#review_visitor").val("");
            for(var i = 1;i<=5;i++)
            {
            
                if($(".rating-star-"+i).hasClass("text-yellow"))
                {
                    $(".rating-star-"+i).removeClass("text-yellow");
                    $(".rating-star-"+i).addClass("text-dark-white");
                }
            }
            $(".add-wishlist-msg").css("display","block");
            $(".add-wishlist-msg").removeClass("animated fadeOutDown slow");
            $(".add-wishlist-msg").addClass("animated bounceInUp");
            $(".add-wishlist-msg p").html("<img src='"+$base_url+"assets/img/review-give.png' class='add-wishlist-msg-image' >Thank you for giving Review and Rating");
            setTimeout(function (){
                $(".add-wishlist-msg").removeClass("animated bounceInUp");
                $(".add-wishlist-msg").addClass("animated fadeOutDown slow");
                $(".add-wishlist-msg").css("display","none");
            },3000);
           
        });
        }
//    

}
function remove_cart_item(action,id)
{
    if(action=="yes")
    {
        $data = {action: action};
        $path = $base_url + "Backend/remove_cart_items";
        $.post($path, $data, function (data) {
            $("#cart_"+id).html(data); 
            $(".already-added").removeClass("animated bounceInUp");
            $(".already-added").addClass("animated fadeOutDown slow");
            $(".already-added").css("display","none");
        });
    }
    else
    {
        $(".already-added").removeClass("animated bounceInUp");
        $(".already-added").addClass("animated fadeOutDown slow");
        $(".already-added").css("display","none");
    }
}
function set_combo(action, id)
{
    $data = {action: action, id: id};
    $path = $base_url + "Backend/" + action;
    $.post($path, $data, function (data) {
        $("#" + action).html(data);
    });
}
function ratingstar(cnt)
{
   
    if($(".rating-star-"+cnt).hasClass("text-dark-white"))
    {
        if($(".rating-star-"+cnt).prevAll().hasClass("text-dark-white"))
        {
            $(".rating-star-"+cnt).prevAll().removeClass("text-dark-white");
            $(".rating-star-"+cnt).prevAll().addClass("text-yellow");
        }
         $(".rating-star-"+cnt).removeClass("text-dark-white");
        $(".rating-star-"+cnt).addClass("text-yellow");
    }
    else
    {
        if($(".rating-star-"+cnt).nextAll().hasClass("text-yellow"))
        {
            $(".rating-star-"+cnt).nextAll().removeClass("text-yellow");
            $(".rating-star-"+cnt).nextAll().addClass("text-dark-white");
        }
        $(".rating-star-"+cnt).removeClass("text-yellow");
        $(".rating-star-"+cnt).addClass("text-dark-white");
    }
}
(function ($) {
    'use strict';
    $(document).ready(function () {
        $(".delivery-add").click(function () {
            $(".location-picker").toggleClass("open");
            $(".delivery-add").toggleClass("open");
        });
        $("#stepbtn1, #step1, #prev-1").click(function () {
            $("#steppanel1").addClass('active');
            $("#steppanel2, #steppanel3, #steppanel4").removeClass('active');

            $("#stepbtn1").addClass('active');
            $("#step1").addClass('active');

            $("#stepbtn1, #step1").removeClass('done');
            $("#stepbtn2, #stepbtn3, #stepbtn4").removeClass('active done');
            $("#step2, #step3, #step4").removeClass('active done');

            $("#next-2, #next-3, #prev-1, #prev-2, #prev-3, #finish-1").hide();
            $("#next-1").show();
        });
        $("#stepbtn2, #step2, #next-1, #prev-2").click(function () {
            $("#steppanel1, #steppanel3, #steppanel4").removeClass('active');
            $("#steppanel2").addClass('active');

            $("#stepbtn1").addClass('done').removeClass('active');
            $("#step1").addClass('done').removeClass('active');

            $("#stepbtn2").addClass('active');
            $("#step2").addClass('active');

            $("#stepbtn2, #step2").removeClass('done');
            $("#stepbtn3, #stepbtn4").removeClass('active done');
            $("#step3, #step4").removeClass('active done');

            $("#next-1, #next-3, #prev-2, #prev-3, #finish-1").hide();
            $("#next-2, #prev-1").show();
        });
        $("#stepbtn3, #step3, #next-2, #prev-3").click(function () {
            $("#steppanel3").addClass('active');
            $("#steppanel1, #steppanel2, #steppanel4").removeClass('active');

            $("#stepbtn1").addClass('done').removeClass('active');
            $("#step1").addClass('done').removeClass('active');

            $("#stepbtn2").addClass('done').removeClass('active');
            $("#step2").addClass('done').removeClass('active');

            $("#stepbtn3").addClass('active');
            $("#step3").addClass('active');

            $("#stepbtn3, #step3").removeClass('done');
            $("#stepbtn4").removeClass('active done');
            $("#step4").removeClass('active done');

            $("#next-1, #next-2, #prev-1, #prev-3, #finish-1").hide();
            $("#next-3, #prev-2").show();
        });
        $("#stepbtn4, #step4, #next-3").click(function () {
            $("#steppanel1, #steppanel2, #steppanel3").removeClass('active');
            $("#steppanel4").addClass('active');

            $("#stepbtn1").addClass('done').removeClass('active');
            $("#step1").addClass('done').removeClass('active');

            $("#stepbtn2").addClass('done').removeClass('active');
            $("#step2").addClass('done').removeClass('active');

            $("#stepbtn3").addClass('done').removeClass('active');
            $("#step3").addClass('done').removeClass('active');

            $("#stepbtn4").addClass('active');
            $("#step4").addClass('active');

            $("#next-1, #next-2, #prev-1, #next-3, #prev-2").hide();
            $("#prev-3, #finish-1").show();
        });
        $("#finish-1").click(function () {
            alert("Registered Successfully");
        });
        $(".header .right-side .user-details").click(function () {
            $(".user-dropdown").toggleClass("show");
        });
        $(".header .right-side .cart-btn.cart-dropdown").click(function () {
            $(".cart-dropdown .cart-detail-box").toggleClass("show");
        });
        $(".parent-megamenu").click(function () {
            $(".megamenu").toggleClass("show");
        });
        // like dislike
        $(".circle-tag img, .add-fav img, .add-wishlist img").on('click', function () {
            if ($(this).attr("src").toString().indexOf('assets/img/svg/013-heart-1.svg') != -1) {
                this.src = this.src.replace("assets/img/svg/013-heart-1.svg", "assets/img/svg/010-heart.svg");
            } else {
                this.src = this.src.replace("assets/img/svg/010-heart.svg", "assets/img/svg/013-heart-1.svg");
            }
        });
    });
    // Video
    $(document).on('click', '.js-videoPoster', function (e) {
        e.preventDefault();
        var poster = $(this);
        var wrapper = poster.closest('.js-videoWrapper');
        videoPlay(wrapper);
    });

    function videoPlay(wrapper) {
        var iframe = wrapper.find('.js-videoIframe');
        var src = iframe.data('src');
        wrapper.addClass('videoWrapperActive');
        iframe.attr('src', src);
    }
    $('.parent-megamenu').click(function () {
        $('.parent-megamenu>a>i').toggleClass('fa-bars');
        $('.parent-megamenu>a>i').toggleClass('fa-times');
    });
    $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $('.header').css("top", "0");
        } else {
            $('.header').css("top", "auto");
        }
    });
    // modal popup
    $(document).ready(function () {
        if (document.cookie.indexOf('visited=true') == -1) {
            $('#offer').modal({
                show: true
            });
            var year = 1000 * 60 * 60 * 24 * 365;
            var expires = new Date((new Date()).valueOf() + year);
            document.cookie = "visited=true;expires=" + expires.toUTCString();
        }
        if ($('#banner-adv').length > 0) {
            $('.close-banner').on('click', function () {
                $('#banner-adv').hide()
            });
        }
        if ($('#banner-adv2').length > 0) {
            $('.close-banner').on('click', function () {
                $('#banner-adv2').hide()
            });
        }
    });
    // instagram slider
    var swiper = new Swiper('.instagram-slider', {
        slidesPerView: 2,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        navigation: false,
        breakpoints: {
            480: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 4,
            },
            992: {
                slidesPerView: 6,
            },
            1500: {
                slidesPerView: 8,
            },
        }
    });

    // category-slider
    var swiper = new Swiper('.category-slider', {
        slidesPerView: 2,
        spaceBetween: 15,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            576: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            992: {
                slidesPerView: 6,
                spaceBetween: 40,
            },
            1200: {
                slidesPerView: 8,
                spaceBetween: 15,
            },
        }
    });
    // popular-item-slider
    var swiper = new Swiper('.popular-item-slider', {
        slidesPerView: 2,
        spaceBetween: 15,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            576: {
                slidesPerView: 4,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 5,
                spaceBetween: 40,
            },
            1200: {
                slidesPerView: 6,
                spaceBetween: 15,
            },
            1400: {
                slidesPerView: 8,
                spaceBetween: 15,
            },
            1800: {
                slidesPerView: 10,
                spaceBetween: 15,
            },
        }
    });
    // popular-item-slider
    var swiper = new Swiper('.near-offer-slider', {
        slidesPerView: 1,
        spaceBetween: 15,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            576: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            1400: {
                slidesPerView: 4,
                spaceBetween: 15,
            }
        }
    });
    // featured-partners-slider
    var swiper = new Swiper('.featured-partners-slider', {
        slidesPerView: 1,
        spaceBetween: 15,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            576: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            991: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            1400: {
                slidesPerView: 3,
                spaceBetween: 15,
            }
        }
    });
    // trending-slider
    var swiper = new Swiper('.trending-slider', {
        slidesPerView: 1,
        spaceBetween: 15,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            576: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            991: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            1400: {
                slidesPerView: 4,
                spaceBetween: 15,
            }
        }
    });
    // fresh deals
    var swiper = new Swiper('.fresh-deals-slider', {
        slidesPerView: 1,
        spaceBetween: 15,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            576: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            991: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            1400: {
                slidesPerView: 4,
                spaceBetween: 15,
            }
        }
    });
    // kosher-delivery-slider
    var swiper = new Swiper('.kosher-delivery-slider', {
        slidesPerView: 1,
        spaceBetween: 15,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            576: {
                slidesPerView: 1,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 40,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            1400: {
                slidesPerView: 3,
                spaceBetween: 15,
            }
        }
    });
    // food near me
    var swiper = new Swiper('.food-near-me', {
        slidesPerView: 2,
        spaceBetween: 15,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            576: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 15,
            },
            1400: {
                slidesPerView: 8,
                spaceBetween: 15,
            }
        }
    });
    // advertisement slider
    var swiper = new Swiper('.advertisement-slider', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }
    });
    // about-us-slider slider
    var swiper = new Swiper('.about-us-slider', {
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        speed: 1000,
        grabCursor: true,
        watchSlidesProgress: true,
        mousewheelControl: true,
        keyboardControl: true,
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }
    });
    // about-us-slider slider
    var swiper = new Swiper('.feedback-slider', {
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        speed: 1000,
        grabCursor: true,
        watchSlidesProgress: true,
        mousewheelControl: true,
        keyboardControl: true,
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }
    });
    // Delivery time range
    $(".delivery-range-slider").ionRangeSlider({
        min: 0,
        from: new Date().getMonth(),
        values: ["45 min", "60 min", "Any"],
        grid: true
    });
    // Distance range
    $(".distance-range-slider").ionRangeSlider({
        min: 0,
        from: new Date().getMonth(),
        values: ["1/4 mi", "1/2 mi", "1 mi", "2 mi", "3 mi", "4 mi", "5 mi", "10 mi"],
        grid: true
    });
    // password hide show
    $(".toggle-password").click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("data-name"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    // smooth scroll
    $.fn.smoothScroll = function (setting) {
        var _default = {
            duration: 1000,
            easing: 'swing',
            offset: 0,
            top: '100px'
        },
                _setting = $.extend(_default, setting),
                _handler = function () {
                    var dest = 0,
                            target = this.hash,
                            $target = $(target);
                    $(this).on('click', function (e) {
                        e.preventDefault();
                        if ($target.offset().top > ($(document).height() - $(window).height())) {
                            dest = $(document).height() - $(window).height();
                        } else {
                            dest = $target.offset().top - _setting.offset;
                        }
                        $('html, body').animate({
                            scrollTop: dest
                        }, _setting.duration, _setting.easing);
                    });
                };
        return this.each(_handler);
    };
    $('.scrollnav .nav-pills .nav-link').smoothScroll({
        duration: 1000, // animation speed
        easing: 'swing', // find more easing options on http://api.jqueryui.com/easings/
        offset: 0 // custom offset
    });
    // quantity plus minus
    $('.minus-btn').on('click', function (e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.closest('.quantity').find('input');
        var value = parseInt($input.val());
        if (value > 1) {
            value = value - 1;
        } else {
            value = 1;
        }
        $input.val(value);
    });
    $('.plus-btn').on('click', function (e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.closest('.quantity').find('input');
        var value = parseInt($input.val());
        if (value < 100) {
            value = value + 1;
        } else {
            value = 100;
        }
        $input.val(value);
    });
    // countdown timer
    function makeTimer() {
        var endTime = new Date("01 January 2020 00:00:00 GMT+05:30");
        endTime = (Date.parse(endTime) / 1000);
        var now = new Date();
        now = (Date.parse(now) / 1000);
        var timeLeft = endTime - now;
        var days = Math.floor(timeLeft / 86400);
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
        if (hours < "10") {
            hours = "0" + hours;
        }
        if (minutes < "10") {
            minutes = "0" + minutes;
        }
        if (seconds < "10") {
            seconds = "0" + seconds;
        }
        $("#mb-days").html(days + "<h6 class='mb-0'>Days</h6>");
        $("#mb-hours").html(hours + "<h6 class='mb-0'>Hours</h6>");
        $("#mb-minutes").html(minutes + "<h6 class='mb-0'>Minutes</h6>");
        $("#mb-seconds").html(seconds + "<h6 class='mb-0'>Seconds</h6>");
    }
    setInterval(function () {
        makeTimer();
    }, 1000);
    // nice selct
    $(document).ready(function () {
        $('select.custom-select-2').niceSelect();
    });
    // sticky side bar
    $(function () {
        if ($('body').is('.sidefix')) {
            $(document).ready(function () {
                $('.sidebar2').sticksy();
                $('.sidebar3').sticksy();
            });
        }
    });
    // gallery
    $('.image-popup').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 300, // duration of the effect, in milliseconds
            easing: 'ease-in-out', // CSS transition easing function
            opener: function (openerElement) {
                return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
        }
    });
    // custom tabs restaurent page

    // full view page
    $(function () {
        $('.fullpageview').on('click', function () {
            $('.md-modal').addClass('md-show');
        });
        $('.md-close').on('click', function () {
            $('.md-modal').removeClass('md-show');
        });
    });
    $(document).keydown(function (event) {
        if (event.keyCode == 27) {
            $('.md-modal').removeClass('md-show');
        }
    });



})(jQuery);
$('#btn_register').click(function () {
    $('#login_form').hide();
    $('#form_register').show();
    //$('#login_form').addClass(".animated .fade-in");
});
$('#register_signin').click(function () {
    $('#login_form').show();
    $('#form_register').hide();
});
$('#forget_signin').click(function () {
    $('#login_form').show();
    $('#form_forget').hide();
});
$('#login_forget').click(function () {
    $('#login_form').hide();
    $('#form_forget').show();
});
//$('#register_btn').click(function () {
//    $('#form_register').hide();
//    $('#verify_otp').show();
//});

$("#tt").keyup(function (e) {
    alert(e.which);
});

function transfer($val, id)
{
    if ($val.length == $(id).attr("maxlength"))
    {
        $(id).next("input").focus();
    } else if ($val.length == 0)
    {
        $(id).prev("input").focus();
    }
}


function transfer_email($val, id)
{
    if ($val.length == $(id).attr("maxlength"))
    {
        $(id).next("input").focus();
    } else if ($val.length == 0)
    {
        $(id).prev("input").focus();
    }
}
//$('.digit-group').find('input').each(function() {
//	$(this).attr('maxlength', 1);
//	$(this).on('keyup', function(e) {
//		var parent = $($(this).parent());
//		
//		if(e.keyCode === 8 || e.keyCode === 37) {
//			var prev = parent.find('input#' + $(this).data('previous'));
//			
//			if(prev.length) {
//				$(prev).select();
//			}
//		} else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
//			var next = parent.find('input#' + $(this).data('next'));
//			
//			if(next.length) {
//				$(next).select();
//			} else {
//				if(parent.data('autosubmit')) {
//					parent.submit();
//				}
//			}
//		}
//	});
//});


$c = 1;
function hideshow(id, ch_btn) {
    if ($c == 1) {
        $(id).attr("type", "text");
        $(ch_btn).html("Hide");
        $c = 0;
    } else
    {
        $(id).attr("type", "password");
        $(ch_btn).html("Show");
        $c = 1;
    }
}
$("input[check_control]").keypress(function (e) {
    if ($(this).attr("check_control") == "alpha") {
        var regex = new RegExp("^[a-zA-Z ]+$");
    } else if ($(this).attr("check_control") == "number") {
        var regex = new RegExp("^[0-9]+$");
    } else if ($(this).attr("check_control") == "mobile") {
        var regex = new RegExp("^[0-9]$");
    } else if ($(this).attr("check_control") == "email") {
        var regex = new RegExp("^[a-zA-Z0-9.@_]+$");
    } else {
        var regex = new RegExp("^[a-zA-Z0-9.@_]+$");
    }

    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        $(this).removeClass("form_error").addClass("form_valid");
        return true;
    } else {
        $(this).removeClass("form_valid").addClass("form_error");
    }
    e.preventDefault();
    return false;
});

$("input[check_control]").blur(function () {

    var val = this.value;
    if (val == "") {
        $(this).removeClass("form_valid").addClass("form_error").focus();
    } else {
        $(this).removeClass("form_error").addClass("form_valid");
    }
});
