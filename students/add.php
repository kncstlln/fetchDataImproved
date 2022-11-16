<?php
include ("../init.php");
use Models\Student;

try{
    if(isset($_POST['firstName'])) {
    $student= new Student($_POST['studentId'], $_POST['firstName'],
    $_POST['lastName'], $_POST['birthdate'], $_POST['address'], $_POST['program'], $_POST['contactNumber'],
    $_POST['emergencyContact']);
    $student->setConnection($connection);
    $student->addStudent();
    header('Location: index.php');
    }
}
catch (Exception $e) {
    error_log($e->getMessage());
}

$template = $mustache->loadTemplate('add.mustache');
echo $template->render();
?>