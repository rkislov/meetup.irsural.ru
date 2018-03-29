<?php

namespace App\Http\Controllers;


use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class PartnersAddController extends Controller
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
                'href'=>'required|max:255',

            ], $messages);
            if($validator->fails()){
                return redirect()->route('partnersAdd')->withErrors($validator)->with($input);
            }


            if($request->hasFile('images')){
                $file=$request->file('images');

                $input['images']=$file->getClientOriginalName();
                $file->move(public_path().'/img',$input['images']);
            }
            $input['user_id']=Auth::user()->id;
            $partner = new Partner();
            $partner->fill($input);

            if($partner->save()){
                return redirect('admin')->with('status','Страница добавленна');
            }


        }


        if(view()->exists('admin.partners_add'))
        {
            $data = [
                'title'=> 'Новая страница',
            ];
            return view('admin.partners_add',$data);
        }
    }
}
