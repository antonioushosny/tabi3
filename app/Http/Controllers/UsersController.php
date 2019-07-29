<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\User;

use Auth;
use App;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    
        // if(Auth::user()->role != 'admin' ){
        //     return view('unauthorized',compact('role','admin'));
        // }
        
    }
    public function index()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'users';
        $users = User::where('role','user')->orderBy('id', 'DESC')->get();
 
        return view('users.index',compact('users','countries','cities','title','lang'));

    }

    public function changestatus($id)
    {
            $title =  'users' ;
            $user = User::where('id',$id)->first();
            if($user){
                if($user->status == 'active'){
                    $user->status = 'not_active' ;
                }
                else{
                    $user->status = 'active' ;                    
                }
                $user->save();
            }
            return redirect()->route('users');
    }
    public function store(Request $request)
    {
        
       
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

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
        $imageName =  $id->image; 
        \File::delete(public_path(). '/img/' . $imageName);
        $id ->delete();

        session()->flash('alert-danger', trans('admin.record_deleted'));   
        return response()->json($id);
        // return view('admin.index',compact('admins','title'));
    }

    public function deleteall(Request $request)
    {
        
        
        if($request->ids){
            foreach($request->ids as $id){
                $id = User::find($id);
                $imageName =  $id->image; 
                \File::delete(public_path(). '/img/' . $imageName);
            }
            $ids = User::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
        session()->flash('alert-danger', trans('admin.record_selected_deleted'));
        // return redirect()->route('users');
      
    }
}
