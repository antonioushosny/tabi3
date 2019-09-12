<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\City;
use App\Area;
use App\Country;
use Auth;
use App;
class CountriesController extends Controller
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
        $title = 'countries';
        
        $countries = Country::orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('countries.index',compact('countries','title','lang'));

    }

    public function cities(Request $request, $id) {
        // return $id ;
        if ($request->ajax()) {
            $lang = App::getlocale();
            if($lang == 'ar'){
                $cities = City::where('country_id', $id)->select('title_ar AS name','id')->get();
            }else{
                $cities = City::where('country_id', $id)->select('title_en AS name','id')->get();
            }
            return response()->json([
                'cities' => $cities ,
            ]);
        }
    }
    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'countries';
        return view('countries.add',compact('title','lang'));
    }
    public function store(Request $request)
    {
        
        if($request->id ){
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',           
                'status'  =>'required',   
            ];
            
        }     
    
        else{
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',              
                // 'image'  =>'required',           
                // 'country_id'  =>'required',     
                'status'  =>'required'      
            ];
        }
        
        
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
         }
         
        // return $request ;
        if($request->id ){
            $country = Country::find( $request->id );
        }
        else{
            $country = new Country ;

        }

        $country->title_ar          = $request->title_ar ;
        $country->title_en         = $request->title_en ;
        $country->status        = $request->status ;
        $country->save();
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $country->image   = $name;  
        }
        $country->save();
        $country = Country::where('id',$country->id)->first();
        return response()->json($country);

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
        $title = 'countries';
        $countrie = Country::where('id',$id)->orderBy('id', 'DESC')->first();
        // return $admin ; 
        return view('countries.edit',compact('countrie','title','lang'));
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
        $id = Country::find( $id );
        $id ->delete();
        return response()->json($id);
    }

    public function deleteall(Request $request)
    {
        
        
        if($request->ids){
            foreach($request->ids as $id){
                $id = Country::find($id);
            }
            $ids = Country::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
    }
}
