<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\doctornotify;
use App\User;
use App\Client;
use App\Product;
use App\ContactUs;
use Auth;

class ContactsController extends Controller
{


    public function indexusers($status)
    {
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }

         $contacts = ContactUs::where('status',$status)->orderBy('id', 'DESC')->get();
        $title = 'users_'.$status ;
        return view('contacts.index',compact('contacts','title'));
    }
    public function store(Request $request)
    {
        
        if($request->id ){
            $rules =
            [         
                'status'  =>'required',   
            ];
            
        }     
    
        else{
            $rules =
            [           
                'status'  =>'required'      
            ];
        }
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
         }
      
        // return $request ;
         if($request->id ){
            $ContactUs = ContactUs::find( $request->id ); 
         }
         else{
            $ContactUs = new ContactUs ;

         }

         $ContactUs->status        = $request->status ;
         $ContactUs->save();

        return response()->json($ContactUs);

    }
    public function destroy($id)
    {
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
      
        $id = ContactUs::find( $id );
        $id->delete();
         return response()->json($id);

    }

    public function deleteall(Request $request)
    {
        // return $request;
        if($request->ids){
            $ids = ContactUs::whereIn('id',$request->ids)->delete();
        }
        session()->flash('alert-danger', trans('admin.record_selected_deleted'));
        return redirect()->route('contacts');
      
    }
  
}
