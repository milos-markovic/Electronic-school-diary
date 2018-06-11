<?php

use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('indexPage');
});


/*  Admin users routs */

Route::resource('admin/users','AdminUsersController');

/* Admin professors routs */

Route::resource('admin/professors','AdminProfessorsController');
Route::get('admin/professor/{professor}/details','AdminProfessorsController@details')->name('professor.details');
Route::get('admin/professor/{professor}/subjects/create','AdminProfessorsController@addSubjects')->name('add.subjects');
Route::post('admin/professor/{professor}/subjects/store','AdminProfessorsController@storeSubjects')->name('store.subjects');
Route::get('admin/professor/{professor}/subject/{subject}/destroy','AdminProfessorsController@destroyProfessorSubject')->name('professorSubject.destroy');
Route::get('admin/professor/{professor}/subject/{subject}/destroy/class/{class}','AdminProfessorsController@destroyProfessorSubjectClass')->name('subjectClass.destroy');
Route::get('admin/professor/classroom/{classroom}/students','AdminProfessorsController@classroomStudents')->name('professor.classroomStudents');
Route::get('admin/professor/student/{student}/details','AdminProfessorsController@studentDetails')->name('professor.studentDetails');
Route::get('sentAjax','AdminProfessorsController@sentAjax');

/* Admin Subjects routs */

Route::resource('admin/subjects','AdminSubjectsController', ['only' => ['index', 'store','destroy']] );


/* Admin Classroom routs */

Route::resource('admin/classroom','AdminClassesController');

Route::get('admin/classroom/{classroom}/students','AdminClassroomStudentsController@index')->name('classroom.studentsIndex');
Route::get('admin/classroom/{classroom}/student/create','AdminClassroomStudentsController@create')->name('classroom.studentCreate');
Route::post('admin/classroom/{classroom}/student/store','AdminClassroomStudentsController@store')->name('classroom.studentStore');
Route::get('admin/classroom/student/{student}/edit','AdminClassroomStudentsController@edit')->name('classroom.studentEdit');
Route::post('admin/classroom/student/{student}/update','AdminClassroomStudentsController@update')->name('classroom.studentUpdate');
Route::get('admin/classroom/{classroom}/student/{student}/destroy','AdminClassroomStudentsController@destroy')->name('classroom.studentDestroy');
Route::get('admin/classroom/{classroom}/student/{student}/details','AdminClassroomStudentsController@studentDetails')->name('classroom.student.details');

/*  Admin Students routs */

Route::resource('admin/students','AdminStudentsController');
Route::get('admin/students/{student}/details','AdminStudentsController@details')->name('student.details');


/* Admin Parents routs */

Route::resource('admin/parents','AdminParentsController');
Route::get('admin/parents/{parent}/student/create','AdminParentsController@createStudent')->name('parents.createStudent');
Route::post('admin/parents/{parent}/student/store','AdminParentsController@storeStudent')->name('parents.storeStudent');
Route::get('admin/parents/student/{student}/edit','AdminParentsController@editStudent')->name('parents.editStudent');
Route::post('admin/parents/student/{student}/update','AdminParentsController@updateStudent')->name('parents.updateStudent');
Route::get('admin/parents/{parent}/student/{student}/destroy','AdminParentsController@destroyStudent')->name('parents.destroyStudent');
Route::get('admin/parents/student/{student}/details','AdminParentsController@studentDetails')->name('parents.studentDetails');

/*   profesor  routs  */                             

Route::resource('professor','ProfessorController');
Route::get('professor/classroom/{classroom}/students','ProfessorController@classroomStudents')->name('classroomStudents');
Route::get('professor/classroom/{classroom}/student/{student}/details','ProfessorController@studentDetails')->name('professor.student.details');
Route::get('professor/student/{student}/subject/{subject}/insert/grade','ProfessorController@insertGrade')->name('student.insertGrade');
Route::post('professor/student/{student}/store/grade','ProfessorController@storeGrade')->name('student.storeGrade');
Route::get('professor/student/{student}/subject/{subject}/remove/grade/{grade}','ProfessorController@removeGrade')->name('subject.removeGrade');


/*   parent routs   */

Route::get('parent','ParentController@index')->name('parent.index');
Route::get('parent/student/{student}/details','ParentController@studentDetails')->name('parent.student.details');




/* Login */

Route::get('login','LoginController@login')->name('login');
Route::post('login','LoginController@storeLogin')->name('login.user');
Route::get('logout','LoginController@logout')->name('logout');