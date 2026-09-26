<?php

namespace App\Http\Controllers;

use App\Mail\WorkwithUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class PublicController extends Controller
{
    public function homepage(){
        return view('welcome');
    }

    public function WorkwithUs(){
        $user=Auth::user();
        if($user){
            return view('work-with-us',compact('user'));
        }
    }

    public function sendEmail(Request $request){
        $name=$request->name;
        $email= $request->email;
        $description= $request->description;

        Mail::to('candidature@noreply.com')->send(new WorkwithUs($name,$email,$description));

        return redirect()->route('homepage')->with('message','Candidatura inviata con succcesso');
    }
}
