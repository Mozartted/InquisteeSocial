<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index(){
      //returning all notifications.
      return view('notification.index');
    }
}
