<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ringtone;

class UserController extends Controller
{
    public function index(){
        $data['ringtonedata']=ringtone::orderBy('r_id','DESC')->get();
        return view('home',$data);
    }
}
