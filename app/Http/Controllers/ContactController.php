<?php

namespace App\Http\Controllers;
use App\Contact;
use Auth;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $contacts= Contact::first();
        $title = 'contacts';

        // return $contacts ;
        return view('contacts.index',compact('title','lang','about','accounts','volunteerism','policy','contacts','users'));
    }
}
