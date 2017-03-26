<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	// Website routes...
	Route::get('/', ['as' => 'show.website', 'uses' => 'WebsiteController@show']);
	Route::get('/services', ['as' => 'show.services', 'uses' => 'WebsiteController@getServices']);
	Route::get('/service/{slug}', ['as' => 'show.service.recommendations', 'uses' => 'WebsiteController@getServiceRecommendations']);
	Route::get('/service/{slug}/{id}', ['as' => 'show.recommendation', 'uses' => 'WebsiteController@getRecommendation']);

	// Authentication routes...
	Route::get('/login', ['as' => 'show.login', 'uses' => 'Auth\AuthController@getLogin']);
	Route::post('/login', ['as' => 'post.login', 'uses' => 'Auth\AuthController@postLogin']);
	Route::get('/register', ['as' => 'show.register', 'uses' => 'Auth\AuthController@getRegister']);
	Route::post('/register', ['as' => 'post.register', 'uses' => 'Auth\AuthController@postRegister']);
	Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

	// Password Reset routes...
	Route::get('/password/email', ['as' => 'forgot.password', 'uses' => 'Auth\PasswordController@getEmail']);
	Route::post('/password/email', ['as' => 'post.forgot.password', 'uses' => 'Auth\PasswordController@postEmail']);
	Route::get('/password/reset/{token}', ['as' => 'reset.password', 'uses' => 'Auth\PasswordController@getReset']);
	Route::post('/password/reset', ['as' => 'post.reset.password', 'uses' => 'Auth\PasswordController@postReset']);
	Route::get('/verify/email/{token}', ['as' => 'verify.email', 'uses' => 'UserController@verifyUserEmail']);

	// App API routes...
	Route::group(['prefix' => 'api'], function () {
		Route::post('/doc/create/{module_name}', ['as' => 'api.create.doc', 'uses' => 'FormActions@save']);
		Route::get('/doc/{module_name}/{id}', ['as' => 'api.get.doc', 'uses' => 'FormActions@show']);
		Route::post('/doc/update/{module_name}/{id}', ['as' => 'api.update.doc', 'uses' => 'FormActions@save']);
		Route::get('/doc/delete/{module_name}/{id}', ['as' => 'api.delete.doc', 'uses' => 'FormActions@delete']);
	});

	// Request that requires authorization...
	Route::group(['middleware' => 'auth'], function () {

		// User routes...
		Route::get('/dashboard', ['as' => 'show.user.dashboard', 'uses' => 'WebsiteController@getDashboard']);
		Route::get('/add-recommendation', ['as' => 'add.recommendation', 'uses' => 'WebsiteController@addRecommendation']);
		Route::post('/add-recommendation', ['as' => 'add.recommendation', 'uses' => 'WebsiteController@postRecommendation']);
		Route::get('/add-request', ['as' => 'add.request', 'uses' => 'WebsiteController@addRequest']);
		Route::post('/add-request', ['as' => 'add.request', 'uses' => 'WebsiteController@postRequest']);

		// App routes...
		Route::get('/app', ['as' => 'show.app', 'uses' => 'AppController@show_home']);

		// App Home page module routes...
		Route::get('/app/dashboard', ['as' => 'show.app.dashboard', 'uses' => 'DashboardController@show']);
		Route::get('/app/modules', ['as' => 'show.app.modules', 'uses' => 'ModuleController@show']);
		Route::get('/app/reports', ['as' => 'show.app.reports', 'uses' => 'ReportsController@show']);
		Route::get('/app/activities', ['as' => 'show.app.activities', 'uses' => 'ActivityController@show']);
		Route::get('/app/settings', ['as' => 'show.app.settings', 'uses' => 'SettingsController@show']);
		Route::post('/app/settings', ['as' => 'save.app.settings', 'uses' => 'SettingsController@save']);

		// List View...
		Route::get('/list/{module_name}', ['as' => 'show.list', 'uses' => 'ListViewController@showList']);

		// Report View...
		Route::get('/app/standard_report/{report_name}', ['as' => 'show.standard.report', 'uses' => 'ReportsController@showReport']);
		Route::get('/app/query_report/{report_name}', ['as' => 'show.query.report', 'uses' => 'ReportsController@showReport']);

		// Autocomplete data...
		Route::get('/getAutocomplete', ['as' => 'get.autocomplete', 'uses' => 'AutocompleteController@getAutocomplete']);

		// App Form/Module routes...
		Route::get('/form/{module_name}', ['as' => 'show.doc', 'uses' => 'FormActions@show']);
		Route::post('/form/{module_name}', ['as' => 'create.doc', 'uses' => 'FormActions@save']);
		Route::get('/form/{module_name}/{id}', ['as' => 'show.doc', 'uses' => 'FormActions@show']);
		Route::get('/form/{module_name}/draft/{id}', ['as' => 'copy.doc', 'uses' => 'FormActions@copy']);
		Route::post('/form/{module_name}/{id}', ['as' => 'update.doc', 'uses' => 'FormActions@save']);
		Route::get('/form/{module_name}/delete/{id}', ['as' => 'delete.doc', 'uses' => 'FormActions@delete']);
	});
});