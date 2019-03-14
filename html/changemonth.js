$(document).ready(function() {
  $('#month_changer).change(function() {
  
  var month_changer_id = $(this).val();
  
  $.ajax({
  url:"find_monthdata.php",
  method:"POST",
  data:{month_changer_id:month_changer_id},
  success:function(data){
	  $('#show_months').html(data);
  });
 });
});