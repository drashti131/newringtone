<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RingtoneController extends Controller
{
    public function ringtone(){
        return view('Admin.ringtone');
    }
    public function addringtone(){
        return view('Admin.addringtone');
    }
}
