<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = "";
$db = 'blood_bank_db';


$conn = mysqli_connect($host,$user,$pass,$db) or die($conn->error);
