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

    public function ringtonedetail($url){
        $data['ringtonedata']=ringtone::where('url',$url)->first();
        if(isset($data['ringtonedata']) && $data['ringtonedata']!='')
        {
            return view('ringtonedetail',$data);
        }
        else
        {
            return redirect('/');
        }
    }

    public function downloadringtone($id){
        $data=ringtone::where('r_id',$id)->first();
        $count = $data->download_count + 1;
        ringtone::where('r_id',$id)->update(array('download_count'=>$count));
        echo $count;

    }
}
