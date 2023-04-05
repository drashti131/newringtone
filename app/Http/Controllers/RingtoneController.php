<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ringtone;

class RingtoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.ringtone');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.addringtone');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->input();
        if(isset($data) && count($data)>0)
        {
            $ringtone=array(
                'name'=>$data['name'],
                'url'=>$data['url'],
                'time'=>$data['time'],
                'authorname'=>$data['authorname'],
                'download_count'=>0,
                'labels'=>$data['labels']
            );

            if($request->file('image'))
            {
                $path=public_path('Assets/Admin/ringtoneimage');

                $filename = $request->image->getClientOriginalName();

                $request->image->move($path, $filename);
                $ringtone['image']=$filename;
            }
            ringtone::create($ringtone);
            return redirect('/admin/ringtone');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['edit'] = ringtone::where('r_id',$id)->first();
        return view('admin.addringtone',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->input();
        if(isset($data) && count($data)>0)
        {
            $ringtone=array(
                'name'=>$data['name'],
                'url'=>$data['url'],
                'time'=>$data['time'],
                'authorname'=>$data['authorname'],
                'labels'=>$data['labels']
            );

            if($request->file('image'))
            {
                $path=public_path('Assets/Admin/ringtoneimage');

                $old_ringtone = ringtone::find($id);
                if($old_ringtone->image != ''  && $old_ringtone->image != null){
                    $file_old = $path.'/'.$old_ringtone->image;
                    unlink($file_old);
                }

                $filename = $request->image->getClientOriginalName();

                $request->image->move($path, $filename);
                $ringtone['image']=$filename;
            }
            ringtone::where('r_id',$id)->update($ringtone);
            return redirect('/admin/ringtone');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ringtone::where('r_id',$id)->delete();
        echo "success";
    }
}
