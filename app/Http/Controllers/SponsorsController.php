<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\User;
use App\Sponsor;

use Auth;
use App;
class SponsorsController extends Controller
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
        $title = 'sponsors';
        $sponsors = Sponsor::orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('sponsors.index',compact('sponsors','title','lang'));

    }

    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'sponsors';
    
        return view('sponsors.add',compact('title','lang'));
    }
    public function store(Request $request)
    {
        if($request->id ){
            $rules =
            [
                'title'  =>'required|max:190',
                'link'  =>'url',            
                'status'  =>'required',   
            ];
            
        }     
    
        else{
            $rules =
            [
                'title'  =>'required|max:190',            
                'link'  =>'url',            
                'image'  =>'required',            
                'status'  =>'required',       
            ];
        }
        
        
         $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }


        // return $request ;
        if($request->id ){
            $sponsor = Sponsor::find( $request->id );
            if ($request->hasFile('image')) {

                $imageName =  $sponsor->image; 
                \File::delete(public_path(). '/img/' . $imageName);
            }
        }
        else{
            $sponsor = new Sponsor ;
        }        
        $sponsor->title          = $request->title ;
        $sponsor->link         = $request->link ;
        
        $sponsor->save();
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $sponsor->image   = $name;  
        }

        $sponsor->save();
        return response()->json($sponsor);

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
        $title = 'sponsors';
        
        $data = Sponsor::where('id',$id)->orderBy('id', 'DESC')->first();
        // return $admin ; 
        return view('sponsors.add',compact('data','title','lang'));
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
        $id = Sponsor::find( $id );
        $id ->delete();
        return response()->json($id);
    }

    public function deleteall(Request $request)
    {
        if($request->ids){
            foreach($request->ids as $id){
                $id = Sponsor::find($id);
            }
            $ids = Sponsor::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
    }
}
