<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\Interest;
use App\UserInterest;
use Auth;
use App;
class InterestsController extends Controller
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
        $title = 'interests';
        $interests = Interest::orderBy('id', 'DESC')->get();
        // return $Awards ; 
        return view('interests.index',compact('interests','title','lang'));
        
    }

    public function store(Request $request)
    {
        // return $request ;
        if($request->id ){
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',              
                'status'  =>'required'   ,   
                // 'image'  =>'required'   , 
            ];
            
        }     
    
        else{
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',              
                'status'  =>'required'   ,   
                'image'  =>'required'   ,   
            ];
        }
        
        
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
         }
      
        // return $request ;
         if($request->id ){
            $interest = Interest::find( $request->id );
            
            if ($request->hasFile('image')) {

                $imageName =  $interest->image; 
                \File::delete(public_path(). '/img/' . $imageName);
            }
            
         }
         else{
            $interest = new Interest ;

         }

         $interest->title_ar          = $request->title_ar ;
         $interest->title_en         = $request->title_en ;
         $interest->status        = $request->status ;
         $interest->save();
         
       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $interest->image   = $name;  
        }

        $interest->save();
        $interest = Interest::where('id',$interest->id)->with('users')->first();
        $count = count($interest->users);
        return response()->json([
            'data'=>$interest,
            'count'=>$count,
        ]);

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
        $id = Interest::find( $id );
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
                $id = Interest::find($id);
                $imageName =  $id->image; 
                \File::delete(public_path(). '/img/' . $imageName);
            }
            $ids = Interest::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
        session()->flash('alert-danger', trans('admin.record_selected_deleted'));
        // return redirect()->route('subcategories');
      
    }
}
