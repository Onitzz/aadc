$(document).ready(function(){
$('.classacacher').hide();
$.datetimepicker.setLocale('fr');

$('#datetimepicker1').datetimepicker();

    $(".liencache").click(function(){
       var id = $(this).attr("id");
       if ($("#divacacher"+id).is(":visible")){
            $("#divacacher"+id).hide();
        }
        else{
            $("#divacacher"+id).show();
        }
    });
});