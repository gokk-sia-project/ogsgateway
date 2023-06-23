<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Services\StudentService;

Class StudentController extends Controller{
    use ApiResponser;

    public $studentService;

    public function __construct(StudentService $studentService){
        $this->studentService = $studentService;
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function getStudents(){ 
        return $this->successResponse($this->studentService->obtainUsers1());
    }

    public function getStudentID($id){
        return $this->successResponse($this->studentService->obtainUser1($id));
    }


    public function addStudent(Request $request ){
        return $this->successResponse($this->studentService->createUser1($request->all(),Response::HTTP_CREATED));
    }


    public function updateStudent(Request $request, $id){
        return $this->successResponse($this->studentService->editUser1($request->all(), $id));
    }


    public function deleteStudent($id){
        return $this->successResponse($this->studentService->deleteUser1($id));
    }


    // FURTHER DETAILS

    public function getStudentDetails(){ 
        return $this->successResponse($this->studentService->getUserDetails1());
    }


    public function getStudentDetailsID($id){
        return $this->successResponse($this->studentService->getUserDetail1($id));
    }


    public function createStudentDetails(Request $request ){
        return $this->successResponse($this->studentService->createUserDetail1($request->all(),Response::HTTP_CREATED));
    }


    // GRADING

    public function getGrades(){ 
        return $this->successResponse($this->studentService->getGrades1());
    }


    public function getGradeID($id){
        return $this->successResponse($this->studentService->getGrade1($id));
    }
}