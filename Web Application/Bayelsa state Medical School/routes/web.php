<?php

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

/*
Route::get('/', function () {
     return view('welcome');
	 
	
});
*/

Route::get('/','alarmController@index');


Auth::routes();





Route::get('/home', 'HomeController@index')->name('home');
 
Route::get('/insert','HomeController@insertform')->name('insert');
Route::post('/create', 'HomeController@insert')->name('create');

  
Route::get('/edit/{id}','HomeController@getShow');
Route::post('/edit/{id}','HomeController@edit')->name('createData');
Route::post('delete/{id}','HomeController@destroy');

Route::post('delete-multiple-home/{id}','HomeController@destroyHome');


Route::get('/contact-us', 'contactUsCommentController@index')->name('contact-us');


 
 
 
 

/*USER */

Route::get('/user', 'UsersController@index')->name('user');
/*DELETE USER LOGIN */
Route::get('delete_usr/{id}','UsersController@destroy');
Route::post('insertUsr','UsersController@edit')->name('insertUsr');


Route::get('reg','RegController@getShow');
Route::POST('regUsers','RegController@create')->name('regUsers');




Route::get('/profile', 'UsersController@userProfile')->name('profile');
Route::get('/editProfile/{id}','UsersController@show');
Route::post('/editProfile/{id}','UsersController@editProfile')->name('editProfile');

 Route::get('/settings', 'UsersController@showSettings')->name('settings');


 Route::get('/admin', 'AdminController@index')->name('admin');
 
 
 Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
 
// Route::post('/login', '\myFirstApp\Http\Controllers\Auth\LoginController@login');
 
/*DELETE USER LOGIN */
 Route::get('delete_admin/{id}','AdminController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* LECTURER STARTS HERE */
Route::get('/lecturer', 'LecturerController@index')->name('lecturer');
Route::get('/insertLecturer','LecturerController@insertform')->name('insertLecturer');
Route::post('/createLecturer', 'LecturerController@insert')->name('storeData');

 Route::get('/editLecturer/{id}','LecturerController@show');
  Route::POST('/editLecturer/{id}','LecturerController@edit')->name('editLecturer');
 Route::POST('search_lecturer','LecturerController@search');
 
 
 Route::POST('search_lecturer_fal','LecturerController@searchFaculty');
 Route::POST('search_lecturer_fal_dpt','LecturerController@searchDepartment');
  
 Route::POST('search_lecturer_fal_dpt_prg','LecturerController@searchProgram');
 
 
  Route::POST('lecturerDetails','LecturerController@searchStById');

 
 
  Route::POST('delete_lecturer/{id}','LecturerController@destroy');
    Route::POST('delete_multiple_lecturer/{id}','LecturerController@destroyLecturer');
 
 
 
 
 
  /* ACADEMIC SESSION STARTS HERE */
 Route::get('/academic-session', 'AcademicSessionController@index')->name('lecturer');
Route::get('/insert-academic-session','AcademicSessionController@insertform')->name('insertLecturer');
Route::post('/create-academic-session', 'AcademicSessionController@insert')->name('storeData');

 Route::get('/edit-academic-session/{id}','AcademicSessionController@show');
  Route::POST('/edit-academic-session/{id}','AcademicSessionController@edit')->name('editLecturer');
 Route::POST('search-academic-session','AcademicSessionController@search');
 
  Route::POST('delete-academic-session/{id}','AcademicSessionController@destroy');
    Route::POST('delete-multiple-academic-session/{id}','AcademicSessionController@destroyLecturer');
 
 
 
 
 
 
 
 /* FACULTY STARTS HERE */
 Route::get('/faculty', 'FacultyController@index')->name('lecturer');
Route::get('/insertFaculty','FacultyController@insertform')->name('insertLecturer');
Route::post('/create_faculty', 'FacultyController@insert')->name('storeData');

 Route::get('/editFaculty/{id}','FacultyController@show');
  Route::POST('/editFaculty/{id}','FacultyController@edit')->name('editLecturer');
 Route::POST('search_faculty','FacultyController@search');
 
  Route::POST('delete_faculty/{id}','FacultyController@destroy');
    Route::POST('delete_multiple_faculty/{id}','FacultyController@destroyLecturer');
 
 
 
 
 
 
 
 
 
 
 /* DEPARTMENT STARTS HERE */
 Route::get('/department', 'DepartmentController@index')->name('lecturer');
Route::get('/insertDepartment','DepartmentController@insertform')->name('insertDepartment');
Route::post('/create_department', 'DepartmentController@insert')->name('storeDataDepartment');

 Route::get('/editDepartment/{id}','DepartmentController@show');
  Route::POST('/editDepartment/{id}','DepartmentController@edit')->name('editDepartment');
 Route::POST('search_department','DepartmentController@search');
 Route::POST('search_dpt','DepartmentController@searchDepartment');
 
 
  Route::POST('delete_department/{id}','DepartmentController@destroy');
    Route::POST('delete_multiple_department/{id}','DepartmentController@destroyDepartment');


 /* PROGRAM STARTS HERE */
 Route::get('/program', 'ProgramController@index')->name('lecturer');
Route::get('/insertProgram','ProgramController@insertform')->name('insertProgram');
Route::post('/create_program', 'ProgramController@insert')->name('storeDataProgram');

 Route::get('/editProgram/{id}','ProgramController@show');
  Route::POST('/editProgram/{id}','ProgramController@edit')->name('editProgram');
  
   Route::POST('search_faculty_prog','ProgramController@search_prg');
  
  
 Route::POST('search_department_prog','ProgramController@search');
 Route::POST('search_prg','ProgramController@searchProgram');
 
   Route::POST('search_faculty_dpt','ProgramController@search_fal_dpt');
  Route::POST('search_fal','ProgramController@search_fal');
  
 
  Route::POST('delete_program/{id}','ProgramController@destroy');
    Route::POST('delete_multiple_program/{id}','ProgramController@destroyProgram');


/* LEVEL STARTS HERE */
 Route::get('/level', 'LevelController@index')->name('level');
Route::get('/insertLevel','LevelController@insertform')->name('insertLevel');
Route::post('/create_level', 'LevelController@insert')->name('storeData');

 Route::get('/editLevel/{id}','LevelController@show');
  Route::POST('/editLevel/{id}','LevelController@edit')->name('editLevel');
 Route::POST('search_level','LevelController@search');
 
  Route::POST('delete_level/{id}','LevelController@destroy');
    Route::POST('delete_multiple_level/{id}','LevelController@destroyLevel');
 
 
 
 /* SEMESTER STARTS HERE */
 Route::get('/semester', 'SemesterController@index')->name('semester');
Route::get('/insertSemester','SemesterController@insertform')->name('insertSemester');
Route::post('/create_semester', 'SemesterController@insert')->name('storeData');

 Route::get('/editSemester/{id}','SemesterController@show');
  Route::POST('/editSemester/{id}','SemesterController@edit')->name('editSemester');
 Route::POST('search_semester','SemesterController@search');
 
  Route::POST('delete_semester/{id}','SemesterController@destroy');
    Route::POST('delete_multiple_semester/{id}','SemesterController@destroySemester');
 
 
 /* MAXIMUM COURSE OFFER STARTS HERE */
 Route::get('/maxCourse', 'MaxCourseController@index')->name('lecturer');
Route::get('/insertMaxCourse','MaxCourseController@insertform')->name('insertMaxCourse');
Route::post('/create_maxCourse', 'MaxCourseController@insert')->name('storeDataMaxCourse');

 Route::get('/editMaxCourse/{id}','MaxCourseController@show');
  Route::POST('/editMaxCourse/{id}','MaxCourseController@edit')->name('editMaxCourse');
 Route::POST('search_maxCourse','MaxCourseController@search');
 Route::POST('search_mxc','MaxCourseController@searchDepartment');
 
 
  Route::POST('delete_maxCourse/{id}','MaxCourseController@destroy');
    Route::POST('delete_multiple_maxCourse/{id}','MaxCourseController@destroyDepartment');


/* FEES STARTS HERE */
 Route::get('/fees', 'FeesController@index')->name('fees');
Route::get('/insertFees','FeesController@insertform')->name('insertFees');
Route::post('/create_fees', 'FeesController@insert')->name('storeDataFees');

 Route::get('/editFees/{id}','FeesController@show');
  Route::POST('/editFees/{id}','FeesController@edit')->name('editFees');
 Route::POST('search_fees_text','FeesController@search');
 Route::POST('search_fees','FeesController@searchDepartment');
 
 Route::POST('search_fees_level','FeesController@searchProgramLevel');
 
 
  Route::POST('delete_fees/{id}','FeesController@destroy');
    Route::POST('delete_multiple_fees/{id}','FeesController@destroyDepartment');


/* STUDENT STARTS HERE */
Route::get('/student', 'StudentController@index')->name('student');
Route::get('/insertStudent','StudentController@insertform')->name('insertStudent');
Route::post('/createStudent', 'StudentController@insert')->name('storeData');

 Route::get('/editStudent/{id}','StudentController@show');
  Route::POST('/editStudent/{id}','StudentController@edit')->name('editStudent');
 Route::POST('search_student','StudentController@search');
 
 Route::POST('search_studentId','StudentController@searchStId');
 
 Route::POST('studentDetails','StudentController@searchStById');
 
  
 Route::POST('search_student_fal','StudentController@searchFaculty');
 Route::POST('search_student_fal_dpt','StudentController@searchDepartment');
  
 Route::POST('search_student_fal_dpt_prg','StudentController@searchProgram');
 
  Route::POST('search_fal_stdId','StudentController@generateStdId');
 
  Route::POST('delete_student/{id}','StudentController@destroy');
    Route::POST('delete_multiple_student/{id}','StudentController@destroyMultiple');
 
 Route::get('transfer','StudentController@transfer');
 Route::POST('search_StId_transfer','StudentController@transferSt');
 Route::POST('search_student_fal_dpt_prg_edit','StudentController@transferSt_edit');
 
 
 /* STUDENT ACTION STARTS HERE */
 Route::get('/action-on-student', 'StudentController@action_on_student')->name('student');
Route::get('/insert-action-on-student','StudentController@insertform_Action_on_student')->name('insertStudent');
Route::post('/create-action-on-student', 'StudentController@insert_Action_on_student')->name('storeData');

 Route::get('/edit-action-on-student/{id}','StudentController@show_Action_on_student');
  Route::POST('/edit-action-on-student/{id}','StudentController@edit_Action_on_student')->name('editStudent');
 Route::POST('search-action-on-student-fname','StudentController@search_Action_on_student');
 
 Route::POST('search-action-on-student-details','StudentController@search_Action_on_student_details');
 
 Route::POST('search-action-on-student-stdId-like','StudentController@search_Action_on_student_like');
 
 Route::POST('search-action-on-student','StudentController@searchStudentId');

 Route::POST('delete-multiple-action-on-student/{id}','StudentController@delete_action_on_student');
 
 
 
 
 
 
 
 
 
 /* COURSE STARTS HERE */
 Route::get('/course', 'CourseController@index')->name('fees');
Route::get('/insertCourse','CourseController@insertform')->name('insertFees');
Route::post('/create_course', 'CourseController@insert')->name('storeDataFees');

   Route::get('/editCourse/{id}','CourseController@show');
  Route::POST('/editCourse/{id}','CourseController@edit')->name('edit_courses');
 
 Route::POST('search-course-text','CourseController@search');
 Route::POST('search_course_fal','CourseController@searchFaculty');

// Route::POST('search_course_fal','CourseController@searchFaculty');
 Route::POST('search_course_fal_dpt','CourseController@searchDepartment');


 
 Route::POST('search_course_level','CourseController@searchCourseLevel');
 Route::POST('search-course-semester','CourseController@searchCourseSemester');
 
  Route::POST('delete_course/{id}','CourseController@destroy');
    Route::POST('delete_multiple_course/{id}','CourseController@destroyDepartment');








 /* PROGRAM COURSE STARTS HERE */
 Route::get('/program-course', 'ProgramCourseController@index')->name('program_course');
Route::get('/insert-Program-Course','ProgramCourseController@insertform')->name('insertProgramCourse');
Route::post('/create-program-course', 'ProgramCourseController@insert')->name('storeDataProgramCourse');

Route::post('/create-program-course-view', 'ProgramCourseController@inserViewCourse')->name('storeDataViewProgramCourse');

 //  Route::get('/edit-Program-Course/{id}','ProgramCourseController@show');
  Route::POST('/edit-Program-Course/{id}','ProgramCourseController@edit')->name('edit_Program_courses');
  
  

  Route::POST('search-program-course-text','ProgramCourseController@search');
 Route::POST('search-course-fal','ProgramCourseController@searchFaculty');

  Route::POST('search-program-course-fal','ProgramCourseController@searchFaculty');
 Route::POST('search-program-course-fal-dpt','ProgramCourseController@searchDepartment');
 
  

  Route::POST('search-course-fal-dpt-program-course','ProgramCourseController@searchProgramCourse');


 
 Route::POST('search-program-course-level','ProgramCourseController@searchCourseLevel');
 Route::POST('search-program-course-semester','ProgramCourseController@searchCourseSemester');
 
  Route::POST('delete-program-course/{id}','ProgramCourseController@destroy');
    Route::POST('delete_multiple-program-course/{id}','ProgramCourseController@destroyDepartment');





/* LECTURE  COURSE STARTS HERE */
 Route::get('/lecture-course', 'LectureCourseController@index')->name('program_course');
Route::get('/insert-Lecture-Course','LectureCourseController@insertform')->name('insertProgramCourse');
Route::post('/create-lecture-course', 'LectureCourseController@insert')->name('storeDataProgramCourse');

Route::post('/create-lecture-course-view', 'LectureCourseController@inserViewCourse')->name('storeDataViewProgramCourse');

 //  Route::get('/edit-Program-Course/{id}','ProgramCourseController@show');
  Route::POST('/edit-Lecture-Course/{id}','LectureCourseController@edit')->name('edit_Program_courses');
  
 
  
  //search_course_fal
//search_course_fal_dpt
//search-course-semester
//search-course-text


   Route::POST('search-lecture-course-text','LectureCourseController@search');
 //Route::POST('search-lecture-course-fal','LectureCourseController@searchFaculty');

 Route::POST('search-lecture-course-fal','LectureCourseController@searchFaculty');
 Route::POST('search-lecture-course-fal-dpt','LectureCourseController@searchDepartment');
 
  

  Route::POST('search-course-fal-dpt-lecture-course','LectureCourseController@searchProgramCourse');


 
  Route::POST('search-lecture-course-level','LectureCourseController@searchCourseLevel');
  Route::POST('search-lecture-course-semester','LectureCourseController@searchCourseSemester');
 
  Route::POST('delete-lecture-course/{id}','LectureCourseController@destroy');
    Route::POST('delete_multiple-lecture-course/{id}','LectureCourseController@destroyDepartment');


/* LECTURE NOTES STARTS HERE */

 Route::get('/lecture-note', 'uploadLectureNoteController@index')->name('lecture-note');
Route::get('/insert-upload-lecture-notes','uploadLectureNoteController@insertform')->name('insert-lecture-notes');
Route::post('/create-upload-lecture-notes', 'uploadLectureNoteController@insert')->name('store-lecture-notes');


 Route::POST('delete-lecture-course/{id}','uploadLectureNoteController@destroy');
    Route::POST('delete_multiple-lecture-notes/{id}','uploadLectureNoteController@destroyLectureNotes');




/* QUESTION STARTS HERE */


 Route::get('insert-Question', 'QuestionController@getInsertform');
  Route::post('insert-Questions', 'QuestionController@setInsertform')->name('insertQuestions');
  Route::POST('search-faculty','QuestionController@postEdit');
 
 Route::POST('search-faculty-department','QuestionController@postEditTerm');
 Route::POST('search-faculty-department-course','QuestionController@postEditTermSubj');
  Route::POST('search-question','QuestionController@postEditQuestion');
 
 
  Route::POST('search-fal-dpt-course','QuestionController@setCourses');
 
  
  Route::get('question','QuestionController@index')->name('question');
  Route::get('/edit-question/{id}','QuestionController@getShow');
   Route::POST('/edit-question/{id}','QuestionController@edit')->name('editQuestion');
   Route::POST('delete-question/{id}','QuestionController@destroy');
    Route::POST('delete-multiple-question/{id}','QuestionController@destroyQuestion');


 /* FACULTY STARTS HERE */
 Route::get('/building', 'BuildingController@index')->name('lecturer');
Route::get('/insert-building','BuildingController@insertform')->name('insertLecturer');
Route::post('/create-building', 'BuildingController@insert')->name('storeData');

 Route::get('/edit-building/{id}','BuildingController@show');
  Route::POST('/edit-building/{id}','BuildingController@edit')->name('editLecturer');
 Route::POST('search-building','BuildingController@search');
 
  Route::POST('delete-building/{id}','BuildingController@destroy');
    Route::POST('delete-multiple-building/{id}','BuildingController@destroyLecturer');


 /* LECTURE ROOM STARTS HERE */
 Route::get('/lecture-room', 'LectureRoomController@index')->name('lecturer');
Route::get('/insert-lecture-room','LectureRoomController@insertform')->name('insertDepartment');
Route::post('/create-lecture-room', 'LectureRoomController@insert')->name('storeDataDepartment');

 Route::get('/edit-lecture-room/{id}','LectureRoomController@show');
  Route::POST('/edit-lecture-room/{id}','LectureRoomController@edit')->name('editDepartment');
 Route::POST('search-lecture-room','LectureRoomController@searchDepartment');
 Route::POST('search-lecture-room-text','LectureRoomController@search');
 
 
  Route::POST('delete-lecture-room/{id}','LectureRoomController@destroy');
    Route::POST('delete-multiple-lecture-room/{id}','LectureRoomController@destroyDepartment');

/* TIME TABLE STARTS HERE */
 
 Route::get('/time-table', 'TimeTableController@index')->name('lecturer');
 
 Route::get('/exam-time-table', 'TimeTableController@examTimeTable')->name('examTimeTable');
 
Route::get('/insert-time-table','TimeTableController@getInsertform')->name('insertLecturer');
 Route::post('/create-time-table', 'TimeTableController@setInsertform')->name('storeData');
Route::POST('search-fal-dpt-program-lev-sem','TimeTableController@searchFalDptPrgLevSem');




 Route::POST('search-faculty-time-table','TimeTableController@postEdit');
 
 Route::POST('search-faculty-department-time-table','TimeTableController@postEditTerm');
 
 Route::POST('search-faculty-dpt-course-time-table','TimeTableController@postEditTermSubj');
  Route::POST('search-courseText','TimeTableController@postEditQuestion');
 
 
  Route::POST('search-fal-dpt-course','QuestionController@setCourses');
  
   Route::POST('search-publish-time-table','TimeTableController@setPublish');
   Route::POST('student-time-table','TimeTableController@setPreview');
 
  
 // Route::get('question','QuestionController@index')->name('question');
  Route::get('/edit-time-table/{id}','TimeTableController@getShow');
   Route::POST('/edit-time-table/{id}','TimeTableController@edit')->name('editQuestion');
   Route::POST('delete-time-table/{id}','TimeTableController@destroy');
    Route::POST('delete-multiple-time-table/{id}','TimeTableController@destroyQuestion');





/* SET EXAM/TEST QUESTION  */
 Route::get('insert-examTest', 'ExamTestController@getInsertform');
  Route::post('insert-examTest', 'ExamTestController@setInsertform')->name('insertQuestions');
 
  Route::POST('search-examTest-faculty','ExamTestController@postEdit');
 
 Route::POST('search-faculty-department-examTest','ExamTestController@postEditTerm');
  
 Route::POST('search-faculty-department-course-examTest','ExamTestController@postEditTermSubj');
  
  Route::POST('search-examTest','ExamTestController@postEditQuestion');
 
 
  Route::POST('search-fal-dpt-course','QuestionController@setCourses');
 
  
  Route::get('examTest','ExamTestController@index')->name('examTest');
  Route::get('/edit-examTest/{id}','ExamTestController@getShow');
   Route::POST('/edit-examTest/{id}','ExamTestController@edit')->name('editQuestion');
   Route::POST('delete-examTest/{id}','ExamTestController@destroy');
    Route::POST('delete-multiple-examTest/{id}','ExamTestController@destroyQuestion');



//INSTRUCTION START HERE
  
  
  Route::get('insertInst', 'InstructionController@create');
  Route::post('insertInst', 'InstructionController@storeData')->name('insertInstruction');
 
 
 Route::get('/editInst/{id}','InstructionController@getShow');
  Route::POST('/editInst/{id}','InstructionController@edit')->name('editInstruction');
  
   
   Route::POST('delete_Inst/{id}','InstructionController@destroy');
    Route::POST('delete_multiple_Inst/{id}','InstructionController@destroyClass');
 Route::get('instruction','InstructionController@index')->name('instruction');



/* SET EXAM STARTS HERE */
 
 Route::get('results', 'examController@getResult')->name('results');

   Route::POST('result', 'examController@insertResult')->name('result');
  
  
   Route::get('setExam', 'examController@getSetExam')->name('setExams');

   Route::POST('setExam', 'examController@postSetExam')->name('setExam');
   
    Route::POST('setExam-test', 'examController@postSetTest')->name('setExams');
   
  
  Route::POST('regStudent', 'examController@register')->name('regStudent');
  Route::POST('searchStudent', 'examController@postSearch')->name('searchStudent');
  
   Route::POST('searchFName', 'examController@postFName')->name('searchFName');
   
   /* GET RESULT STARTS HERE */
 
 
 Route::get('submitResult','ResultController@index')->name('submitResult');
 
  Route::get('assignment-mark','ResultController@assignment')->name('assignment');
  Route::get('test','ResultController@test')->name('test');
 Route::get('written-exam','ResultController@writtenExam')->name('writtenExam');
 
 
 Route::get('/insert-assignment-mark','ResultController@insertform_assignment')->name('insertAssignment');

Route::get('/insert-test','ResultController@insertform_test')->name('insertTest');
Route::get('/insert-written-exam','ResultController@insert_form_written_exam')->name('insertTest');


Route::post('/create-result-type', 'ResultController@insert')->name('storeDataResultType');

 
  Route::get('/edit-result/{id}','ResultController@getShow');
  Route::POST('/edit-result/{id}','ResultController@edit')->name('editInstruction');
  
  
 
 
  Route::POST('faculty-Result', 'ResultController@postFaculty')->name('facultyRst');
 
 
 Route::POST('faculty-department-result','ResultController@post_rst_sch');
 
 
  Route::POST('search-level-result','ResultController@postEdit');
 
 Route::POST('search-level-semester-result','ResultController@postEditTerm');
 
 Route::POST('search-level-semester-course-result','ResultController@postEditTermSubj');
 
  Route::POST('search-student-result','ResultController@postSearchStdId');
 
  Route::POST('search_rst','ResultController@postEditQuestion');
  
 
    Route::POST('delete-multiple-result/{id}','ResultController@destroy');
	
	
	
	/* TOTAL RESULT START HERE */
	
	Route::POST('migrate-result','TotalResultController@migrateResult');
	
	Route::get('total-result','TotalResultController@index')->name('totalResult');
  Route::POST('faculty-total-Result', 'TotalResultController@postFaculty')->name('facultyRst');
 
 
 Route::POST('faculty-department-total-result','TotalResultController@post_rst_sch');
 
 
  Route::POST('search-level-total-result','TotalResultController@postEdit');
 
 Route::POST('search-level-semester-total-result','TotalResultController@postEditTerm');
 
 Route::POST('search-level-semester-course-total-result','TotalResultController@postEditTermSubj');
 
  
 
  Route::POST('search-total-result','TotalResultController@postEditQuestion');
  
 
    Route::POST('delete-multiple-total-result/{id}','TotalResultController@destroy');
	
	Route::get('insert-total-result','TotalResultController@insert_total_result')->name('inserttotalResult');
	Route::post('/create-total-result', 'TotalResultController@insert')->name('storeDataResultType');

 
  Route::get('/edit-total-result/{id}','TotalResultController@getShow');
  Route::POST('/edit-total-result/{id}','TotalResultController@edit')->name('editInstruction');
 
 Route::POST('search-total-result-stdId','TotalResultController@postStdId');
 
 Route::POST('search-student-total-result','TotalResultController@postSearchStdId');
 
 
 
 
	
	//PDF EXPORT
 
 
 
 Route::POST('insertPDFExport','pdfController@insertPDFExport')->name('insertPDFExport');
	
	
	/* ACTIVITIES STARTS HERE */
	
	
	Route::get('activity','ActivityController@index')->name('activity');
	Route::POST('delete-multiple-activity/{id}','ActivityController@destroy');
	
	/* PUBLISH STARTS HERE */
	
	Route::get('publish-result','PublishController@index')->name('publish');
	
	 Route::POST('delete-multiple-publish-result-date/{id}','PublishController@destroy');
	
	Route::get('insert-publish-result-date','PublishController@insert_publish_result')->name('inserttotalResult');
	Route::post('/create-publish-result-date', 'PublishController@insert')->name('storeDataResultType');

 
  Route::get('/edit-publish-result-date/{id}','PublishController@getShow');
  Route::POST('/edit-publish-result-date/{id}','PublishController@edit')->name('editInstruction');
 
	
	
	/* ALARM CONTROLLER */
Route::get('/view-alarm/{id}','AlarmController@getShow')->name('view');
 Route::get('/alarm', 'AlarmController@index')->name('alarm'); 
 
   Route::POST('/setAlarm','AlarmController@setInsertAlarm')->name('setAlarm');  
    Route::POST('/setAlarm-time','AlarmController@setAlarmTime');
	
	
	Route::get('/timer-reading','TimerController@index')->name('timer-reading'); 
	Route::get('/stopwatch', 'StopWatchController@index')->name('stopwatch'); 
	Route::get('/world-clock', 'WorldClockController@index')->name('worldClock'); 
	//Route::get('/calendar', 'CalendarController@index')->name('calendar'); 
	
	Route::get('/count-days', 'CalendarController@getCountDate')->name('calendars'); 
	Route::get('/add-date', 'CalendarController@index')->name('calendar'); 
	Route::get('/time-calculator', 'CalendarController@time_calculator')->name('calendar-time'); 
	
	Route::get('/holiday', 'HolidayController@index')->name('holiday'); 
	
	/* statrting here tomorrow */
	Route::get('/easter-sunday/{id}', 'HolidayController@getEasterSunday')->name('holiday'); 
	Route::get('/easter-monday/{id}', 'HolidayController@getEasterMonday')->name('holiday-monday'); 
	Route::get('/good-friday/{id}', 'HolidayController@getGoodFriday')->name('holiday'); 
	
	Route::get('/new-year/{id}', 'HolidayController@getNewYear')->name('newyear'); 
	Route::get('/christmas/{id}', 'HolidayController@getChristmas')->name('christemas');
	Route::get('/christmas-eve/{id}', 'HolidayController@getChristmasEve')->name('christemasEv'); 
	
	Route::get('/valentine/{id}', 'HolidayController@getValentine')->name('valentine'); 
	Route::get('/saint-partrick/{id}', 'HolidayController@getSaintPatrick')->name('saintpatrick'); 
	Route::get('/martin-luther-king/{id}', 'HolidayController@getMartinLutherKing')->name('martinLuther'); 
	
	Route::get('/view-country-holiday/{id}', 'HolidayController@getCountryHoliday')->name('country'); 
	
	/* ending here */
	
	Route::post('country-time','WorldClockController@getTime')->name('WorldClock');
	Route::post('utc-time','WorldClockController@getUTCTime')->name('UTCWorldClock');
	
	Route::post('create-utc-time','WorldClockController@insert')->name('InsertWorldClock');
	
	Route::get('/view-city-utc-time/{id}','WorldClockController@getShow');
	
	
	
	/*  CREATE WORLD CLOCK STARTS HERE ADMIN PAGE */
	 //Route::get('/country', 'DepartmentController@index')->name('lecturer');

	Route::get('/city', 'CityController@index')->name('city');


	Route::get('insert-city','CityController@get_insert')->name('insertWorldClock');
	Route::post('/create-world-clock', 'CityController@insert')->name('storeDataWorldClock');
	
	Route::get('/edit-city/{id}','CityController@getShow');
  Route::POST('/edit-city/{id}','CityController@edit')->name('editCity');
  
	Route::post('/search-city', 'CityController@search')->name('searchCity');

   Route::POST('delete-multiple-city/{id}','CityController@destroy');
   Route::POST('delete-city/{id}','CityController@destroy');
   
   
	/* BLOG COMMENTS STARTS HERE */
	
	Route::get('/comment', 'BlogCommentController@index')->name('blog');
	 Route::post('/search-blog-comment', 'BlogCommentController@search')->name('searchBlog');
	
	Route::POST('delete-multiple-blog-comment/{id}','BlogCommentController@destroyBlog');
	
	 
	 Route::POST('delete-blog-comment/{id}','BlogCommentController@destroy');

 Route::POST('delete-comment-comment/{id}','BlogCommentController@destroy_comment_comment');
 Route::POST('/blog-comment-comment/','BlogCommentController@getShow');
	
	
	/* BLOG CONTROLLER STARTS HERE */
	
	Route::get('/view-blog-page/{id}', 'BlogViewController@getBlogId');
	Route::post('/create-blog-view/', 'BlogViewController@insert')->name('blogView');
	
	Route::post('/edit-blog-view-like/', 'BlogViewController@editLike')->name('blog-like');
	
	
	
	
	Route::get('/blog', 'BlogController@index')->name('blog');
	Route::get('insert-blog','BlogController@get_insert')->name('insert-blog');
	Route::post('/create-blog', 'BlogController@insert')->name('storeblog');
	
	Route::get('/edit-blog/{id}','BlogController@getShow');
  Route::POST('/edit-blog/{id}','BlogController@edit')->name('editBlog');
  
 Route::post('/search-blog', 'BlogController@search')->name('searchBlog');
	
	Route::POST('delete-multiple-blog/{id}','BlogController@destroyBlog');
	
	 
	 Route::POST('delete-blog/{id}','BlogController@destroy');
	 
	 Route::POST('insert-menu-blog/{id}','BlogController@storeCheckbox');
	 Route::POST('remove-checkbox/{id}','BlogController@destroy_Checkbox');
	 
	/* HOLIDAYS ADMIN  STARTS HERE */
	
	Route::get('/holidays', 'HolidayAdminController@index')->name('holidays');
	Route::get('insert-holiday','HolidayAdminController@get_insert')->name('insert-holiday');
	Route::post('/create-holiday', 'HolidayAdminController@insert')->name('storeholiday');
	
	Route::get('/edit-holiday/{id}','HolidayAdminController@getShow');
  Route::POST('/edit-holiday/{id}','HolidayAdminController@edit')->name('editHoliday');
  
 Route::post('/search-holiday', 'HolidayAdminController@search')->name('searchHoliday');
	
	Route::POST('delete-multiple-holiday/{id}','HolidayAdminController@destroyBlog');
	
	 
	 Route::POST('delete-holiday/{id}','HolidayAdminController@destroy');


/* CREATING DISPLAY REPORT AND USER LOGIN DETAILS */

Route::get('/reports', 'ReportController@index')->name('reports');

Route::get('/users-login', 'LoginUsersController@index')->name('user-login');
Route::POST('/login-details-location', 'LoginUsersController@login_details_pupup')->name('login-details-location');
Route::POST('/login-details-refresh', 'LoginUsersController@login_details_refresh')->name('login-details-refresh');


