<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Form;
use App\Formtwo;
use App\User;

class MainController extends Controller
{

    public function config()
    {
      return view('pages.config');
    }
    public function index()
    {
      return view('pages.main');
    }
  
  	public function docs()
    {
      return view('pages.docs');
    }
  
  	public function newinfo()
    {
      return view('pages.newinfo');
    }
  	public function rasp()
    {
      return view('pages.rasp');
    }
  	public function in()
    {
      return view('pages.googleedca492c694e8d2c');
    }
  
  	public function vsephoto()
    {
      return view('pages.vsephoto');
    }
    
    public function scroll()
    {
      $user = Auth::user();
      if($user === null){
        session()->flash('flash_message', 'ОЙ АЙ ОЙ!');
        return redirect('/');
      }
      if($user -> role_id !== 1){
        session()->flash('flash_message', 'ОЙ АЙ ОЙ!');
        return redirect('/');
      }
      if($user -> role_id === 1){
        $users = User::latest()->get();
        $forms = Form::latest()->get();
        $formtwos = Formtwo::latest()->get();
      }
      return view('pages.scrol18923net', compact('forms','formtwos','users'));
    }
    

      public function anketa()
      {
        
      return view('pages.anketa');
      }
  
  	public function photovideo()
      {
        
      return view('pages.photovideo');
      }
  	public function ssoboy()
      {
        
      return view('pages.ssoboy');
      }
      
      public function uchat()
      {
        
      return view('pages.uchat');
      }
      
     
      public function form1(Request $request)
      {
          $user = Auth::user();
          $project = new Form;
          $project->user_id =  $user->id;
          $project->name = $request->name;
          $project->date = $request->date;
          $project->address = $request->address;
          $project->place = $request->place;
          $project->exp = $request->exp;
          $project->wins = $request->wins;
          $project->letter = $request->letter;
          $project->tel = $request->tel;
          $project->email = $request->email;
          $project->birthplace = $request->birthplace;

          if ($request->has('app')) {
            $fileName = $request->file('app')->getClientOriginalName();
            $path = $request->file('app')->move(public_path('/storage'), $fileName);
            $project->app = $fileName;
          }
          $project->save();
          // Mail::to($user->email)->send(new DraftProject($project->id));


    //    \Mail::send('email.mail1', $data, function($message) use ($data)
    // {
    //     $mail_admin = env('MAIL_ADMIN_form1');
    //     $message->from($data['email'],$data['name'],$data['date'],$data['birthplace'],$data['address'],$data['place'],$data['exp'],$data['wins'],$data['letter'],$data['tel'],$data['app']);
    //     $message->to($mail_admin, 'For Admin')->subject('Message from site');
    //  });
     
     session()->flash('flash_message', 'Заявка успешно отправлена !');
     
     return redirect('/home');
    }
    
    public function form2(Request $request)
      {
        $user = Auth::user();
          $project = new Formtwo;
          $project->user_id =  $user->id;
          $project->fio = $request->fio;
          $project->nameproject = $request->nameproject;
          $project->celi = $request->celi;
          $project->aktual = $request->aktual;
          $project->opis = $request->opis;
          $project->plan = $request->plan;
          $project->team = $request->team;
          $project->email = $request->email;

          if ($request->has('priloj')) {
            $fileName = $request->file('priloj')->getClientOriginalName();
            $path = $request->file('priloj')->move(public_path('/storage'), $fileName);
            $project->priloj = $fileName;
          }
          $project->save();
          
    $data= array(
      'email' => request('email'),    
        'fio' => request('fio'), 
        'nameproject' => request('nameproject'), 
        'celi' => request('celi'), 
        'aktual' => request('aktual'), 
        'opis' => request('opis'), 
        'plan' => request('plan'),
        'team' => request('team'), 
        'priloj' => request('priloj'),
      );
    //    \Mail::send('email.mail2', $data, function($message1) use ($data)
       
    // {
    //     $mail_admin = env('MAIL_ADMIN_form2');
    //     $message1->from($data['email'],$data['fio'],$data['nameproject'],$data['celi'],$data['aktual'],$data['opis'],$data['plan'],$data['team'],$data['priloj']);
    //     $message1->to($mail_admin, 'For Admin')->subject('Message from site');
    //  });
     session()->flash('flash_message', 'Заявка успешно отправлена !');
     return redirect('/home');
    }
}
