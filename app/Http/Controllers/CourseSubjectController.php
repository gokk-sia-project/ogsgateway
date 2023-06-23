<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Services\CourseSubjectService;

Class CourseSubjectController extends Controller{
    use ApiResponser;

    public $coursesubjectService;

    public function __construct(CourseSubjectService $coursesubjectService){
        $this->coursesubjectService = $coursesubjectService;
        $this->middleware('auth:api', ['except' => ['login']]);
    }


    // COURSE

    public function getCourses(){ 
        return $this->successResponse($this->coursesubjectService->obtainCourses());
    }

    public function getCourseID($id){
        return $this->successResponse($this->coursesubjectService->obtainCourse($id));
    }


    public function addCourse(Request $request ){
        return $this->successResponse($this->coursesubjectService->createCourse($request->all(),Response::HTTP_CREATED));
    }


    public function updateCourse(Request $request, $id){
        return $this->successResponse($this->coursesubjectService->editCourse($request->all(), $id));
    }


    public function deleteCourse($id){
        return $this->successResponse($this->coursesubjectService->deleteCourse($id));
    }


    // SUBJECT

    public function getSubjects(){ 
        return $this->successResponse($this->coursesubjectService->obtainSubjects());
    }

    public function getSubjectID($id){
        return $this->successResponse($this->coursesubjectService->obtainSubject($id));
    }


    public function addSubject(Request $request ){
        return $this->successResponse($this->coursesubjectService->createSubject($request->all(),Response::HTTP_CREATED));
    }


    public function updateSubject(Request $request, $id){
        return $this->successResponse($this->coursesubjectService->editSubject($request->all(), $id));
    }


    public function deleteSubject($id){
        return $this->successResponse($this->coursesubjectService->deleteSubject($id));
    }


    // STUDENT COURSE

    public function getStudentCourse(){ 
        return $this->successResponse($this->coursesubjectService->getStudentsCourse());
    }

    public function getCourseEnrolled($id){
        return $this->successResponse($this->coursesubjectService->getStudentCourse($id));
    }


    // TEACHER COURSE

    public function getTeacherCourse(){ 
        return $this->successResponse($this->coursesubjectService->getTeachersCourse());
    }

    public function getCourseAssigned($id){
        return $this->successResponse($this->coursesubjectService->getTeacherCourse($id));
    }

    
}