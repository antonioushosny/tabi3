<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\Award;
use Auth;
use App;
class AwardsController extends Controller
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
        $title = 'awards';
        $awards = Award::orderBy('id', 'DESC')->get();
        // return $Awards ; 
        return view('awards.index',compact('awards','title','lang'));
        
    }

    public function store(Request $request)
    {
        // return $request ;
        if($request->id ){
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',              
                'coupons'  =>'required',           
                'expiry_date'  =>'required',     
                'status'  =>'required'   ,   
                // 'image'  =>'required'   , 
            ];
            
        }     
    
        else{
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',              
                'coupons'  =>'required',           
                'expiry_date'  =>'required',     
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
            $Award = Award::find( $request->id );
            
            if ($request->hasFile('image')) {

                $imageName =  $Award->image; 
                \File::delete(public_path(). '/img/' . $imageName);
            }
            
         }
         else{
            $Award = new Award ;

         }

         $Award->title_ar          = $request->title_ar ;
         $Award->title_en         = $request->title_en ;
         $Award->coupons         = $request->coupons ;
         $Award->expiry_date         = $request->expiry_date ;
         $Award->status        = $request->status ;
         $Award->save();
         
       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $Award->image   = $name;  
        }

        $Award->save();
        $Award = Award::where('id',$Award->id)->first();
        $Award->expiry_date = date('d-m-Y H:i:s', strtotime($Award->expiry_date) );
        return response()->json($Award);

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
        $id = Award::find( $id );
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
                $id = Award::find($id);
                $imageName =  $id->image; 
                \File::delete(public_path(). '/img/' . $imageName);
            }
            $ids = Award::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
        session()->flash('alert-danger', trans('admin.record_selected_deleted'));
        // return redirect()->route('subcategories');
      
    }
}
