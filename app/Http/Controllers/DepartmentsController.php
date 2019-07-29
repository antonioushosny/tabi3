<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\User;
use App\Department;
use App\Notifications\Notifications;

use Auth;
use App;
class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
     
    }
    public function index()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'departments';
        $departments = Department::orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('departments.index',compact('departments','title','lang'));

    }

    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'departments';
        return view('departments.add',compact('title','lang'));
    }
    public function store(Request $request)
    {
        
        if($request->id ){
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',           
                'status'  =>'required',   
            ];
        }     
        else{
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',           
                'status'  =>'required',     
            ];
        }
        
        
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
         }
         
        // return $request ;

        if($request->id ){
            $department = Department::find( $request->id );
        }
        else{
            $department = new Department ;
            $msg =  [
                'en' => "New department added"  ,
                'ar' => " تم اضافة قسم جديد "  ,
            ];
            $title = [
                'en' => "New department added"  ,
                'ar' => " تم اضافة قسم جديد "  ,
            ];
            $clients =  User::where('role','<>','admin')->get();
            if(sizeof($clients) > 0){
                foreach($clients as $client){
                    if($client){
        
                        $type = "department" ;
                        $msg =  $request->message ;
                        $client->notify(new Notifications($msg,$type ));
                        $device_id = $client->device_token;
                        $title = $request->title ; 
                        if($device_id){
                            $this->notification($device_id,$title,$msg);
                        }
                    }
                }
            }

        }

        $department->title_ar          = $request->title_ar ;
        $department->title_en         = $request->title_en ;
        $department->status        = $request->status ;
        $department->save();
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $department->image   = $name;  
        }
        $department->save();
        return response()->json($department);

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'departments';
        $data = Department::where('id',$id)->orderBy('id', 'DESC')->first();
        // return $admin ; 
        return view('departments.add',compact('data','title','lang'));
    }

    public function update(Request $request, $id)
    {

      
    }


    public function destroy($id)
    {
       
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $id = Department::find( $id );
        $id ->delete();
        return response()->json($id);
    }

    public function deleteall(Request $request)
    {
        
        
        if($request->ids){
            foreach($request->ids as $id){
                $id = Department::find($id);
            }
            $ids = Department::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
    }
}
