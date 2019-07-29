<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\Package;
use App\User;
use App\Advertisement;
use Carbon\Carbon;
use App\Notifications\Notifications;

use Auth;
use App;
class AdvertisementsController extends Controller
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
        if(Auth::user()->role != 'admin' && Auth::user()->role != 'company' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title ='advertisements' ;
        if(Auth::user()->role == 'admin'){
            $advertisements = Advertisement::orderBy('id', 'DESC')->get();
        }else{
            $advertisements = Advertisement::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
        }
        
        // return $admins ; 
        return view('advertisements.index',compact('advertisements','title','lang'));
    }

    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' && Auth::user()->role != 'company' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'advertisements';
        $allcompanies = User::where('status','active')->where('role','company')->get();
        $companies = array_pluck($allcompanies,'name', 'id');
        
        $allpackages = Package::where('status','active')->get();
        if($lang == 'ar'){
            $packages = array_pluck($allpackages,'title_ar', 'id');
        }
        else{
            $packages = array_pluck($allpackages,'title_en', 'id');
        }
        return view('advertisements.add',compact('title','packages','companies','lang'));
    }
    public function store(Request $request)
    {
        
        if($request->id ){
            $rules =
            [
                // 'user_id'  =>'required',           
                // 'package_id'  =>'required',           
                // 'type'  =>'required',   
                // 'page'  =>'required',   
                // 'cost'  =>'required',   
                // 'number'  =>'required',   
                // 'total'  =>'required',   
                // 'image'  =>'required',   
                'status'  =>'required',   
            ];
            
        }     
    
        else{
            $rules =
            [
                'user_id'  =>'required',           
                'package_id'  =>'required',           
                'type'  =>'required',   
                'page'  =>'required',   
                'cost'  =>'required',   
                'number'  =>'required',   
                'total'  =>'required',   
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
            $advertisement = Advertisement::find( $request->id );
            if(Auth::user()->role == 'company' ){

                $type = "advertisement";
                $msg =  [
                    'en' => Auth::user()->name . ' edit on advertisement'  ,
                    'ar' => Auth::user()->name . '  قام بالتعديل علي اعلان '  ,
                ];
                $title = [
                    'en' => Auth::user()->name . 'add new advertisement'  ,
                    'ar' => Auth::user()->name . 'أضاف اعلان جديد'  , 
                ];
                $admins = User::where('role', 'admin')->get(); 
                if(sizeof($admins) > 0){
                    foreach($admins as $admin){
                        $admin->notify(new Notifications($msg,$type ));
                    }
                    $device_token = $admin->device_token ;
                    if($device_token){
                        $this->notification($device_token,$title,$msg);
                        $this->webnotification($device_token,$title,$msg,$type);
                    }
                }
            }
        }
        else{
            $advertisement = new Advertisement ;

            $advertisement->user_id          = $request->user_id ;
            $advertisement->package_id         = $request->package_id ;
            $advertisement->type         = $request->type ;
            $advertisement->page         = $request->page ;
            $advertisement->cost         = $request->cost ;
            $advertisement->number         = $request->number ;
            $advertisement->total         = $request->total ;
            $dt = Carbon::now();
            $date  = date('Y-m-d', strtotime($dt));

            if($request->type == 'daily'){
                $days = 1 * $request->number ;
            }
            else if($request->type == 'weekly'){
                $days = 7 * $request->number ;
            }
            else if($request->type == 'monthly'){
                $days = 30 * $request->number ;
            }
            else if($request->type == 'annual'){
                $days = 365 * $request->number ;
            }

            $expire_date   = date('Y-m-d', strtotime($date. ' + '.$days.' days'));
            $advertisement->start_date         = $date ;
            $advertisement->expiry_date        = $expire_date ;
            if(Auth::user()->role == 'company' ){

                $type = "advertisement";
                $msg =  [
                    'en' => Auth::user()->name . 'add new advertisement'  ,
                    'ar' => Auth::user()->name . 'أضاف اعلان جديد'  ,
                ];
                $title = [
                    'en' => Auth::user()->name . 'add new advertisement'  ,
                    'ar' => Auth::user()->name . 'أضاف اعلان جديد'  , 
                ];
                $admins = User::where('role', 'admin')->get(); 
                if(sizeof($admins) > 0){
                    foreach($admins as $admin){
                        $admin->notify(new Notifications($msg,$type ));
                    }
                    $device_token = $admin->device_token ;
                    if($device_token){
                        $this->notification($device_token,$title,$msg);
                        $this->webnotification($device_token,$title,$msg,$type);
                    }
                }
            }
        }
        $advertisement->link         = $request->link ;
        $advertisement->title         = $request->title ;

        $advertisement->status        = $request->status ;
        
        $advertisement->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $advertisement->image   = $name;  
        }
        $advertisement->save();
       
        return response()->json($advertisement);

    }


    public function show($id)
    {
        //
    }
    public function packagedetail(Request $request, $id) {
        // return $id ;
        if ($request->ajax()) {
            return response()->json([
                'detail' => Package::where('id', $id)->first()
            ]);
        }
    }

    public function edit($id)
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' && Auth::user()->role != 'company' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'advertisements';
        $data = Advertisement::where('id',$id)->orderBy('id', 'DESC')->first();
        $allcompanies = User::where('status','active')->where('role','company')->get();
        $companies = array_pluck($allcompanies,'name', 'id');
        
        $allpackages = Package::where('status','active')->get();
        if($lang == 'ar'){
            $packages = array_pluck($allpackages,'title_ar', 'id');
        }
        else{
            $packages = array_pluck($allpackages,'title_en', 'id');
        }
        // return $admin ; 
        return view('advertisements.add',compact('data','title','packages','companies','lang'));
    }

    public function update(Request $request, $id)
    {

      
    }


    public function destroy($id)
    {
       
        if(Auth::user()->role != 'admin' && Auth::user()->role != 'company' ){
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
