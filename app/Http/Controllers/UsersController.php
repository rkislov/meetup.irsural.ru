<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class UsersController extends Controller
{
    public function index()
    {
        if(view()->exists('admin.users')){
            $users = User::all();
            $data = [
                'title'=>'Пользователи',
                'users'=>$users,
            ];
            return view('admin.users',$data);
        }
        abort (404);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')){

            $input= $request->except('_token');

            $messages = [
                'required'=>'Поле :attribute обязателно к заполнению',
                'unique'=>'Поле :attribute должно быть уникальным',
            ];

            $validator = Validator::make($input,[
                'name'=> 'required|max:255',
                'email'=> 'required|email|unique:users',
                'password'=> 'required|min:5',


            ], $messages);
            if($validator->fails()){
                return redirect()->route('usersAdd')->withErrors($validator)->with($input);
            }

            $input['password']=Hash::make($input['password']);

            $user = new User();
            $user->fill($input);

            if($user->save()){
                return redirect('admin')->with('status','Пользователь добавлен');
            }


        }


        if(view()->exists('admin.users_add'))
        {
            $data = [
                'title'=> 'Новый пользователь',
            ];
            return view('admin.users_add',$data);
        }
    }

    public function edit(User $user,Request $request)
    {
        if($request->isMethod('delete')){
            $user->delete();
            return redirect('admin')->with('status','Пользователь удален');
        }
        $oldUser = $user;
        if($request->isMethod('post')){
            $input=$request->except('_token');

            if($input['password'] != null) {
                $validator = Validator::make($input, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|unique:users,email,'.$input['id'],
                    'password' => 'required|min:5|confirmed',
                ]);
            } else {
                $validator = Validator::make($input, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|unique:users,email,'.$input['id'],

                ]);
            }

            if($validator->fails()){
                return redirect()->route('usersEdit',['user'=>$input['id']])->withErrors($validator);
            }


            if($input['password'] != null) {
                $user->update([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => Hash::make($input['password']),
                    'role' => $input['role'],

                ]);
            } else {
                $user->update([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => $oldUser['password'],
                    'role' => $input['role'],

                ]);
            }
            if($user->update()){
                return redirect()->route('admin')->with('status','Данные пользователя обновлены');
            }
        }


        $old = $user->toArray();
        if (view()->exists('admin.users_edit')){
            $data = [
                'title' => 'Редактирование пользователя - '.$old['name'],
                'data'=> $old,
            ];
            return view('admin.users_edit',$data);
        }

    }
    public function changePassword(User $user,Request $request)
    {

        $oldUser = $user;
        if($request->isMethod('post')){
            $input=$request->except('_token');


                $validator = Validator::make($input, [

                    'password' => 'required|min:5|confirmed',
                ]);



            if($validator->fails()){
                return redirect()->route('usersChangePassword',['user'=>$input['id']])->withErrors($validator);
            }



                $user->update([
//                    'name' => $input['name'],
//                    'email' => $input['email'],
                    'password' => Hash::make($input['password']),
//                    'role' => $input['role'],

                ]);


            if($user->update()){
                return redirect()->route('admin')->with('status','Пароль обновлен');
            }
        }


        $old = $user->toArray();
        if (view()->exists('admin.users_changePassword')){
            $data = [
                'title' => 'Смена пароля пользователя - '.$old['name'],
                'data'=> $old,
            ];
            return view('admin.users_changePassword',$data);
        }

    }
}
