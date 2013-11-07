$(document).ready(function(){
	$("#contentbox").keyup(function(){
		var box=$(this).val();
		var main = box.length *100;
		var value= (main / 350);
		var count= 350 - box.length;

		if(box.length <= 350){
			$('#count').html(count);
			$('#bar').animate({
				"width": value+'%',}, 1);
		}
		else{
			alert('Full');
		}
		return false;
	});
});

$(document).ready(function(){
	$("#contentbox1").keyup(function(){
		var box=$(this).val();
		var main = box.length *100;
		var value= (main / 50);
		var count= 50 - box.length;

		if(box.length <= 50){
			$('#count1').html(count);
			$('#bar1').animate({
				"width": value+'%',}, 1);
		}
		else{
			alert('Full');
		}
		return false;
	});
});

$(document).ready(function(){
	$("#contentbox2").keyup(function(){
		var box=$(this).val();
		var main = box.length *100;
		var value= (main / 350);
		var count= 350 - box.length;

		if(box.length <= 350){
			$('#count2').html(count);
			$('#bar1').animate({
				"width": value+'%',}, 1);
		}
		else{
			alert('Full');
		}
		return false;
	});
});


$(document).ready(function(){
	$("#contentbox3").keyup(function(){
		var box=$(this).val();
		var main = box.length *100;
		var value= (main / 750);
		var count= 750 - box.length;

		if(box.length <= 750){
			$('#count3').html(count);
			$('#bar1').animate({
				"width": value+'%',}, 1);
		}
		else{
			alert('Full');
		}
		return false;
	});
});