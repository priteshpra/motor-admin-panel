<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {

    // Preparing count for Dashboard Array
    $users = User::count();
    $calc = 0;
    $view = 0;
    $add = 0;
    $setting = 0;

    // Preparing Dashboard card Array.
    $dashboard_cards = [
    //   ['Users', $users, Route('admin.users.index'), 'fa fa-dashboard'],
      ['Calculate Data', $calc, Route('admin.users.index'), 'fa fa-calendar'],
      ['View Data', $view, Route('admin.users.index'), 'fa fa-dashboard'],
      ['Add Data', $add, Route('admin.users.index'), 'fa fa-dashboard'],
      ['Settings', $setting, Route('admin.setting.index'), 'fa fa-dashboard'],
      // ['News', $news, 'news.index'],
    ];
    $module_names = [
      'singular' => 'dashboard',
      'plural' => 'dashboard',
    ];
    return kview('home', compact('dashboard_cards', 'module_names'));
  }
}
