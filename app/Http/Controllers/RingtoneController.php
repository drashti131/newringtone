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
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $draw = $request->get('draw');
            $start = $request->get("start");
            $rowperpage = $request->get("length"); // Rows display per page


            $columnIndex_arr = $request->get('order');
            $columnName_arr = $request->get('columns');
            $order_arr = $request->get('order');
            $search_arr = $request->get('search');

            $columnIndex = $columnIndex_arr[0]['column']; // Column index
            $columnName = $columnName_arr[$columnIndex]['data']; // Column name
            $columnSortOrder = $order_arr[0]['dir']; // asc or desc
            $searchValue = $search_arr['value']; // Search value

            // Total records
            $totalRecords = ringtone::select('count(*) as allcount')->count();
            $totalRecordswithFilter = ringtone::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();

            // Fetch records
            $records = ringtone::orderBy($columnName,$columnSortOrder)
            ->where('name', 'like', '%' .$searchValue . '%')
            ->select('ringtone.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();


            $data_arr = array();
            $i=1;
            foreach($records as $record){
                $action='<a href="'.url('/admin/ringtone').'/'.$record->r_id.'/edit" class="btn btn-icon">
                    <i class="fa fa-edit text-warning" title="Edit Ringtone"> </i>
                    </a>
                    <a href="#" class="btn btn-icon delete_ringtone" r_id="'.$record->r_id.'" rownumber="'.$record->r_id.'" data-toggle="modal" data-target="#delete-ringtone" title="Delete Ringtone"><i class="fa fa-trash text-danger"></i></a>
                    ';
                $data_arr[] = array(
                    "r_id" => $i++,
                    "name" => $record->name,
                    "authorname" => $record->authorname,
                    "download_count" => $record->download_count,
                    "labels" => $record->labels,
                    "action" => $action
                );
            }

            $response = array(
                "draw" => intval($draw),
                "iTotalRecords" => $totalRecords,
                "iTotalDisplayRecords" => $totalRecordswithFilter,
                "aaData" => $data_arr
            );

            return response()->json($response);

        }
        else
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
