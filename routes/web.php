<?php
Route::get('/', function () {
    return redirect('/home');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.email');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'UserActionsController');
    Route::resource('expenses_categories', 'ExpensesCategoriesController');
    Route::post('expenses_categories_mass_destroy', ['uses' => 'ExpensesCategoriesController@massDestroy', 'as' => 'expenses_categories.mass_destroy']);
    Route::resource('expenses', 'ExpensesController');
    Route::post('expenses_mass_destroy', ['uses' => 'ExpensesController@massDestroy', 'as' => 'expenses.mass_destroy']);
    Route::resource('incomes_categories', 'IncomesCategoriesController');
    Route::post('incomes_categories_mass_destroy', ['uses' => 'IncomesCategoriesController@massDestroy', 'as' => 'incomes_categories.mass_destroy']);
    Route::resource('incomes', 'IncomesController');
    Route::post('incomes_mass_destroy', ['uses' => 'IncomesController@massDestroy', 'as' => 'incomes.mass_destroy']);
    Route::resource('monthly_reports', 'MonthlyReportsController');

});
