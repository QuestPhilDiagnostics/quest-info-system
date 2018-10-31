<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","");
    $db=mysql_select_db("dbtest",$con);
    $query=mysql_query("select * from qpd_package where PackName LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['PackName'];
    }
    echo json_encode($array);
?>