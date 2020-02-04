<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delegate;
use App\User;
use App\Location;
use App\DelegateLocation;

use App\Notifications\Notifications;

use Auth;
use App;
 
class DelegatesController extends Controller
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
        $title = 'delegates';
        $delegates = Delegate::orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('delegates.index',compact('delegates','title','lang'));

    }

    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'delegates';
        $alllocations = Location::all();
        if($lang == 'ar'){
            $locations = array_pluck($alllocations,'title_ar', 'id'); 
        }else{
            $locations = array_pluck($alllocations,'title_en', 'id');
        }
         return view('delegates.add',compact('title','locations','lang'));
    }
    public function store(Request $request)
    {
       
        if($request->id ){
            $rules =
            [
                'name'  =>'required|max:190',
                'mobile'  =>'required',   
                'status'  =>'required',   
             ];
            
        }     
    
        else{
            $rules =
            [
                'name'  =>'required|max:190',
                'mobile'  =>'required|unique:users,mobile',            
                'status'  =>'required',      
 
            ];
        }
        
 
         $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }


       
        if($request->id ){
            $delegate = Delegate::find( $request->id );
          
            $locations = DelegateLocation::where('delegate_id',$request->id )->delete();
            if($request->mobile != $delegate->mobile){
                $rules =
                [       
                    'mobile'  =>'required|unique:delegates,mobile',     
                ];
                $validator = \Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
                }
            }
            
            if ($request->hasFile('image')) {

                $imageName =  $delegate->image; 
                \File::delete(public_path(). '/img/' . $imageName);
            }
            
        }
        else{
            $delegate = new Delegate ;
        }
            $delegate->name          = $request->name ;
             $delegate->mobile        = $request->mobile ;
    
            $delegate->status        = $request->status ;
            $delegate->save();
            if ($request->hasFile('image')) {

                $image = $request->file('image');
                $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
                $destinationPath = public_path('/img');
                $image->move($destinationPath, $name);
                $delegate->image   = $name;  
            }

            $delegate->save();
            // return $request ;
            if($request->locations && sizeof($request->locations) > 0) {
                //  return $request->locations ;
                foreach($request->locations as $loc){
                    $location  = new  DelegateLocation ;
                    $location->location_id  = $loc ;
                    $location->delegate_id  = $delegate->id ;
                    $location->save();
                }
               
            }
            // return $request ;
            return response()->json($delegate);

            $lang = App::getlocale();
            $title = 'delegates';
            $admins = User::where('role','company')->orderBy('id', 'DESC')->get();
            return redirect()->route('admins');
            return \Redirect::back();
            return view('delegates.index',compact('admins','title','lang'));

            return response()->json($delegate);
        

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
        $title = 'delegates';
        $alllocations = Location::all();
        if($lang == 'ar'){
            $locations = array_pluck($alllocations,'title_ar', 'id'); 
        }else{
            $locations = array_pluck($alllocations,'title_en', 'id');
        }
        $data = Delegate::where('id',$id)->with('locations')->orderBy('id', 'DESC')->first();
        $delegatelocations = DelegateLocation::where('delegate_id',$id)->select('location_id')->get();
        $delegatelocationss = [];
        $i = 0;
        foreach($delegatelocations as $loc){
            $delegatelocationss[$i] = $loc->location_id ;
            $i ++ ;
        }
        // return $delegatelocationss ; 
        return view('delegates.add',compact('data','locations','delegatelocationss','title','lang'));
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
        $id = Delegate::find( $id );
        $id ->delete();
        return response()->json($id);
    }

    public function deleteall(Request $request)
    {
        if($request->ids){
            foreach($request->ids as $id){
                $id = Delegate::find($id);
            }
            $ids = Delegate::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
    }
}
