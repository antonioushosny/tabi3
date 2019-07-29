<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\Package;

use Auth;
use App;
class PackagesController extends Controller
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
        if(Auth::user()->role != 'admin' && Auth::user()->role != 'company' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'packages';
        $packages = Package::orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('packages.index',compact('packages','title','lang'));

    }

    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'packages';
        return view('packages.add',compact('title','lang'));
    }
    public function store(Request $request)
    {
        
        if($request->id ){
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',           
                'type'  =>'required',   
                'page'  =>'required',   
                'cost'  =>'required',   
                'status'  =>'required',   
            ];
            
        }     
    
        else{
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',           
                'type'  =>'required',   
                'page'  =>'required',   
                'cost'  =>'required',   
                'status'  =>'required',     
            ];
        }
        
        
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
         }
         
        // return $request ;
        if($request->id ){
            $package = Package::find( $request->id );
        }
        else{
            $package = new Package ;

        }

        $package->title_ar          = $request->title_ar ;
        $package->title_en         = $request->title_en ;
        $package->type         = $request->type ;
        $package->page         = $request->page ;
        $package->cost         = $request->cost ;
        $package->status        = $request->status ;
        $package->save();

        $package->save();
        return response()->json($package);

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
        $title = 'packages';
        $data = Package::where('id',$id)->orderBy('id', 'DESC')->first();
        // return $admin ; 
        return view('packages.add',compact('data','title','lang'));
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
        $id = Package::find( $id );
        $id ->delete();
        return response()->json($id);
    }

    public function deleteall(Request $request)
    {
        
        
        if($request->ids){
            foreach($request->ids as $id){
                $id = Package::find($id);
            }
            $ids = Package::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
    }
}
