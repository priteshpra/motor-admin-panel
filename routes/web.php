<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::post('/', 'IndexController@index')->name('home');

Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => true, // Password Reset Routes...
  'verify' => true, // Email Verification Routes...
]);

Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');
Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);

Route::middleware(['auth', 'twofactor'])->prefix('admin')->group(function () {
  // Test Route
  Route::get('test', 'Admin\TestController@test')->name('admin.test');

  // For Dashboard
  Route::get('dashboard', 'Admin\HomeController@index')->name('admin.dashboard');
Route::get('setting', 'Admin\SettingsController@index')->name('admin.setting.index');

  // For Module
  Route::get('modules', 'Admin\ModuleController@index')->name('admin.modules.index');
  Route::get('modules/add', 'Admin\ModuleController@create')->name('admin.modules.create');
  Route::get('modules/edit/{encrypted_id}', 'Admin\ModuleController@edit')->name('admin.modules.edit');
  Route::get('modules/show/{encrypted_id}', 'Admin\ModuleController@show')->name('admin.modules.show');
  Route::post('modules/store', 'Admin\ModuleController@store')->name('admin.modules.store');
  Route::post('modules/update', 'Admin\ModuleController@update')->name('admin.modules.update');
  Route::get('modules/ajax', 'Admin\ModuleController@ajax')->name('admin.modules.ajax');
  Route::post('modules/delete', 'Admin\ModuleController@delete')->name('admin.modules.delete');

  // For Users
  Route::get('users', 'Admin\UserController@index')->name('admin.users.index');
  Route::get('users/add', 'Admin\UserController@create')->name('admin.users.create');
  Route::get('users/edit/{encrypted_id}', 'Admin\UserController@edit')->name('admin.users.edit');
  Route::get('users/show/{encrypted_id}', 'Admin\UserController@show')->name('admin.users.show');
  Route::post('users/store', 'Admin\UserController@store')->name('admin.users.store');
  Route::post('users/update', 'Admin\UserController@update')->name('admin.users.update');
  Route::get('users/ajax', 'Admin\UserController@ajax')->name('admin.users.ajax');
  Route::post('users/delete', 'Admin\UserController@delete')->name('admin.users.delete');

  // For Roles
  Route::get('roles', 'Admin\RoleController@index')->name('admin.roles.index');
  Route::get('roles/add', 'Admin\RoleController@create')->name('admin.roles.create');
  Route::get('roles/edit', 'Admin\RoleController@edit')->name('admin.roles.edit');
  Route::get('roles/show/{encrypted_id}', 'Admin\RoleController@show')->name('admin.roles.show');
  Route::post('roles/store', 'Admin\RoleController@store')->name('admin.roles.store');
  Route::post('roles/update', 'Admin\RoleController@update')->name('admin.roles.update');
  Route::get('roles/ajax', 'Admin\RoleController@ajax')->name('admin.roles.ajax');
  Route::post('roles/delete', 'Admin\RoleController@delete')->name('admin.roles.delete');

  // For Settings
  Route::get('settings', 'Admin\SettingController@index')->name('admin.settings.index');
  Route::get('settings/add', 'Admin\SettingController@create')->name('admin.settings.create');
  Route::get('settings/edit/{encrypted_id}', 'Admin\SettingController@edit')->name('admin.settings.edit');
  Route::get('settings/show/{encrypted_id}', 'Admin\SettingController@show')->name('admin.settings.show');
  Route::get('settings/edit_profile', 'Admin\SettingController@edit_profile')->name('admin.settings.edit_profile');
  Route::post('settings/store', 'Admin\SettingController@store')->name('admin.settings.store');
  Route::post('settings/update', 'Admin\SettingController@update')->name('admin.settings.update');
  Route::get('settings/ajax', 'Admin\SettingController@ajax')->name('admin.settings.ajax');
  Route::post('settings/delete', 'Admin\SettingController@delete')->name('admin.settings.delete');

  // For Pages
  Route::get('pages', 'Admin\PageController@index')->name('admin.pages.index');
  Route::get('pages/add', 'Admin\PageController@create')->name('admin.pages.create');
  Route::get('pages/edit/{encrypted_id}', 'Admin\PageController@edit')->name('admin.pages.edit');
  Route::get('pages/show/{encrypted_id}', 'Admin\PageController@show')->name('admin.pages.show');
  Route::post('pages/store', 'Admin\PageController@store')->name('admin.pages.store');
  Route::post('pages/update', 'Admin\PageController@update')->name('admin.pages.update');
  Route::get('pages/ajax', 'Admin\PageController@ajax')->name('admin.pages.ajax');
  Route::post('pages/delete', 'Admin\PageController@delete')->name('admin.pages.delete');

  // For Category
  Route::get('categorys', 'Admin\CategoryController@index')->name('admin.categorys.index');
  Route::get('categorys/add', 'Admin\CategoryController@create')->name('admin.categorys.create');
  Route::get('categorys/edit/{encrypted_id}', 'Admin\CategoryController@edit')->name('admin.categorys.edit');
  Route::get('categorys/show/{encrypted_id}', 'Admin\CategoryController@show')->name('admin.categorys.show');
  Route::post('categorys/store', 'Admin\CategoryController@store')->name('admin.categorys.store');
  Route::post('categorys/update', 'Admin\CategoryController@update')->name('admin.categorys.update');
  Route::get('categorys/ajax', 'Admin\CategoryController@ajax')->name('admin.categorys.ajax');
  Route::post('categorys/delete', 'Admin\CategoryController@delete')->name('admin.categorys.delete');

  // For Sub Category
  Route::get('subcategorys', 'Admin\SubcategoryController@index')->name('admin.subcategorys.index');
  Route::get('subcategorys/add', 'Admin\SubcategoryController@create')->name('admin.subcategorys.create');
  Route::get('subcategorys/edit/{encrypted_id}', 'Admin\SubcategoryController@edit')->name('admin.subcategorys.edit');
  Route::get('subcategorys/show/{encrypted_id}', 'Admin\SubcategoryController@show')->name('admin.subcategorys.show');
  Route::post('subcategorys/store', 'Admin\SubcategoryController@store')->name('admin.subcategorys.store');
  Route::post('subcategorys/update', 'Admin\SubcategoryController@update')->name('admin.subcategorys.update');
  Route::get('subcategorys/ajax', 'Admin\SubcategoryController@ajax')->name('admin.subcategorys.ajax');
  Route::post('subcategorys/delete', 'Admin\SubcategoryController@delete')->name('admin.subcategorys.delete');

  // For Coordinate
  Route::get('coordinate', 'Admin\CoordinateController@index')->name('admin.coordinate.index');
  Route::get('coordinate/add', 'Admin\CoordinateController@create')->name('admin.coordinate.create');
  Route::get('coordinate/edit/{encrypted_id}', 'Admin\CoordinateController@edit')->name('admin.coordinate.edit');
  Route::get('coordinate/show/{encrypted_id}', 'Admin\CoordinateController@show')->name('admin.coordinate.show');
  Route::post('coordinate/store', 'Admin\CoordinateController@store')->name('admin.coordinate.store');
  Route::post('coordinate/update', 'Admin\CoordinateController@update')->name('admin.coordinate.update');
  Route::get('coordinate/ajax', 'Admin\CoordinateController@ajax')->name('admin.coordinate.ajax');
  Route::post('coordinate/delete', 'Admin\CoordinateController@delete')->name('admin.coordinate.delete');
});
