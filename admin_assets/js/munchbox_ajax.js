$base_url = "http://localhost/MUNCHBOX/";
function set_combo(action,id)
{
    $data = {action:action,id:id};
    $path = $base_url+"Backend/city";
    $.post($path,$data,function(data){
       $("#"+action).html(data);
    });
}
function set_modal(id)
{
    $data = {id:id};
    $path = $base_url+"Backend/activestore";
    $.post($path,$data,function(data){
       $("#modal_content").html(data);    
    });
}
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#preview_user').attr('src',e.target.result);
      
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}
$("#admin_profile").change(function() {
  readURL(this);
});



function package_update(action,id)
{
    $data = {action:action,id:id};
    $path = $base_url+"Backend/package_update";
    $.post($path,$data,function(data){
        if(data == 1)
        {
            window.location.replace($base_url + "Restaurant-Home");
        }
        else if(data == 0)
        {
            window.location.replace($base_url + "Restaurant-Home");
        }
        alert(data);
    });
}



