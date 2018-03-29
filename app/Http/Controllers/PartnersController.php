<?php

namespace App\Http\Controllers;


use App\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    public function execute()
    {
        if(view()->exists('admin.partners')){
            $pages = Partner::with('user')->get();
            $data = [
                'title'=>'Партнеры',
                'partners'=>$pages,
            ];
            return view('admin.partners',$data);
        }
        abort (404);
    }
}
