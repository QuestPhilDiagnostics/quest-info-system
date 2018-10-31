<!DOCTYPE html>
<html>
<head>
<script>
    function calculate() {
        var x = document.getElementById("first").value;
        var y = document.getElementById("second").value;
        var d = document.getElementById("decision").value;
        if (d=="*")
           result = x*y;
        else if(d=="/")
           result = x/y;
        document.getElementById("third").value = result;}
</script>
  <title></title>
</head>
<body>
<h1></h1>
<select id="decision">
    <option value="*">Multiply</option>
    <option value="/">Divide</option>
</select><br>
<input id="first" type="text" onchange="calculate()">
<input id="second" type="text" onchange="calculate()"><br>
<input id="third" type="text" ><br>
</body>
</html>