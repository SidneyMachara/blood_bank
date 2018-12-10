<?php
include('includes/db_connect.php');

// Creates the database 'blood_bank_db'
// $sql = "CREATE DATABASE IF NOT EXISTS blood_bank_db";

// mysqli_query($conn, $sql);

// creat table for blood banks details
$sql = "CREATE TABLE `blood_banks` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` text NOT NULL,
  `bank_city` text NOT NULL,
  `bank_contact` varchar(15) NOT NULL,
  PRIMARY KEY (`bank_id`)
)";
mysqli_query($conn, $sql);

// create table for blood banks details
$sql = "INSERT INTO `blood_banks` (`bank_name`, `bank_city`, `bank_contact`) VALUES
('Grand_Blood_bank', 'Telenova', 7454698),
('Prime_Bank', 'chinana', 1425463)";
mysqli_query($conn, $sql);

//table to store diferent administrators for each blood bank
$sql = " CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `blood_bank_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`),
  FOREIGN KEY (`blood_bank_id`) REFERENCES blood_banks(`bank_id`)
)";
mysqli_query($conn, $sql);
// insert 1 admin for each blood bank ..default password is 123456789
$sql = "INSERT INTO `admins` (`username`, `email`, `blood_bank_id`, `password`) VALUES
('Grand', 'grand@g.com', 1, '25f9e794323b453885f5181f1b624d0b'),
('Prime', 'prime@g.com', 2, '25f9e794323b453885f5181f1b624d0b')";
mysqli_query($conn, $sql);





// table to store blood levels  for each blood type in the bank
$sql = "CREATE TABLE `blood_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blood_group` varchar(10) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
)";
mysqli_query($conn, $sql);
// insert the blood types..by default they are all empty " 0 "
$sql = "INSERT INTO `blood_levels` (`blood_group`, `amount`) VALUES
('A+', 0),
('O+', 0),
('B+', 0),
('AB+', 0),
('A-', 0),
('O-', 0),
('B-', 0),
('AB-', 0)";
mysqli_query($conn, $sql);

// table for blood donors
$sql = "CREATE TABLE `blood_donors` (
  `donor_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `contact` varchar(15) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `diseases` varchar(100) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  PRIMARY KEY (`donor_id`),
  FOREIGN KEY (`bank_id`) REFERENCES blood_banks(`bank_id`)

)";
mysqli_query($conn, $sql);






//table to record each donation make by each donor
$sql = " CREATE TABLE `donations` (
  `donation_id` int(11) NOT NULL AUTO_INCREMENT,
  `donor_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`donation_id`),
  FOREIGN KEY (`bank_id`) REFERENCES blood_banks(`bank_id`)
)";
mysqli_query($conn, $sql);



// table to store patients on the waiting list for a blood recieval
$sql = "CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `contact` varchar(15) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `diseases` varchar(100) NOT NULL,
  `healed` int(11) NOT NULL,
  PRIMARY KEY (`patient_id`),
  FOREIGN KEY (`bank_id`) REFERENCES blood_banks(`bank_id`)
)";
mysqli_query($conn, $sql);


 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
       <link rel="stylesheet"  href="css/bootstrap.min.css">
       <script src="js/jquery.js"></script>
       <script src="js/bootstrap.min.js"></script>
   </head>
   <body>

     <div class="container">
       <div class="jumbotron">
         <h1>Installaion completed successfulls</h1>
         <small>tables where created and filled with dummy data</small>
         <br>
         <br>
         <br>

         <a href="index.php" class="btn">  CLICK ME </a>

       </div>
     </div>

   </body>
 </html>
