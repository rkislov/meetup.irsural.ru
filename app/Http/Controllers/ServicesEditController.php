<?php

namespace App\Http\Controllers;


use App\Service;
use Illuminate\Http\Request;
use Validator;

class ServicesEditController extends Controller
{
    public function execute(Service $service,Request $request)
    {
        if($request->isMethod('delete')){
            $service->delete();
            return redirect('admin')->with('status','Стенд удалена');
        }
        if($request->isMethod('post')){
            $input=$request->except('_token');

            $validator = Validator::make($input,[
                'name'=>'required|max:255',
                'icon'=>'required|max:255|unique:services,icon,'.$input['id'],
                'text'=>'required',
            ]);

            if($validator->fails()){
                return redirect()->route('servicesEdit',['service'=>$input['id']])->withErrors($validator);
            }


            $service->fill($input);

            if($service->update()){
                return redirect()->route('admin')->with('status','Стенд обновлена');
            }
        }


        $old = $service->toArray();

        if (view()->exists('admin.services_edit')){
            $data = [
                'title' => 'Редактирование стенда - '.$old['name'],
                'data'=> $old,
            ];
            return view('admin.services_edit',$data);
        }
    }
}
