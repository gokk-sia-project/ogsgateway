<?php

$router->get('/', function () use ($router) {
    echo "<center> Welcome </center>";
});

$router->get('/version', function () use ($router) {
    return $router->app->version();
});

Route::group([

    'prefix' => 'api'

], function ($router) {

    Route::post('login', 'AuthController@login');

    Route::post('user-profile', 'AuthController@me');


//STUDENT CONTROLLER 8000

    // STUDENT

    $router->get('/students',['uses' => 'StudentController@getStudents']);

    $router->get('/student/{id}', 'StudentController@getStudentID');

    $router->post('/student', 'StudentController@addStudent');

    $router->put('/student/{id}', 'StudentController@updateStudent');

    $router->delete('/student/{id}', 'StudentController@deleteStudent'); 

    // FURTHER DETAILS

    $router->get('/studentDetails',['uses' => 'StudentController@getStudentDetails']); 

    $router->get('/studentDetails/{id}', 'StudentController@getStudentDetailsID');

    $router->post('/studentDetails', 'StudentController@createStudentDetails');

    // GRADES

    $router->get('/GradesS',['uses' => 'StudentController@getGrades']);

    $router->get('/GradeS/{id}', 'StudentController@getGradeID');
    

//TEACHER CONTROLLER 8001

    // TEACHER

    $router->get('/teachers',['uses' => 'TeacherController@getTeachers']);

    $router->get('/teacher/{id}', 'TeacherController@getTeacherID');

    $router->post('/teacher', 'TeacherController@addTeacher');

    $router->put('/teacher/{id}', 'TeacherController@updateTeacher');

    $router->delete('/teacher/{id}', 'TeacherController@deleteTeacher');

    // FURTHER DETAILS

    $router->get('/teacherDetails',['uses' => 'TeacherController@getTeacherDetails']); 

    $router->get('/teacherDetails/{id}', 'TeacherController@getTeacherDetailsID');

    $router->post('/teacherDetails', 'TeacherController@createTeacherDetails');

    // GRADING

    $router->get('/GradesT',['uses' => 'TeacherController@getGrades']);

    $router->get('/GradeT/{id}', 'TeacherController@getGradeID');
    
    $router->post('/GradeT', 'TeacherController@createGrade');


//COURSE SUBJECT CONTROLLER 8002

    // COURSE

    $router->get('/getcourses',['uses' => 'CourseSubjectController@getCourses']); //getCourses - SHOW ALL COURSES

    $router->get('/getcourse/{id}', 'CourseSubjectController@getCourseID'); //getCourseID - GET COURSE BY ID

    $router->post('/addcourse', 'CourseSubjectController@addCourse'); //addCourse - CREATE NEW COURSE

    $router->put('/updatecourse/{id}', 'CourseSubjectController@updateCourse');  //updateCourse - UPDATE COURSE USING PUT

    $router->delete('/deletecourse/{id}', 'CourseSubjectController@deleteCourse'); //deleteCourse - DELETE COURSE


    // SUBJECT

    $router->get('/getsubjects',['uses' => 'CourseSubjectController@getSubjects']); //getSubjects - SHOW ALL SUBJECTS

    $router->get('/getsubject/{id}', 'CourseSubjectController@getSubjectID'); //getSubjectID - GET SUBJECT BY ID

    $router->post('/addsubject', 'CourseSubjectController@addSubject'); //addSubject - CREATE NEW SUBJECT

    $router->put('/updatesubject/{id}', 'CourseSubjectController@updateSubject');  //updateSubject - UPDATE COURSE USING PUT

    $router->delete('/deletesubject/{id}', 'CourseSubjectController@deleteSubject'); //deleteSubject - DELETE COURSE


    // STUDENT

    $router->get('/courseenrollees','CourseSubjectController@getStudentCourse'); //index - GET ALL LIST OF ENROLLEES'

    $router->get('/courseenrollee/{id}','CourseSubjectController@getCourseEnrolled'); //getCourseEnrolled - GET ENROLLED STUDENT BY ID


    // TEACHER

    $router->get('/courseassignees','CourseSubjectController@getTeacherCourse'); //index - GET ALL LIST OF ASSIGNEES'

    $router->get('/courseassignee/{id}','CourseSubjectController@getCourseAssigned'); //getCourseAssigned - GET ASSIGNED TEACHER BY ID


});