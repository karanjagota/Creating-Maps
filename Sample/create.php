<?php 
 
  include 'connect.php';
   
  $createmaptable = 'CREATE TABLE IF NOT EXISTS maps (
  ID int AUTO_INCREMENT,
  PRIMARY KEY (ID),
  centerLat decimal (5,3),
      centerLong decimal (6,3),
      zoom  tinyint
  );';
 
  if(!$result = $con->query($createmaptable)){
    die('There was an error running the query [' . $con->error . ']');
  }
 $maps = array(
  array(1, 45.52, -122.682, 9), 
  array(2, -33.98, 18.424, 10), 
  array(3, 57.48, -4.225, 12)
); 
foreach ($maps as $ind) {
  $newline = "INSERT INTO maps 
    (ID, centerLat, centerLong, zoom) 
    VALUES ($ind[0], $ind[1], $ind[2], $ind[3])";
 
  if(!$insertmap = $con->query($newline)){
    die('There was an error running the query [' . $con->error . ']');
  }
}
?>