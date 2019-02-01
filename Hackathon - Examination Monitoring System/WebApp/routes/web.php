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

/*******************************************
 *          Index Page
 *******************************************/

Route::get('/', function () {
    return view('pages.login');
})->name('index');


Route::group(['prefix'=>'backend'],function()
{

    Route::get('/cityData',[
        'uses' => 'ExamController@getCityData',
        'as' => 'cityData'
    ]);


    Route::any('/facultyActivity',['uses' => 'DataController@returnFacultyInfoAndroid']);
});



Route::group(['prefix'=>'pages'],function()
{

    Route::get('/facultyStatus/{examId}',[
        'uses' => 'PageController@getFacultyStatusPage',
        'as' => 'facultyStatus'
    ]);

    Route::get('/examCenter',[
        'uses' => 'PageController@getExamCenterPage',
        'as' => 'examCenterPage'
    ]);

    Route::get('/allocateStudent',[
        'uses' => 'PageController@getAllocateStudentPage',
        'as' => 'allocateStudentPage'
    ]);

    Route::get('/addInstitute',[
        'uses' => 'PageController@getAddInstitute',
        'as' => 'addInstitute'
    ]);

    Route::get('/index',[
        'uses' => 'PageController@getIndexPage',
        'as' => 'indexPage'
    ]);

    Route::get('/singleExamInfo/{examId}',[
        'uses' => 'PageController@getSingleExamInfo',
        'as' => 'singleExamInfo'
    ]);

    Route::get('/paymentStatus/{examId}',[
        'uses' => 'PageController@getPaymentPage',
        'as' => 'paymentPage'
    ]);

});





/*******************************************
 *          Authentication Routes
 *******************************************/

Route::group(['prefix'=>'auth'],function()
{

    Route::post('/login',[
        'uses' => 'DataController@deanLogin',
        'as' => 'login'
    ]);

//    Route::post('/androidLogin',['uses' => 'DataController@deanAndroidLogin']);

    Route::post('/register',[
        'uses' => 'DataController@deanRegister',
        'as' => 'register'
    ]);

    Route::get('/password',[
        'uses' => 'DataController@password',
        'as' => 'pass'
    ]);

    Route::post('/universityLogin',[
        'uses' => 'DataController@universityLogin',
        'as' => 'universityLogin'
    ]);


});

/*******************************************
 *          Location Routes
 *******************************************/

Route::group(['prefix'=>'location'],function()
{

  Route::any('/getPlace',['uses' => 'DataController@getCoordinates']);

});

/*******************************************
 *          Allocation Routes
 *******************************************/

Route::group(['prefix'=>'allocate'],function()
{
    Route::any('/student',['uses' => 'AllocationController@startAllocation','as' => 'startAllocation']);
    Route::any('/faculties',['uses' => 'AllocationController@startFacultyAllocation','as' => 'facultyAllocation']);
    Route::get('/getAllocatedStudent/{examId}',['uses' => 'PageController@getAllocatedStudent','as' => 'getAllocatedStudent']);
    Route::get('/getAllocatedFaculty/{examId}',['uses' => 'PageController@getAllocatedFaculty','as' => 'getAllocatedFaculty']);

});


/*******************************************
 *          Exam Center Routes
 *******************************************/

Route::group(['prefix'=>'exams'],function()
{
    Route::get('/selection/',['uses' => 'DataController@examCenterSelection','as' => 'examCenter']);

});

Route::any('/deanAadhar/verify',['uses' => 'DataController@verifyDean','as' => 'verifyDean']);
Route::any('/makePayment/{examId}',['uses' => 'DataController@makePayment','as' => 'makePayment']);
Route::get('/pendingPayment/{id}/{exam}',['uses' => 'DataController@pendingPayment','as' => 'pendingPayment']);
    Route::any('/androidPayment',['uses' => 'DataController@androidPayment','as' => 'androidPayment']);