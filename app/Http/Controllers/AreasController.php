<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\Area;
use App\City;
use Auth;
use App;
class AreasController extends Controller
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
        $title = 'areas';
       
        $areas = Area::orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('areas.index',compact('areas','title','lang'));

    }
    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'areas';
        $allcities = City::all();
        if($lang == 'ar'){
            $cities = array_pluck($allcities,'title_ar', 'id'); 
        }else{
            $cities = array_pluck($allcities,'title_en', 'id');
        }
        return view('areas.add',compact('title','cities','lang'));
    }
    public function store(Request $request)
    {
        
        if($request->id ){
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',  
                'city_id'  =>'required',     
                'status'  =>'required',   
            ];
            
        }     
    
        else{
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',              
                // 'image'  =>'required',           
                'city_id'  =>'required',     
                'status'  =>'required'      
            ];
        }
        
        
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
         }
         
        // return $request ;
        if($request->id ){
            $area = Area::find( $request->id );
        }
        else{
            $area = new Area ;

        }

        $area->title_ar          = $request->title_ar ;
        $area->title_en         = $request->title_en ;
        $area->city_id        = $request->city_id ;
        $area->status        = $request->status ;
        $area->save();

        $area->save();
         return response()->json($area);

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
        $title = 'areas';
        $area = Area::where('id',$id)->orderBy('id', 'DESC')->first();
        // return $admin ; 
        $allcities = City::all();
        if($lang == 'ar'){
            $cities = array_pluck($allcities,'title_ar', 'id'); 
        }else{
            $cities = array_pluck($allcities,'title_en', 'id');
        }
        return view('areas.edit',compact('area','cities','title','lang'));
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
        $id = Area::find( $id );
        $id ->delete();
        return response()->json($id);
    }

    public function deleteall(Request $request)
    {
        
        
        if($request->ids){
            foreach($request->ids as $id){
                $id = city::find($id);
            }
            $ids = Area::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
    }
}
