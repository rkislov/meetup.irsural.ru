<?php

namespace App\Http\Controllers;

;

use App\People;
use Illuminate\Http\Request;

class PeoplesController extends Controller
{
    public function execute()
    {
        if(view()->exists('admin.peoples')){
            $peoples = People::with('user')->get();
            $data = [
                'title'=>'Люди',
                'peoples'=>$peoples,
            ];
            return view('admin.peoples',$data);
        }
        abort (404);
    }
}
