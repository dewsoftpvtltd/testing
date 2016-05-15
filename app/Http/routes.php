<?php    
/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
*/
    Route::get('/home','HomeController@index')->name('home');

    Route::get('/signup', ['as' => 'auth.signup', 'uses'=> 'AuthController@getSignup', 'middleware'=>['guest']]);
    Route::post('/signup', ['uses'=> 'AuthController@postSignup', 'middleware'=>['guest']]);

    Route::get('/signin', ['as' => 'auth.signin', 'uses'=> 'AuthController@getSignin', 'middleware'=>['guest']]);
    Route::post('/signin', ['uses'=> 'AuthController@postSignin', 'middleware'=>['guest']]);
    Route::get('/signout', ['as' => 'auth.signout', 'uses'=> 'AuthController@getSignout']);
    
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

/*
|--------------------------------------------------------------------------
| Posts Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'posts','middleware'=>['auth']], function () {   
    Route::get('/',['as'=>'posts','uses'=>'PostController@getPosts']);
  });  
/*
|--------------------------------------------------------------------------
| School Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'school','middleware'=>['isSchool','auth']], function () {
    Route::get('/list',['as'=>'school.list', 'uses'=>'SchoolController@list']);
    
    Route::get('/add',['as'=>'school.add', 'uses'=>'SchoolController@add']);
    Route::post('/add',['as'=>'school.add.post','uses'=>'SchoolController@postAdd']);

    Route::get('/page/{school}',['as'=>'school.page', 'uses'=>'SchoolController@index','middleware'=>['schoolHasPaid']]);
    Route::get('/page/paymentsmade/{school}',['as'=>'school.payments', 'uses'=>'SchoolController@paymentsMade']);
 }); 
/*
|--------------------------------------------------------------------------
| Payment Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'school/payments','middleware'=>['auth']], function () {
        Route::get('/{packageid}/{school?}',['as'=>'school.payment', 'uses'=>'SchoolController@payment']);
        Route::post('/{packageid}/{school?}',['uses'=>'SchoolController@postPayment']);
  });
 /*
|--------------------------------------------------------------------------
| Package Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'packages','middleware'=>['auth']], function () {  
    Route::get('/medium/{school?}',['as'=>'packages.medium', 'uses'=>'PackageController@index']);
    Route::get('/low/{school?}',['as'=>'packages.low', 'uses'=>'PackageController@low']);
    Route::get('/high/{school?}',['as'=>'packages.high', 'uses'=>'PackageController@high']);
});
/*
|--------------------------------------------------------------------------
| Student School Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'school/students', 'middleware' => ['auth']], function () {
        Route::get('/showlist', ['as'=>'student.schools', 'uses' => 'SchoolController@show','middleware' => ['isIndividual']]);
        Route::get('/{school}', ['as'=>'school.students', 'uses' => 'SchoolController@students']);
});