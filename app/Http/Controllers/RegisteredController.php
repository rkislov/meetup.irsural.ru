<?php

namespace App\Http\Controllers;


use App\Registration;
use Illuminate\Http\Request;

class RegisteredController extends Controller
{
    public function execute()
    {
        if(view()->exists('admin.registered')){
            $registered = Registration::all();
            $data = [
                'title'=>'Зарегистрированные',
                'registered'=>$registered,
            ];
            return view('admin.registered',$data);
        }
        abort (404);
    }
}
