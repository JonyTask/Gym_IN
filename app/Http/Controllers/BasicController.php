<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\gym;
use App\Models\message;
use App\Models\User;
use App\Models\fake;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class BasicController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        
        if($request->Chat_Gym != null){
        $user->Chat_Gym = $request->Chat_Gym;
        $user->save();
        }

        $UserName = $user->name;
        $UserAge = $user->age;
        $UserGender = $user->gender;
        $UserProtein = $user->protein;
        $UserMustle = $user->preMustle;
        $UserPR = $user->PR_TEXT;
        $UserGym = $user->Chat_Gym;


        $lines = array();
        if($UserGym != null){
          $lines = message::where('belongGym',$UserGym)->get();
        }

        if($UserAge == null){
            $UserAge = '未設定';
        }
        if($UserGender == null){
            $UserGender = '未設定';
        }
        if($UserProtein == null){
            $UserProtein = '未設定';
        }
        if($UserMustle == null){
            $UserMustle = '未設定';
        }
        if($UserPR == null){
            $UserPR = '未設定';
        }
        if($UserGym == null){
            $UserGym = '未設定';
        }
        $param = ['UserName'=>$UserName,
                  'UserAge'=>$UserAge,
                  'UserGender'=>$UserGender,
                  'UserProtein'=>$UserProtein,
                  'UserMustle'=>$UserMustle,
                  'UserPR'=>$UserPR,
                  'UserGym'=>$UserGym,
                  'lines'=>$lines
                  ];
        return view('Displayed.basic',$param);
    }

    public function Post(Request $request){
       $user = Auth::user();

        if($request->has('edit')){
          $user->age = $request->age;
          $user->gender = $request->gender;
          $user->protein = $request->protein;
          $user->preMustle = $request->preMustle;
          $user->PR_TEXT = $request->PR_TEXT;
          $user->save();

          $parameter=[
            'name'=>$user->name,
            'age'=>$user->age,
            'gender'=>$user->gender,
            'protein'=>$user->protein,
            'mustle'=>$user->preMustle,
            'PR'=>$user->PR_TEXT
          ];

          DB::update('update fakes set age=:age, gender=:gender, protein=:protein, mustle=:mustle, PR=:PR where name=:name',$parameter);
          return redirect('base');
        }elseif($request->has('search')){
          return redirect('base/search');
        }elseif($request->has('add')){
          if($user->Chat_Gym != null && $request->message != null){
            $message = new message();
            $message->name = $user->name;
            $message->message = $request->message;
            $message->belongGym = $user->Chat_Gym;
            $message->save();
                    
            return redirect('/base');
          }
        }elseif($request->has('UserProSearch')){
          return redirect('base/profile');
        }
    }

    public function Search(){
      $data_prefecture = $_GET['prefecture'];
      $data_city =$_GET['city'];
      $items = gym::where('prefecture', $data_prefecture)->where('city', $data_city)->get();
      return view('Displayed.search',['items'=>$items]);
    }

    public function Select_Chat_Gym(Request $request){
      return redirect('/base');
    }

    public function Profile(){
      $data_search_user = $_GET['UserPro'];
      $item=fake::where('name', $data_search_user)->first();
      
      return view('Displayed.profile',['item'=>$item]);
    }
}

