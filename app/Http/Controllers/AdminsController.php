<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminsRequest ;
use App\Notifications\emailnotify;
use App\User;
use Spatie\Permission\Models\Role;
use Auth;
use App;
use DB;
class AdminsController extends Controller
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

        $searchArray = [
            'name' => [request('name'), 'like'], 
            'email' => [request('email'), 'like'], 
            'status' => [request('status'), '=']
        ];
        request()->flash();

        $query = User::where('role','admin')->orderBy('id', 'DESC');

        $authId = auth()->id();
        if ($authId != 1) {
            $query->where('id', '!=', 1);
        }
        
        $searchQuery = $this->searchIndex($query, $searchArray);
        $admins = $searchQuery->paginate(env('PerPage'));

        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'admins';
    
        return view('admin.sections.admins.index',compact('admins','title','lang'));

    }
    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'admins';
        return view('admin.sections.admins.create',compact('title','lang'));
    }
    public function store(AdminsRequest $request)
    {
        // return $request ;
        if($request->id ){
            $user = User::find( $request->id );
            if ($request->hasFile('image')) {
                $imageName =  $user->image; 
                \File::delete(public_path(). '/img/' . $imageName);
            }
            if($request->password){
                $password = \Hash::make($request->password);
                $user->password      = $password ;
            }
        }
        else{
            $user = new User ;
            $password = \Hash::make($request->password);
            $user->password      = $password ;
        }         
        $user->name          = $request->name ;
        $user->email         = $request->email ;
        //  $user->mobile        = $request->mobile ;
        $user->status        = $request->status ;
        $user->role            = 'admin';
        $user->save();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $user->image   = $name;  
        }

        $user->save();

        $lang = App::getlocale();
        $title = 'admins';
        $admins = User::where('role','admin')->orderBy('id', 'DESC')->get();
        if($request->id ){
            return redirect()->route('admins')->with('status', __('lang.updatedDone'));
        }else{
            return redirect()->route('admins')->with('status', __('lang.createdDone'));
        }
    
      
        return response()->json($user);
      
  

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
        $title = 'admins';
        $admin = User::where('id',$id)->orderBy('id', 'DESC')->first();
        // return $admin ; 
        return view('admin.sections.admins.edit',compact('admin','title','lang'));
    }

    public function update(Request $request, $id)
    {
         //
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

        return back()->with('status', __('lang.adminDeleted'));
        
        // session()->flash('alert-danger', trans('admin.record_deleted'));   
        // return response()->json($id);
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
        return redirect()->route('admins');
      
    }
}
