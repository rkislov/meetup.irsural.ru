<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Registration;
use Illuminate\Http\Request;
use App\Page;
use App\Service;
use App\Portfolio;
use App\People;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class IndexController extends Controller
{
   public function execute(Request $request)
   {
       if($request->isMethod('post')) {

           $messages = [
               'required' => "Поле :attribute обязательно к заполнению",
               'email' => "Поле :attribute должно соответствовать email адресу",
           ];

           $this->validate($request, [
               'name' => 'required|min:2|max:255',
               'organisation' => 'required|min:2|max:255',
               'email' => 'required|email',
           ], $messages);

           $data = $request->except('_token');

           $registration = new Registration();
           $registration->fill($data);
           $registration->save();
           $result = Mail::send('site.email', ['data' => $data], function ($message) use ($data){
               $mail_admin = env('MAIL_ADMIN');

               $message->from($data['email'], $data['name']);
               $message->to($mail_admin)->subject('Регистрация на meetUp');


           });
           if ($result) {
               return redirect()->route('home')->with('status', 'Данные о регистрации отправленны организаторам');
           }

       }

       $pages = Page::all();
       $portfolios = Portfolio::all();
       $services = Service::all();
       $peoples = People::all();
       $partners = Partner::all();


       $menu= array();

       foreach ($pages as $page)
       {
            $item = array('title'=> $page->name,'alias'=> $page->alias);
            array_push($menu,$item);
       }
       $item = array('title'=> 'Стенды','alias'=>'services');
       array_push($menu,$item);
       $item = array('title'=> 'Доклады','alias'=>'portfolio');
       array_push($menu,$item);
       $item = array('title'=> 'Партнеры','alias'=>'partners');
       array_push($menu,$item);
       $item = array('title'=> 'Люди','alias'=>'team');
       array_push($menu,$item);
       $item = array('title'=> 'Регистрация','alias'=>'contact');
       array_push($menu,$item);

       $tags=DB::table('portfolios')->distinct()->pluck('filter');


       return view('site.index',[
           'menu'=>$menu,
           'pages'=>$pages,
           'services'=>$services,
           'portfolios'=>$portfolios,
           'peoples'=>$peoples,
           'tags'=>$tags,
           'partners'=>$partners,
       ]);
   }
}
