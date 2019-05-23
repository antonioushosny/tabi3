<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\User;
use App\Advertisement;
use Auth;
use App;
use Carbon\Carbon;
class AdvertisementController extends Controller
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
        
        $title ='advertisements' ;
        
        $advertisements = Advertisement::orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('advertisements.index',compact('advertisements','title','lang'));

    }

    public function store(Request $request)
    {
        
        if($request->id ){
            $rules =
            [
          
                // 'image'  =>'required',            
                'status'  =>'required',   
                'link'  =>'required',   
                'time'  =>'required',   

            ];
            
        }     
    
        else{
            $rules =
            [
                'image'  =>'required',            
                'status'  =>'required' ,
                'link'  =>'required',   
                'time'  =>'required', 
     
            ];
        }
        
        
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
         }
      
        // return $request ;
         if($request->id ){
            $advertisement = Advertisement::find( $request->id );
            
            if ($request->hasFile('image')) {

                $imageName =  $advertisement->image; 
                \File::delete(public_path(). '/img/' . $imageName);
            }
            
         }
         else{
            $advertisement = new Advertisement ;

         }
  
     
        $advertisement->status   =  $request->status  ;
        $advertisement->link   =  $request->link  ;
        $advertisement->time   =  $request->time  ;
       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $advertisement->image   = $name;  
        }

        $advertisement->save();

        return response()->json($advertisement);

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
        $id = Advertisement::find( $id );
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
                $id = Advertisement::find($id);
                $imageName =  $id->image; 
                \File::delete(public_path(). '/img/' . $imageName);
            }
            $ids = Advertisement::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
        session()->flash('alert-danger', trans('admin.record_selected_deleted'));
        return redirect()->route('advertisements');
      
    }
}
