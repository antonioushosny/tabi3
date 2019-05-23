<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\User;
use App\Doc;
use App\Subdoc;
use Auth;
use App;
class StaticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
     
    }
    public function index($type)
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = $type;
        $statics  = Doc::where('type',$type)->orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('statics.index',compact('statics','title','type','lang'));

    }

   
    public function store(Request $request)
    {
        // return $request ;
        if($request->id ){
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',           
                // 'image'  =>'required',            
                'status'  =>'required',   
                'disc_ar'  =>'required',   
                'disc_en'  =>'required',   
                'type'  =>'required',   
            ];
            
        }     
    
        else{
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',              
                // 'image'  =>'required',            
                'status'  =>'required'   ,   
                'disc_ar'  =>'required',   
                'disc_en'  =>'required',
                'type'  =>'required'      
            ];
        }
        
        
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
         }
      
        // return $request ;
         if($request->id ){
            $doc = Doc::find( $request->id );
            
            if ($request->hasFile('image')) {

                $imageName =  $doc->image; 
                \File::delete(public_path(). '/img/' . $imageName);
            }
            
         }
         else{
            $doc = new Doc ;

         }

         $doc->title_ar          = $request->title_ar ;
         $doc->title_en         = $request->title_en ;
         $doc->disc_ar         = $request->disc_ar ;
         $doc->disc_en         = $request->disc_en ;
         $doc->status        = $request->status ;
         $doc->type        = $request->type ;
         $doc->save();
       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $doc->image   = $name;  
        }

        $doc->save();

        return response()->json($doc);

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
        $id = Doc::find( $id );
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
                $id = doc::find($id);
                $imageName =  $id->image; 
                \File::delete(public_path(). '/img/' . $imageName);
            }
            $ids = Doc::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
        session()->flash('alert-danger', trans('admin.record_selected_deleted'));
        return redirect()->route('categories');
      
    }
}
