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
Auth::routes();

  Route::get('/','AlarmController@index');
  
   
 //Route::get('/','LoginUsersController@login-details-refresh');

//login-details-refresh


Route::get('login', function () {
    return view('auth.login');
})->name('login');




Route::post('login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        return redirect()->intended('admin/dashboard'); // Redirect to dashboard or intended URL
    }

    return back()->withErrors([
        'email' => 'Invalid credentials',
    ])->withInput();
})->name('login.post');






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
 
/*DELETE USER LOGIN */
 Route::get('delete_admin/{id}','AdminController@destroy');


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
 
	
	
	/* ALARM CONTROLLER */
Route::get('/view-alarm/{id}','AlarmController@getShow')->name('view');
 Route::get('/alarm', 'AlarmController@index')->name('alarm'); 
 
  
 
   Route::POST('/setAlarm','AlarmController@setInsertAlarm')->name('setAlarm');  
Route::POST('/setAlarm-time','AlarmController@setAlarmTime')->name('setAlarm_Time');
	
	
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
	
	Route::post('/create-utc-time','WorldClockController@insert')->name('InsertWorldClock');
	
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





