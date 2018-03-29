<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;
use Validator;

class PortfoliosEditController extends Controller
{
    public function execute(Portfolio $portfolio,Request $request)
    {
        if($request->isMethod('delete')){
            $portfolio->delete();
            return redirect('admin')->with('status','Страница удалена');
        }
        if($request->isMethod('post')){
            $input=$request->except('_token');

            $validator = Validator::make($input,[
               'name'=>'required|max:255',
               'filter'=>'required|max:255',

            ]);

            if($validator->fails()){
                return redirect()->route('portfoliosEdit',['portfolios'=>$input['id']])->withErrors($validator);
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

            $portfolio->fill($input);

            if($portfolio->update()){
                return redirect()->route('admin')->with('status','Страница обновлена');
            }
        }


        $old = $portfolio->toArray();
        if (view()->exists('admin.portfolios_edit')){
            $data = [
                'title' => 'Редактирование доклада - '.$old['name'],
                'data'=> $old,
            ];
            return view('admin.portfolios_edit',$data);
        }
    }
}
