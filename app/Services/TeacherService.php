<?php
namespace App\Services;

use App\Traits\ConsumesExternalService;

class TeacherService{
    use ConsumesExternalService;
    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.users2.base_uri');
        $this->secret = config('services.users2.secret');
    }
    
    
    //TEACHER

    public function obtainUsers2()
    {
        return $this->performRequest('GET','/teachers');
    }

    public function obtainUser2($id)
    {
        return $this->performRequest('GET', "/teacher/{$id}");
    }

    public function createUser2($data)
    {
        return $this->performRequest('POST','/teacher',$data);
    }

    public function editUser2($data, $id)
    {
        return $this->performRequest('PUT',"/teacher/{$id}", $data);
    }

    public function deleteUser2($id)
    {
        return $this->performRequest('DELETE', "/teacher/{$id}");
    }


    //TEACHER DETAILS

    public function getUserDetails2()
    {
        return $this->performRequest('GET','/teacherdetails');
    }

    public function getUserDetail2($id)
    {
        return $this->performRequest('GET', "/teacherdetails/{$id}");
    }

    public function createUserDetail2($data)
    {
        return $this->performRequest('POST','/teacherdetails',$data);
    }


    //TEACHER GRADING STUDENTS

    public function getGrades2()
    {
        return $this->performRequest('GET','/grades');
    }

    public function getGrade2($id)
    {
        return $this->performRequest('GET', "/grade/{$id}");
    }

    public function createGrade2($data)
    {
        return $this->performRequest('POST','/addGrade',$data);
    }
}