<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\Location;
use App\Area;
use App\Country;
use Auth;
use App;
class LocationsController extends Controller
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
        $title = 'locations';

        $allcountries = Country::all();
        if($lang == 'ar')
        $countries = array_pluck($allcountries,'title_ar', 'id'); 
        else
        $countries = array_pluck($allcountries,'title_en', 'id');

        $locations = Location::with('country')->orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('locations.index',compact('locations','countries','title','lang'));

    }
 
    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'locations';
        $allcountries = Country::all();
        if($lang == 'ar'){
            $countries = array_pluck($allcountries,'title_ar', 'id'); 
        }else{
            $countries = array_pluck($allcountries,'title_en', 'id');
        }
        return view('locations.add',compact('title','countries','lang'));
    }
    public function store(Request $request)
    {
        
        if($request->id ){
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190', 
                'country_id'  =>'required',           
                'status'  =>'required',   
            ];
            
        }     
    
        else{
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',              
                // 'image'  =>'required',           
                'country_id'  =>'required',     
                'status'  =>'required'      
            ];
        }
        
        
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
         }
         
        // return $request ;
        if($request->id ){
            $Location = Location::find( $request->id );
        }
        else{
            $Location = new Location ;

        }

        $Location->title_ar          = $request->title_ar ;
        $Location->title_en         = $request->title_en ;
        $Location->country_id         = $request->country_id ;
        $Location->status        = $request->status ;
        $Location->save();

        $Location->save();
        $Location = Location::where('id',$Location->id)->with('country')->first();
        return response()->json($Location);

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
        $title = 'locations';
        $allcountries = Country::all();
        if($lang == 'ar'){
            $countries = array_pluck($allcountries,'title_ar', 'id'); 
        }else{
            $countries = array_pluck($allcountries,'title_en', 'id');
        }
        $location = Location::where('id',$id)->with('country')->orderBy('id', 'DESC')->first();
        // return $admin ; 
        return view('locations.edit',compact('location','countries','title','lang'));
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
        $id = Location::find( $id );
        $id ->delete();
        return response()->json($id);
    }

    public function deleteall(Request $request)
    {
        
        
        if($request->ids){
            foreach($request->ids as $id){
                $id = Location::find($id);
            }
            $ids = Location::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
    }
}
