<?php

include ("../init.php");
use Models\Student;

$_id = $_GET['id'];


$id = new MongoDB\BSON\ObjectId("$_id");
$student= new Student('','','','','','','','');
$student->setConnection($connection);
$editStudent = $student->getById($id);

$_id = $editStudent->_id;
$studentId = $editStudent->studentId;
$firstName = $editStudent->firstName;
$lastName = $editStudent->lastName;
$birthdate = $editStudent->birthdate;
$address = $editStudent->address;
$program = $editStudent->program;
$contactNumber = $editStudent->contactNumber;
$emergencyContact = $editStudent->emergencyContact;



echo $mustache->render('edit', compact('editStudent','_id', 'studentId','firstName','lastName','birthdate', 'address', 'program', 'contactNumber', 'emergencyContact'));