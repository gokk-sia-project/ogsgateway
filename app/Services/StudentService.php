<?php
namespace App\Services;

use App\Traits\ConsumesExternalService;

class StudentService{
    use ConsumesExternalService;
    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.users1.base_uri');
        $this->secret = config('services.users1.secret');
    }
    
    
    // STUDENT
    
    public function obtainUsers1()
    {
        return $this->performRequest('GET','/students');
    }

    public function obtainUser1($id)
    {
        return $this->performRequest('GET', "/student/{$id}");
    }

    public function createUser1($data)
    {
        return $this->performRequest('POST','/student',$data);
    }

    public function editUser1($data, $id)
    {
        return $this->performRequest('PUT',"/student/{$id}", $data);
    }

    public function deleteUser1($id)
    {
        return $this->performRequest('DELETE', "/student/{$id}");
    }


    //STUDENT DETAILS

    public function getUserDetails1()
    {
        return $this->performRequest('GET','/studentdetails');
    }

    public function getUserDetail1($id)
    {
        return $this->performRequest('GET', "/studentdetails/{$id}");
    }

    public function createUserDetail1($data)
    {
        return $this->performRequest('POST','/studentdetails',$data);
    }


    //STUDENT GRADING STUDENTS

    public function getGrades1()
    {
        return $this->performRequest('GET','/studentgrades');
    }

    public function getGrade1($id)
    {
        return $this->performRequest('GET', "/studentgrades/{$id}");
    }

}