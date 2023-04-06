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
            $activated=$data['ringtonedata'];
            $activated = explode(',', $activated->labels);
            if(isset($activated))
            {
                foreach($activated as $v)
                {
                    $data['rdata'][]= (array) \DB::table('ringtone')
                    ->where('url','!=',$url)
                    ->whereRaw('FIND_IN_SET(?, labels)', [$v])
                    ->first();
                }
               
                $data['rdata'] = array_filter(array_map("unserialize", array_unique(array_map("serialize", $data['rdata']))));
                $data['rdata'] = array_filter($data['rdata']);
               
            }  
            return view('ringtonedetail',$data);
        }
        else
        {
            return redirect('/');
        }
    }

    public function labelwisedetail($url){
        
        $url=str_replace('-', ' ', $url);
        $data['rdata'] = \DB::table('ringtone')
        ->whereRaw('FIND_IN_SET(?, labels)', [$url])
        ->get();

        if(isset($data['rdata']) && count($data['rdata'])>0)
        {
            $data['label']=true;
            $data['url']=$url;
            return view('ringtonedetail',$data);
        }
        else
        {
            return redirect('/');
        }
    }
}
