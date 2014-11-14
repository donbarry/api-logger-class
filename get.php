<?php

//$format=$_GET['format'];
$recipes=array("1"=>"Volvo","2"=>"BMW","3"=>"Toyota");
$output=json_encode($recipes);
$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

echo json_encode($arr);
echo $output;
?>