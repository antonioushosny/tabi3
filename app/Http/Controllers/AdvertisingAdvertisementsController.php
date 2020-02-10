<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\Category;
use App\User;
use App\Country;

use App\Advertisement;
use Carbon\Carbon;
use App\Notifications\Notifications;

use Auth;
use App;
class AdvertisingAdvertisementsController extends Controller
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
        if(Auth::user()->role != 'admin'  ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title ='advertisingAdvertisements' ;
        $advertisements = Advertisement::where('user_id',null)->orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('advertisingAdvertisements.index',compact('advertisements','title','lang'));
    }

    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin'  ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'advertisingAdvertisements';
        $allusers = User::where('status','active')->where('role','user')->get();
        $users = array_pluck($allusers,'name', 'id');
        $allcategories = Category::where('status','active')->get();
        if($lang == 'ar'){
            $categories = array_pluck($allcategories,'title_ar', 'id');
        }
        else{
            $categories = array_pluck($allcategories,'title_en', 'id');
        }

        $allcountries = Country::where('status','active')->get();
        if($lang == 'ar'){
            $countries = array_pluck($allcountries,'title_ar', 'id');
        }
        else{
            $countries = array_pluck($allcountries,'title_en', 'id');
        }
 
        return view('advertisingAdvertisements.add',compact('title','categories','countries','users','lang'));
    }

    public function store(Request $request)
    {
        //  return $request ; 
    
        // return $request->images ; 
        if($request->id ){
            $rules =
            [
                'title'         =>'required',           
                'category_id'   =>'required',   
                // 'sub_id'        =>'required',   
                'country_id'    =>'required',   
                // 'city_id'    =>'required',   
                // 'area_id'    =>'required',   
                'expiry_date'  =>'required',   
                // 'install'    =>'required',           
                // 'disc'       =>'required',           
                // 'images'        =>'required',           
                // 'star'       =>'required',           
                'status'        =>'required',   
            ];
            
        }     
    
        else{
            $rules =
            [
                'title'         =>'required',           
                'category_id'   =>'required',   
                // 'sub_id'        =>'required',   
                'country_id'    =>'required',   
                // 'city_id'    =>'required',   
                // 'area_id'    =>'required',   
                'expiry_date'  =>'required',   
                // 'install'    =>'required',           
                // 'disc'       =>'required',           
                'images'        =>'required',           
                // 'star'       =>'required',           
                'status'        =>'required',     
            ];
        }
        
        
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
         }
         
        // return $request ;
        if($request->id ){
            $advertisement = Advertisement::find( $request->id );
        }
        else{
            $advertisement = new Advertisement ;
        }

        $advertisement->title          = $request->title ;
        $advertisement->category_id    = $request->category_id ;
        // $advertisement->sub_id         = $request->sub_id ;
        $advertisement->country_id     = $request->country_id ;
        // $advertisement->city_id        = $request->city_id ;
        // $advertisement->area_id        = $request->area_id ;
        $advertisement->expiry_date    = $request->expiry_date ;
        $advertisement->numbers        = $request->number ;
        // $advertisement->disc           = $request->disc ;
        // $advertisement->star           = $request->star ;
        $advertisement->status         = $request->status ;
        
        $advertisement->save();
        $images = [];
        $i = 0;
        if(isset($request->images) && sizeof($request->images) > 0){
            foreach($request->images as $image){
                $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
                $destinationPath = public_path('/img');
                $image->move($destinationPath, $name);
                $images[$i] = $name ;
                $i++ ;
            }
            $advertisement->images = json_encode($images) ;
        }
        
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
        //     $destinationPath = public_path('/img');
        //     $image->move($destinationPath, $name);
        //     $advertisement->image   = $name;  
        // }
        $advertisement->save();
       
        return response()->json($advertisement);

    }


    public function show($id)
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin'  ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'advertisingAdvertisements';
        $data = Advertisement::where('id',$id)->orderBy('id', 'DESC')->first();
        return view('advertisingAdvertisements.show',compact('data','title','lang'));
    }

    public function edit($id)
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin'  ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'advertisingAdvertisement';
        $data = Advertisement::where('id',$id)->orderBy('id', 'DESC')->first();
        $images = json_decode($data->images) ;
        // return $images ;
        $title = 'advertisingAdvertisements';
        $allusers = User::where('status','active')->where('role','user')->get();
        $users = array_pluck($allusers,'name', 'id');
        $allcategories = Category::where('status','active')->get();
        if($lang == 'ar'){
            $categories = array_pluck($allcategories,'title_ar', 'id');
        }
        else{
            $categories = array_pluck($allcategories,'title_en', 'id');
        }

        $allcountries = Country::where('status','active')->get();
        if($lang == 'ar'){
            $countries = array_pluck($allcountries,'title_ar', 'id');
        }
        else{
            $countries = array_pluck($allcountries,'title_en', 'id');
        }
        
       
        // return $admin ; 
        return view('advertisingAdvertisements.add',compact('data','title','categories','countries','images','users','lang'));
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
        $id = Advertisement::find( $id );
        $id ->delete();
        return response()->json($id);
    }

    public function deleteall(Request $request)
    {
        
        
        if($request->ids){
            foreach($request->ids as $id){
                $id = Advertisement::find($id);
            }
            $ids = Advertisement::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
    }
}
