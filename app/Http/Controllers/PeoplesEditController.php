<?php

namespace App\Http\Controllers;


use App\People;
use Illuminate\Http\Request;
use Validator;

class PeoplesEditController extends Controller
{
    public function execute(People $people,Request $request)
    {

        if($request->isMethod('delete')){
            $people->delete();
            return redirect('admin')->with('status','Страница удалена');
        }
        if($request->isMethod('post')){
            $input=$request->except('_token');

            $validator = Validator::make($input,[
                'name'=>'required|max:255',
                'position'=>'required|max:255',
                'text'=>'required',
            ]);

            if($validator->fails()){
                return redirect()->route('peoplesEdit',['people'=>$input['id']])->withErrors($validator);
            }

            if($request->hasFile('images')){
                $file= $request->file('images');
                $file->move(public_path().'/img',$file->getClientOriginalName());
                $input['images'] = $file->getClientOriginalName();
            }
            else {
                $input['images'] = $input['old_images'];
            }

            unset($input['old_images']);

            $people->fill($input);

            if($people->update()){
                return redirect()->route('admin')->with('status','Информация обновлена');
            }
        }


        $old = $people->toArray();
        if (view()->exists('admin.peoples_edit')){
            $data = [
                'title' => 'Редактирование данные человека - '.$old['name'],
                'data'=> $old,
            ];
            return view('admin.peoples_edit',$data);
        }
    }
}
