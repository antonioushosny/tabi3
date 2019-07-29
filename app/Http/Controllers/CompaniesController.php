<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\User;
use App\Department;
use App\Notifications\Notifications;

use Auth;
use App;
class CompaniesController extends Controller
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
        $title = 'companies';
        $companies = User::where('role','company')->orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('companies.index',compact('companies','title','lang'));

    }

    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'companies';
        $alldepartments = Department::where('status','active')->get();
        if($lang == 'ar'){
            $departments = array_pluck($alldepartments,'title_ar', 'id');
        }
        else{
            $departments = array_pluck($alldepartments,'title_en', 'id');
        }
        return view('companies.add',compact('title','departments','lang'));
    }
    public function store(Request $request)
    {
        if($request->id ){
            $rules =
            [
                'name'  =>'required|max:190',
                'email'  =>'required|email|max:190',            
                'status'  =>'required',   
            ];
            
        }     
    
        else{
            $rules =
            [
                'name'  =>'required|max:190',
                'email'  =>'required|email|unique:users,email|max:190',            
                'mobile'  =>'required|unique:users,mobile',            
                'status'  =>'required',       
            ];
        }
        
        
         $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }


        // return $request ;
        if($request->id ){
            $user = User::find( $request->id );

            if($request->email != $user->email){
                $rules =
                [       
                    'email'  =>'required|email|unique:users,email',     
                ];
                $validator = \Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
                }
            }
            if($request->mobile != $user->mobile){
                $rules =
                [       
                    'mobile'  =>'required|unique:users,mobile',     
                ];
                $validator = \Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
                }
            }
            
            if ($request->hasFile('image')) {

                $imageName =  $user->image; 
                \File::delete(public_path(). '/img/' . $imageName);
            }
            if($request->password){
                $rules =
                [
                    'password'  =>'min:6',                    
                ];
                $validator = \Validator::make($request->all(), $rules);
                if ($validator->fails()){
                    return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
                }
                $password = \Hash::make($request->password);
                $user->password      = $password ;
            }
        }
        else{
            $user = new User ;
            $password = \Hash::make($request->password);
            $user->password      = $password ;

            $msg =  [
                'en' => "New company added"  ,
                'ar' => " تم اضافة شركة جديدة "  ,
            ];
            $title = [
                'en' => "New company added"  ,
                'ar' => " تم اضافة شركة جديدة "  ,
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
        $user->name          = $request->name ;
        $user->email         = $request->email ;
         $user->mobile        = $request->mobile ;
         $user->address        = $request->address ;
         $user->fax        = $request->fax ;
         $user->lat        = $request->lat ;
         $user->lng        = $request->lng ;
         $user->desc        = $request->desc ;
        $user->department_id        = $request->department_id ;
        $user->status        = $request->status ;
        $user->role            = 'company';
        $user->save();
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $user->image   = $name;  
        }

        $user->save();
        return response()->json($user);

        $lang = App::getlocale();
        $title = 'companies';
        $admins = User::where('role','company')->orderBy('id', 'DESC')->get();
        return redirect()->route('admins');
        return \Redirect::back();
        return view('companies.index',compact('admins','title','lang'));

        return response()->json($user);
      

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' && Auth::user()->role != 'company' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'companies';
        $alldepartments = Department::where('status','active')->get();
        if($lang == 'ar'){
            $departments = array_pluck($alldepartments,'title_ar', 'id');
        }
        else{
            $departments = array_pluck($alldepartments,'title_en', 'id');
        }
        $data = User::where('id',$id)->orderBy('id', 'DESC')->first();
        // return $admin ; 
        return view('companies.add',compact('data','departments','title','lang'));
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
        $id = User::find( $id );
        $id ->delete();
        return response()->json($id);
    }

    public function deleteall(Request $request)
    {
        if($request->ids){
            foreach($request->ids as $id){
                $id = User::find($id);
            }
            $ids = User::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
    }
}
