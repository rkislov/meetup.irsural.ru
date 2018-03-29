<?php

namespace App\Http\Controllers;


use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class PortfoliosAddController extends Controller
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
                'filter'=>'required|max:255',

            ], $messages);
            if($validator->fails()){
                return redirect()->route('portfoliosAdd')->withErrors($validator)->with($input);
            }


            if($request->hasFile('images')){
                $file=$request->file('images');

                $input['images']=$file->getClientOriginalName();
                $file->move(public_path().'/img',$input['images']);
            }
            $input['user_id']= Auth::user()->id;
            $portfolio = new Portfolio();
            $portfolio->fill($input);

            if($portfolio->save()){
                return redirect('admin')->with('status','Доклад добавленна');
            }


        }


        if(view()->exists('admin.portfolios_add'))
        {
            $data = [
                'title'=> 'Новый доклад',
            ];
            return view('admin.portfolios_add',$data);
        }
    }
}
