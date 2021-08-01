<?php
// connection with  Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "asndisc";
$flag = false ;
// connecting with Mysql 
$conn = mysqli_connect($servername , $username , $password);

// Checking if Database if Exists ----------------------------------------
$sql = "SHOW DATABASES LIKE '$database'";
$result = mysqli_query($conn , $sql);

// IF DataBase Exists then Connect to database Otherwise Exit -------------------
if (mysqli_num_rows($result) == 1 ){
    $conn = mysqli_connect($servername , $username , $password , $database);
}else{
    $sql = "CREATE DATABASE IF NOT EXISTS $database";
    $result = mysqli_query($conn , $sql);
    $flag = true;
}
if ($flag){ 
    $conn = mysqli_connect($servername , $username , $password , $database);

    // Create categories table -------------------------------------------------
    $sql = "CREATE TABLE `asn`.`categories` ( `cate_id` INT(50) NOT NULL AUTO_INCREMENT ,  `title` VARCHAR(255) NOT NULL ,  `details` TEXT NOT NULL ,    PRIMARY KEY  (`cate_id`)) ENGINE = InnoDB";
    $result = mysqli_query($conn , $sql);

    
    // Create Questionn Table ---------------------------------------------------
    $sql = "CREATE TABLE `asn`.`questions` ( `cate_id` INT(100) NOT NULL ,  `ques_id` INT(100) NOT NULL AUTO_INCREMENT ,  `question` TEXT NOT NULL ,  `author` VARCHAR(255) NOT NULL ,  `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`ques_id`)) ENGINE = InnoDB";
    $result = mysqli_query($conn , $sql);

    
    // Create Replies Table ------------------------------------------------------
    $sql = "CREATE TABLE `asn`.`replies` ( `reply_id` INT(100) NOT NULL AUTO_INCREMENT ,  `ques_id` INT(100) NOT NULL ,  `reply` TEXT NOT NULL ,  `author` VARCHAR(255) NOT NULL ,  `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`reply_id`)) ENGINE = InnoDB";
    $result = mysqli_query($conn , $sql);

    
    // Create Uers Table ------------------------------------------------------------
    $sql = "CREATE TABLE `asn`.`users` ( `sr.` INT(100) NOT NULL AUTO_INCREMENT ,  `name` VARCHAR(255) NOT NULL ,  `email` VARCHAR(255) NOT NULL ,  `password` VARCHAR(255) NOT NULL ,  `created_date` INT NOT NULL ,    PRIMARY KEY  (`sr.`)) ENGINE = InnoDB";
    $result = mysqli_query($conn , $sql);


    // INSERT INTO `categories` (`cate_id`, `title`, `details`) VALUES (NULL, 'Android Security System', 'Android incorporates industry-leading security features and works with developers and device implementers to keep the Android platform and ecosystem safe. A robust security model is essential to enable a vigorous ecosystem of apps and devices built on and around the Android platform and supported by cloud services. As a result, through its entire development lifecycle, Android has been subject to a rigorous security program.')

    // Add initial Category Card -----------------------------------------------------
    $sql = "INSERT INTO `categories` (`cate_id`, `title`, `details`) VALUES (NULL, 'Android Security System', 'Android incorporates industry-leading security features and works with developers and device implementers to keep the Android platform and ecosystem safe. A robust security model is essential to enable a vigorous ecosystem of apps and devices built on and around the Android platform and supported by cloud services. As a result, through its entire development lifecycle, Android has been subject to a rigorous security program.')";
    $result = mysqli_query($conn , $sql);

}

?>