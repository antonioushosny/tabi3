<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\User;
use App\Doc;
use App\Subdoc;
use App\Contact;

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
        if($title == 'contacts'){
            $contacts= Contact::first();
            $title = 'contacts';
            // return $contacts ;
            return view('statics.contacts',compact('title','lang','type','contacts'));
        }
        $statics  = Doc::where('type',$type)->orderBy('id', 'DESC')->get();
        // return $statics ; 
        return view('statics.index',compact('statics','title','type','lang'));

    }

    public function contacts()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $contacts= Contact::first();
        $title = 'contacts';
        return $contacts ;
        return view('statics.contacts',compact('title','lang','contacts'));
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
                'desc_ar'  =>'required',   
                'desc_en'  =>'required',   
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
                'desc_ar'  =>'required',   
                'desc_en'  =>'required',
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
         return $request->desc_ar ;
         $doc->title_ar         = $request->title_ar ;
         $doc->title_en         = $request->title_en ;
         $doc->disc_ar          = $request->desc_ar ;
         $doc->disc_en          = $request->desc_en ;
         $doc->status           = $request->status ;
         $doc->type             = $request->type ;
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

    public function social_accounts(Request $request)
    {
        // return $request ;   
        if($request->id ){
            $rules =
            [
                'facebook'  =>'required|url',
                'youtube'  =>'required|url',
                'instagram'  =>'required|url',
                'snapchat'  =>'required|url',
                'twitter'  =>'required|url',
           
            ];
        }
        else{
            $rules =
            [
                'facebook'  =>'required|url',
                'youtube'  =>'required|url',
                'instagram'  =>'required|url',
                'snapchat'  =>'required|url',
                'twitter'  =>'required|url',           
            ];
        }
        
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
         }   
        $contacts= Contact::first();
        if($contacts){
            $contacts->facebook          = $request->facebook ;
            $contacts->youtube         = $request->youtube ;
            $contacts->instagram     = $request->instagram ;
            $contacts->snapchat     = $request->snapchat ;        
            $contacts->twitter     = $request->twitter ;
        }
        else{
            $contacts= new Contact();
            $contacts->facebook          = $request->facebook ;
            $contacts->youtube         = $request->youtube ;
            $contacts->instagram     = $request->instagram ;
            $contacts->snapchat     = $request->snapchat ;        
            $contacts->twitter     = $request->twitter ;
        }

                  
   
        $contacts->save();
        return response()->json($contacts);
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
