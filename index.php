<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Facebook Like Counter</title>
	<script src="jquery-1.5.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8">
		function getParameterByName( name ) {
			name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
			var regexS = "[\\?&]"+name+"=([^&#]*)";
			var regex = new RegExp( regexS );
			var results = regex.exec( window.location.href );
			if( results == null )
			  return "";
			else
			  return decodeURIComponent(results[1].replace(/\+/g, " "));
		}
	
		jQuery(document).ready(function() {
			var _id = getParameterByName('id');
			$("#id").val(_id);
			
			if(_id){
				updateCounter();
			}
			
			function updateCounter() {
				$.getJSON('proxy.php?id='+_id, function(data) {
					var c = data.shares;

					var counter = "" + c;
					// alert(counter);
					$("#counter").text(counter);
				});
			}
			
			var holdInt = setInterval(updateCounter, 5000);
			
			$("form").submit(function(){
				_id = $("#id").val();
				updateCounter();
				return false;
			});
		});
	</script>
	<link rel="stylesheet" href="master.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>

<body>
	<div id="page">
		<div id="main">
			<form method="GET" action="">
				<label for="id"></label><input type="text" name="id" value="" id="id" />
			</form>
			
			<div id="counter-layout">
				<div id="counter">0</div>
			</div>
		</div>
	</div>
</body>
</html>
