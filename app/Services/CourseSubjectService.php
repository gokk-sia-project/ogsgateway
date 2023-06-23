<?php
namespace App\Services;

use App\Traits\ConsumesExternalService;

class CourseSubjectService{
    use ConsumesExternalService;
    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.users3.base_uri');
        $this->secret = config('services.users3.secret');
    }
    
    
    // COURSE
    
    public function obtainCourses()
    {
        return $this->performRequest('GET','/getcourses');
    }

    public function obtainCourse($id)
    {
        return $this->performRequest('GET', "/getcourse/{$id}");
    }

    public function createCourse($data)
    {
        return $this->performRequest('POST','/addcourse',$data);
    }

    public function editCourse($data, $id)
    {
        return $this->performRequest('PUT',"/updatecourse/{$id}", $data);
    }

    public function deleteCourse($id)
    {
        return $this->performRequest('DELETE', "/deletecourse/{$id}");
    }


    // SUBJECT

    public function obtainSubjects()
    {
        return $this->performRequest('GET','/getsubjects');
    }

    public function obtainSubject($id)
    {
        return $this->performRequest('GET', "/getsubject/{$id}");
    }

    public function createSubject($data)
    {
        return $this->performRequest('POST','/addsubject',$data);
    }

    public function editSubject($data, $id)
    {
        return $this->performRequest('PUT',"/updatesubject/{$id}", $data);
    }

    public function deleteSubject($id)
    {
        return $this->performRequest('DELETE', "/deletesubject/{$id}");
    }


    // STUDENT COURSE

    public function getStudentsCourse()
    {
        return $this->performRequest('GET','/courseenrollees');
    }

    public function getStudentCourse($id)
    {
        return $this->performRequest('GET', "/courseenrollee/{$id}");
    }


    // TEACHER COURSE

    public function getTeachersCourse()
    {
        return $this->performRequest('GET','/courseassignees');
    }

    public function getTeacherCourse($id)
    {
        return $this->performRequest('GET', "/courseassignee/{$id}");
    }

}