$base_url = "http://localhost/MUNCHBOX/";
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('.user-cover').css('background',"url("+ e.target.result +")");
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

function readDishURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
        $("#dish_preview").show();
      $('#dish_preview').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

function hide_logoname()
{
    alert();
}

function readURL1(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('.img').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

function itemactive(id)
{
    
   if($("#switch-"+id).prop("checked") == true)
   {
       
       $data = {action:"active",id:id};
       $path = $base_url+"Backend/activeitem";
        $.post($path,$data,function(data){
            $("#switch-"+id).attr("title","active");
       });
   }
   else
   {
       
       $data = {action:"deactive",id:id};
       $path = $base_url+"Backend/activeitem";
        $.post($path,$data,function(data){
            $("#switch-"+id).attr("title","deactive");
       });
   }
}
$c = 0;
$("#toggle_button_seller").click(function(){
   
   if($c==0)
   {
       alert();
       $("#toggle_seller_text").hide();
       $("#toggle_seller_logo").show();
       $c=1;
   }
   if($c == 1)
   {
       $("#toggle_seller_text").show();
       $("#toggle_seller_logo").hide();
       $c=0;
   }
});
