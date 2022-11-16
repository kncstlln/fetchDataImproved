<?php

namespace Models;

class Student
{
	public $studentId;
    public $firstName;
    public $lastName;
    public $birthdate;
	public $address;
    public $program;
    public $contactNumber;
    public $emergencyContact;
	
   

    public function __construct($studentId, $firstName, $lastName, $birthdate, $address, $program, $contactNumber, $emergencyContact)
    {
        $this->studentId = $studentId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthdate = $birthdate;
		$this->address = $address;
		$this->program = $program;
		$this->contactNumber = $contactNumber;
        $this->emergencyContact = $emergencyContact;
    }

    public function getStudentId()
	{
		return $this->studentId;
	}

	public function getFirstName()
	{
		return $this->firstName;
	}

	public function getLastName()
	{
		return $this->lastName;
	}

	public function getBirthdate()
	{
		return $this->birthdate;
	}
    public function getAddress()
	{
		return $this->address;
	}
    public function getProgram()
	{
		return $this->program;
    }
    public function getContactNumber()
	{
		return $this->contactNumber;
    }
    public function getEmergencyContact()
	{
		return $this->emergencyContact;
    }
    public function setConnection($connection)
	{
		return $this->connection = $connection;
	}
	public function getAll()
	{
		$students = $this->connection->find();
		return $students;
	}
    public function addStudent()
	{
		try {
			$students = $this->connection->insertOne([
				'studentId' => $this->getStudentId(),
				'firstName' => $this->getFirstName(),
				'lastName' => $this->getLastName(),
                'birthdate'=> $this->getBirthdate(),
				'address' => $this->getAddress(),
                'program'=> $this->getProgram(),
                'contactNumber'=> $this->getContactNumber(),
				'emergencyContact'=> $this->getEmergencyContact()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
	public function getById($id)
	{
		try {
			$students = $this->connection->findOne(['_id' => $id]);
			return $students;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
    public function updateStudent($id, $studentId, $firstName, $lastName, $birthdate, $address, $program, $contactNumber, $emergencyContact)
	{
		try {
			$students = $this->connection->updateOne(['_id' => $id],
			['$set'=>
			[
			'studentId' => $studentId,
			'firstName' => $firstName,
			'lastName' => $lastName,
			'birthdate'=> $birthdate,
			'address' => $address,
			'program'=> $program,
			'contactNumber'=> $contactNumber,
			'emergencyContact'=> $emergencyContact
			]]);
			
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
        
	}
    public function delete($id)
	{
		try {
			$students = $this->connection->findOneAndDelete(['_id' => $id]);
			return $students;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}