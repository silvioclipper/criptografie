//console.log("included");

$("#testBtn").click(function(){
	//console.log("clicked");
	$.post("ajax.php",{
		action: "test-functions"
		},function(data){
		
		//data = JSON.parse(data);
		$("#testmsg").html(data);
	}
		);
});

$("#getAlfabet").click(function(){
	//console.log("clicked");
	$.post("ajax.php",{
		action: "getAlfabet"
	},function(data){
		
		//data = JSON.parse(data);
		$("#alfabet").html("Alfabetul este: \""+data+"\"");
	});
});
$("#genKeySubst").click(function(){

	$.post("ajax.php",{
		action: "genKeySubst"
	},function(data){
		
		$("#keySubst").html("Cheia generata este: \""+data+"\"");
	});
});
$("#getKeySubst").click(function(){

	$.post("ajax.php",{
		action: "getKeySubst"
	},function(data){
		
		$("#keySubst").html("Cheia citita este: \""+data+"\"");
	});
});

$("#genKeyTransp").click(function(){
			if($("#TranspKeyLength").val()){
					$.post("ajax.php",{
					action: "genKeyTransp",
					keyLength: $("#TranspKeyLength").val()
				},function(data){
					
					$("#keyTransp").html("Cheia generata este:  \""+data+"\"");
				});
			}else{
				$("#keyTransp").html("<input type='range' min='2' value='5' id='TranspKeyLength' onChange=\"$('#rangeValue').val($(this).val())\"/><input type='text' id='rangeValue' style='width:30px;' value=5 disabled=disabled>");
			}
	
});
$("#getKeyTransp").click(function(){

	$.post("ajax.php",{
		action: "getKeyTransp"
	},function(data){
		
		$("#keyTransp").html("Cheia citita este: \""+data+"\"");
	});
});

$("#getMsg").click(function(){
	$("#msg").html("<img src='ajax-loader.gif' />");
	$.post("ajax.php",{
		action: "getMsg"
	},function(data){
		
		$("#msg").html(data);
	});
});


$("#getCriptSubst").click(function(){
	$("#criptSubst").html("<img src='ajax-loader.gif' />");
	$.post("ajax.php",{
		action: "getCriptSubst"
	},function(data){
		
		$("#criptSubst").html(data);
	});
});

$("#getCriptTransp").click(function(){
	console.log("Trapnsp");
	$("#criptTransp").html("<img src='ajax-loader.gif' />");
	$.post("ajax.php",{
		action: "getCriptTransp"
	},function(data){
		
		$("#criptTransp").html(data);
	});
});

$("#getMsgChart").click(function(){
	$("#msgChart").html("<img src='ajax-loader.gif' />");
	$.post("ajax.php",{
		action: "getMsgChart"
	},function(data){
		
		$("#msgChart").html("<img src='"+data+"?no_cache="+Math.random()+"' style='width:inherit;' />");
	});
});
$("#getCriptChartSubst").click(function(){
	$("#criptChartSubst").html("<img src='ajax-loader.gif' />");
	$.post("ajax.php",{
		action: "getCriptChartSubst"
	},function(data){
		
		$("#criptChartSubst").html("<img src='"+data+"?no_cache="+Math.random()+"' style='width:inherit;' />");
	});
});
$("#getCriptChartTransp").click(function(){
	$("#criptChartTransp").html("<img src='ajax-loader.gif' />");
	$.post("ajax.php",{
		action: "getCriptChartTransp"
	},function(data){
		
		$("#criptChartTransp").html("<img src='"+data+"?no_cache="+Math.random()+"' style='width:inherit;' />");
	});
});


$("#genDigramMsg").click(function(){
	//console.log("cliccked");
	$("#DigramMsg").html("<img src='ajax-loader.gif' />");
	$.ajax({
		type: "POST",
		url: "ajax.php",
		data: {action: "genDigramMsg"},
		success: function(data){
			$("#DigramMsg").html("<img src='"+data+"?no_cache="+Math.random()+"' style='width:inherit;' />");
		
		},
		timeout:10000
	});
});

$("#genDigramCriptSubst").click(function(){
	$("#DigramCriptSubst").html("<img src='ajax-loader.gif' />");
	$.ajax({
		type: "POST",
		url: "ajax.php",
		data: {action: "genDigramCriptSubst"},
		success: function(data){
			$("#DigramCriptSubst").html("<img src='"+data+"?no_cache="+Math.random()+"' style='width:inherit;' />");
		},
		timeout:10000
	});
});
$("#genDigramCriptTransp").click(function(){
	$("#DigramCriptTransp").html("<img src='ajax-loader.gif' />");
	$.ajax({
		type: "POST",
		url: "ajax.php",
		data: {action: "genDigramCriptTransp"},
		success: function(data){
			$("#DigramCriptTransp").html("<img src='"+data+"?no_cache="+Math.random()+"' style='width:inherit;' />");
		},
		timeout:10000
	});
});
