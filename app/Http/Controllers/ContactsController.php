<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\doctornotify;
use App\User;
use App\Client;
use App\ContactUs;
use Auth;
use App;
use File;

class ContactsController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:contacts-list');
    //      $this->middleware('permission:contacts-delete', ['only' => ['destroy','deleteall']]);
    // }
    public function index()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        
        $contacts = ContactUs::orderBy('id', 'DESC')->get();
        $title = 'contacts';
        // return $contacts;
        return view('contacts.index',compact('contacts','lang','title'));
    }

    public function create()
    {

    }
    

    public function store(Request $request)
    {
       
  
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {
     
    }

    public function destroy($id)
    {
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
     
        $id = ContactUs::find($id);
        $id->delete();
         return response()->json($id);

    }

    public function deleteall(Request $request)
    {
        // return $request;
        if($request->ids){


            $ids = ContactUs::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
        session()->flash('alert-danger', trans('admin.record_selected_deleted'));
        return redirect()->route('contacts');
      
    }


  
}
