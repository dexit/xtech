$(document).ready(function(){
	opt = $("select[id^='Device_id_']");
	opt.change(function(){
		$.ajax({
  			type: "GET",
  			url: "?r=device/changelist",
  			//dataType: "script",
  			data: "id="+$(this).attr('id')+"&val="+$(this).val(),

		});
		console.log($(this).attr('id'));
	})
	//console.log(opt);
})