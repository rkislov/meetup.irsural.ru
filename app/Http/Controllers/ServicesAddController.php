<?php

namespace App\Http\Controllers;



use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ServicesAddController extends Controller
{
    public function execute(Request $request)
    {
        if($request->isMethod('post')){

            $input= $request->except('_token');

            $messages = [
                'required'=>'Поле :attribute обязателно к заполнению',
                'unique'=>'Поле :attribute должно быть уникальным',
            ];

            $validator = Validator::make($input,[
                'name'=> 'required|max:255',
                'text'=>'required',
                'icon'=>'required',

            ], $messages);
            if($validator->fails()){
                return redirect()->route('servicesAdd')->withErrors($validator)->with($input);
            }

            $input['user_id']=Auth::user()->id;
            $portfolio = new Service();
            $portfolio->fill($input);

            if($portfolio->save()){
                return redirect('admin')->with('status','Доклад добавленна');
            }


        }


        if(view()->exists('admin.services_add'))
        {
            $data = [
                'title'=> 'Новый стенд',
            ];
            return view('admin.services_add',$data);
        }
    }
}
