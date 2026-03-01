
$base_url = "http://localhost/MUNCHBOX/";
function set_combo(action,id)
{
    $data = {action:action,id:id};
    $path = $base_url+"Backend/"+action;
    $.post($path,$data,function(data){
       $("#"+action).html(data);
    });
}
function updateschedule(id,type)
{
    if(type == "show")
    {
        $(".schedule_p_"+id).addClass("display-none");
        $(".schedule_input_"+id).removeClass("display-none");
        $(".update_btn_schedule_"+id).html("Update Details");
        $(".update_btn_schedule_"+id).attr("onclick","updateschedule("+id+",'update')");
    }
    else
    {
        $open_time = $("#schedule_opentime_"+id).val();
        $close_time = $("#schedule_closetime_"+id).val();
       $data = {opentime:$open_time,closetime:$close_time,schedule_id : id};
        $path = $base_url+"Backend/resmanageschedule";
         $.post($path,$data,function(data){
              if(data == "success")
              {
                  $(".schedule_p_"+id).removeClass("display-none");
        $(".schedule_input_"+id).addClass("display-none");
        $(".update_btn_schedule_"+id).html("Edit");
        $(".update_btn_schedule_"+id).attr("onclick","updateschedule("+id+",'show')");
              }
    });
    }
    

//    //$("#btn-time-schedule-"+id).removeClass("display-none");
//    $("#scedule-edit-btn-"+id).html("Update Details");
}
function set_combo1(action,id)
{
    if(action == "city")
    {
       
        $("#area").html("<option value=''>Select Area</option>");
    }
    $data = {action:action,id:id};
    $path = $base_url+"Backend/"+action;
    $.post($path,$data,function(data){
       $("#"+action).html(data);  
    });    
}   

function set_modal(id,type)
{
    $data = {id:id,type:type};
    $path = $base_url+"Backend/ordermodaldata";
    $.post($path,$data,function(data){
       $("#"+type+"-modal-content").html(data);    
    });
}
function orderprocess(id,type)
{
    $data = {id:id,type:type};
    $path = $base_url+"Backend/orderprocess";
    $.post($path,$data,function(data){
       $("#"+type+"_orders").html(data);
    });
}
function setordertabdata(type)
{
    $data = {type:type};
    $path = $base_url+"Backend/setordertabdata";
    $.post($path,$data,function(data){
       $("#"+type+"_orders").html(data);
    });
}