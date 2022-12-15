<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Password;

class ProfileController extends Controller
{

    public function viewProfile(){
        return view('profile.viewProfile');
    }

    public function editProfile(){
        return view('profile.editProfile');
    }

    public function updateProfile(Request $request){
        $id = Auth::user()->id;

        $request->validate([
            'username' => ['required', 'string', 'max:36'],
            'name' => ['required', 'string', 'max:128'],
            'surname' => ['required', 'string', 'max:128'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)]
        ]);

        User::where('id', $id)->update([
            'username' => $request->username,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'place' => $request->place,
            'school' => $request->school,
            'class' => $request->class
        ]);

        return redirect(route('viewProfile'))->with('message', '✅ Profils ir atjaunināts.');
    }

    public function editPassword(Request $request){
        return view('profile.editPassword', ['request' => $request]);
    }

    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => ['required', 'min:8'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $oldPasswordStatus = Hash::check($request->old_password, Auth::user()->password);

        if($oldPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect(route('viewProfile'))->with('message','✅ Parole ir nomainīta.');
        }
        else{
            return redirect()->back()->with('message','🚫 Vecā parole nav pareizi ievadīta.');
        }
    }

    public function deleteProfile(Request $request){

        $passwordStatus = Hash::check($request->password, Auth::user()->password);
        if($passwordStatus){
            $id = Auth::user()->id;

            User::destroy($id);
            return redirect(route('mainPage'))->with('message', '🥺 Profils ir dzēsts. Paldies, ka izmantojāt MateMīlu!');
        }

        return redirect()->back()->with('message', '🚫 Ievadītā parole nav pareiza.');
    }

    public function viewAllProfiles(){
        $profiles = User::latest()->paginate(50);

        return view('profile.allProfiles', compact('profiles'));
    }

    public function searchProfiles(Request $request){
        $profiles = User::where('username', 'like', '%' . request('username') . '%')
                    ->where('name', 'like', '%' . request('name') . '%')
                    ->where('surname', 'like', '%' . request('surname') . '%')
                    ->where('email', 'like', '%' . request('email') . '%')
                    ->where('place', 'like', '%' . request('place') . '%')
                    ->where('school', 'like', '%' . request('school') . '%')
                    ->whereBetween('class', [request('minClass'), request('maxClass')])
                    ->paginate(50);
        $fields = array(
                    "username" => $request->username,
                    "name" => $request->name,
                    "surname" => $request->surname,
                    "email" => $request->email,
                    "place" => $request->place,
                    "school" => $request->school,
                    "minClass" => $request->minClass,
                    "maxClass" => $request->maxClass    
                );

        return view('profile.searchProfiles', compact('profiles', 'fields'));
    }

    public function editAnotherProfile(User $id){
        return view('profile.editAnotherProfile', ['user' => $id]);
    }

    public function updateAnotherProfile(Request $request, User $id){

        $request->validate([
            'username' => ['required', 'string', 'max:36'],
            'name' => ['required', 'string', 'max:128'],
            'surname' => ['required', 'string', 'max:128'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)]
        ]);

        $id->update([
            'username' => $request->username,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'place' => $request->place,
            'school' => $request->school,
            'class' => $request->class,
            'status' => $request->status
        ]);

        return redirect(route('viewAllProfiles'))->with('message', '✅ Profils ir atjaunināts.');
    }

    public function deleteAnotherProfile(Request $request, User $id){

        $passwordStatus = Hash::check($request->password, Auth::user()->password);
        if($passwordStatus){
            $id->delete();
            return redirect()->back()->with('message', '🥺 Šis profils ir izdzēsts.');
        }

        return redirect()->back()->with('message', '🚫 Ievadītā parole nav pareiza.');
    }
}
