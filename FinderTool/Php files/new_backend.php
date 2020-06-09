<?php

$connect = new PDO("mysql:host=localhost;dbname=TyreSizes", "root", "");

if(isset($_POST["type"]))
{
 if($_POST["type"] == "make_data")
 {
  $query = "
  SELECT id,car_manufacturer_name FROM car_manufacturer
  ORDER BY  ASC car_manufacturer_name
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $data = $statement->fetchAll();
  foreach($data as $row)
  {
   $output[] = array(
    'id'  => $row["id"],
    'name'  => $row["car_manufacturer_name"]
   );
  }
  echo json_encode($output);
 }
 else
 {
  $query = "
  SELECT * FROM car_model_pv 
  WHERE make = '".$_POST["Make_id"]."' 
  ORDER BY model ASC
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $data = $statement->fetchAll();
  foreach($data as $row)
  {
   $output[] = array(
    'id'  => $row["id"],
    'name'  => $row["model"]
   );
  }
  echo json_encode($output);
 }
}

?>