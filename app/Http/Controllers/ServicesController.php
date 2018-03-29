<?php

namespace App\Http\Controllers;


use App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function execute()
    {
        if(view()->exists('admin.services')){
            $services = Service::with('user')->get();
            $data = [
                'title'=>'Стенды',
                'services'=>$services,
            ];
            return view('admin.services',$data);
        }
        abort (404);
    }
}
