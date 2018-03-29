<?php

namespace App\Http\Controllers;


use App\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class PeoplesAddController extends Controller
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
                'position'=>'required|max:255',
                'text'=>'required',
            ], $messages);
            if($validator->fails()){
                return redirect()->route('peoplesAdd')->withErrors($validator)->with($input);
            }


            if($request->hasFile('images')){
                $file=$request->file('images');

                $input['images']=$file->getClientOriginalName();
                $file->move(public_path().'/img',$input['images']);
            }
            $input['user_id']= Auth::user()->id;
            $people = new People();
            $people->fill($input);

            if($people->save()){
                return redirect('admin')->with('status','Страница добавленна');
            }


        }


        if(view()->exists('admin.peoples_add'))
        {
            $data = [
                'title'=> 'Добавление человека',
            ];
            return view('admin.peoples_add',$data);
        }
    }
}
