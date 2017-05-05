<?php
$con = mysqli_connect("localhost", "root", "", "menudigitaldb");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
//$idRestaurnate=$_GET['idRestaurante'];
//echo $idRestaurante;
$query = "SELECT * FROM  restaurante WHERE idRestaurante like '%%'";
$result = mysqli_query($con,$query);
  
$response = array();
while($row = mysqli_fetch_assoc($result)) 
  { 
    $row_array['horarios']  = utf8_decode($row['horarios']);
    $row_array['nombrerest']  = utf8_decode($row['nombrerest']);
    
    $row_array['logo']  = utf8_decode($row['logo']);
    $row_array['descripcion']  = utf8_decode($row['descripcion']);
    //$row_array['ordinal_region']  = utf8_decode($row['ordinal_region']); 
    array_push ($response, $row_array);
   // $response[] = $row;
  }
  
mysqli_close($con);
 
echo $json_string = json_encode($response);
json_last_error() ; 
$file = 'restaurantes.json';
file_put_contents($file, $json_string);
/*
@header('Location:bootstrap_data.php');*/
 
?>
 