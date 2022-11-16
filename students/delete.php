<?php

include ("../init.php");
use Models\Student;

$_id = $_GET['id'];

$id = new MongoDB\BSON\ObjectId("$_id");
$student= new Student('','','','','','','','');
$student->setConnection($connection);
$student->delete($id);
header('Location: index.php');

?>