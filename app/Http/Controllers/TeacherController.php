<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Services\TeacherService;

Class TeacherController extends Controller{
    use ApiResponser;

    public $teacherService;

    public function __construct(TeacherService $teacherService){
        $this->teacherService = $teacherService;
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    // TEACHER

    public function getTeachers(){ 
        return $this->successResponse($this->teacherService->obtainUsers2());
    }


    public function getTeacherID($id){
        return $this->successResponse($this->teacherService->obtainUser2($id));
    }


    public function addTeacher(Request $request ){
        return $this->successResponse($this->teacherService->createUser2($request->all(),Response::HTTP_CREATED));
    }


    public function updateTeacher(Request $request, $id){
        return $this->successResponse($this->teacherService->editUser2($request->all(), $id));
    }


    public function deleteTeacher($id){
        return $this->successResponse($this->teacherService->deleteUser2($id));
    }


    // FURTHER DETAILS

    public function getTeacherDetails(){ 
        return $this->successResponse($this->teacherService->getUserDetails2());
    }


    public function getTeacherDetailsID($id){
        return $this->successResponse($this->teacherService->getUserDetail2($id));
    }


    public function createTeacherDetails(Request $request ){
        return $this->successResponse($this->teacherService->createUserDetail2($request->all(),Response::HTTP_CREATED));
    }


    // GRADING

    public function getGrades(){ 
        return $this->successResponse($this->teacherService->getGrades2());
    }


    public function getGradeID($id){
        return $this->successResponse($this->teacherService->getGrade2($id));
    }


    public function createGrade(Request $request ){
        return $this->successResponse($this->teacherService->createGrade2($request->all(),Response::HTTP_CREATED));
    }
}