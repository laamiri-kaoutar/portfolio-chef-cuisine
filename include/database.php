<?php

// $conn = mysqli_connect("localhost","root","","gastronomy_web");


$conn = new mysqli("localhost","root","","gastronomy_web");


if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
} 

