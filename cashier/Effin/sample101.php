<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Make A Sale</title>
	<link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
	<script  src="../source/CDN/jquery-1.12.4" type="text/javascript"></script>
</head>
<body >


<label id = "changelbl" for="" onload="Check101()">Change: </label>
<input type="text" id="changevalue" value="INTELLICARE" onclick ="Check()">



<script type="text/javascript">
	function Check()
	{

		var x = document.getElementById("changevalue").value;
		if (x =='INTELLICARE') 
		{
		   document.getElementById('changevalue').style.color = "magenta";
		}

		


	}
</script>
</body>
</html>