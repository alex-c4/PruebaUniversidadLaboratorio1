<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\State;
use App\City;
use App\Newsletter;
use Auth;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;

class SettingsController extends Controller
{

    protected function validator(array $data)
    {
        $messages = [
            'numeric' => 'The field is required.',
            'required' => 'The field is required.'
        ];

        return Validator::make($data, [
            'name' => 'required|string|max:20',
            'lastName' => 'required|string|max:20',
            'birthday' => 'required|date',
            'country_id' => 'required|numeric',
            'state_id' => 'required|numeric'
        ], $messages);
    }


    public function edit(){

        $user_id = auth()->user()->id;

        // lectura de la imagenes avatar
        $dir = opendir('img/avatars/');
        $files = [];
        $i = 0;
        while ($archivo = readdir($dir)){
            if(!is_dir($archivo)){
                $files[$i] = ($archivo);
                $i++;
            }
        } 

        $user = auth()->user();

        $countries = Country::all();

        $states = State::where('country_id', $user->country_id)->get();

        $cities= City::where('state_id', $user->state_id)->get();

        $newsletters = Newsletter::all();
        
        $newsletters_users = DB::table("newsletters_users")
            ->where("user_id", $user_id)->select()->get();

        return view('../../auth.settings', compact('countries', 'states', 'cities', 'user', 'files', 'newsletters', 'newsletters_users'));
        // $user = User::where('id', request()->email)->get();

    }

    public function update(){

        
        $user_id = auth()->user()->id;

        $this->validator(request()->all())->validate();

        $user = User::find($user_id);
        $user->name = request()->name;
        $user->lastName = request()->lastName;
        $user->gender = request()->genderOptions;
        $user->birthday = request()->birthday;
        $user->phone = request()->phone1;
        $user->phone2 = request()->phone2;
        $user->country_id = request()->country_id;
        $user->state_id = request()->state_id;
        $user->city_id = request()->city_id;
        $user->direction = request()->direction;
        $user->avatarName = request()->hAvatarName;

        // register newsletter
        $newsletters = Newsletter::all();
        
        $IDs = array();
        foreach($newsletters as $newsletter){
            if(request($newsletter->checkId) != null){
                array_push($IDs, $newsletter->id);
            }
        }
        
        $newsletters_users = DB::table("newsletters_users")
            ->where("user_id", $user_id)->delete();

        if(array_count_values($IDs) > 0){
            // Newsletter::where("user_id", $user_id)
            // ->delete();

            foreach($IDs as $id){
                DB::table('newsletters_users')
                    ->insert([
                        'user_id' => $user_id,
                        'newsletter_id' => $id
                    ]);
            }
        }
        
        $user->save();
        
        return view('/auth.successEdit');

    }

}
