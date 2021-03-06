<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\Category;
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

    public function index(Request $request)
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin'  ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title ='advertisements' ;
        $advertisements = Advertisement::with('user')->whereHas('user') ;
        if($request->user_id){
            $advertisements->where('user_id',$request->user_id) ;
        }
        if($request->category_id){
            $advertisements->where('category_id',$request->category_id) ;
        }
        if($request->from){
            $advertisements->where('expiry_date','>=',$request->from) ;
        }
        if($request->to){
            $advertisements->where('expiry_date','=<',$request->to) ;
        }
        $advertisements = $advertisements->orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('advertisements.index',compact('advertisements','title','lang'));
    }

    public function indexprofile()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin'  ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title ='profileadvertisements' ;
        if(Auth::user()->role == 'admin'){
            $profileadvertisements = Advertisement::where('type' , 'profile')->orderBy('id', 'DESC')->get();
        }else{
            $profileadvertisements = Advertisement::where('user_id',Auth::user()->id)->where('type' , 'profile')->orderBy('id', 'DESC')->get();
        }
        // return $admins ; 
        return view('profileadvertisements.index',compact('profileadvertisements','title','lang'));
    }

    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin'  ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'advertisements';
        $allusers = User::where('status','active')->where('role','user')->get();
        $users = array_pluck($allusers,'name', 'id');
        $allcategories = Category::where('status','active')->get();
        if($lang == 'ar'){
            $categories = array_pluck($allcategories,'title_ar', 'id');
        }
        else{
            $categories = array_pluck($allcategories,'title_en', 'id');
        }
 
        return view('advertisements.add',compact('title','categories','users','lang'));
    }

    public function addprofile()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin'   ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'profileadvertisements';
        $allcompanies = User::where('status','active')->where('role','company')->get();
        $companies = array_pluck($allcompanies,'name', 'id');
        return view('profileadvertisements.add',compact('title','companies','lang'));
    }

    public function store(Request $request)
    {
        // dd($request)  ; 
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

    public function storeprofile(Request $request)
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
                'image'  =>'required',   
                'status'  =>'required',     
            ];
        }
        
        if($request->link){
            $rules['link'] = 'url' ;
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
                    'en' => Auth::user()->name . ' edit on advertisement in his profile'  ,
                    'ar' => Auth::user()->name . '    قام بالتعديل علي اعلان في صفحته '  ,
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
            
            $advertisement->type         = $request->type ;
            
          
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
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin'  ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'advertisements';
        $data = Advertisement::where('id',$id)->orderBy('id', 'DESC')->first();
        return view('advertisements.show',compact('data','title','lang'));
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
        if(Auth::user()->role != 'admin'  ){
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

    public function editprofile($id)
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin'   ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'profileadvertisements';
        $allcompanies = User::where('status','active')->where('role','company')->get();
        $companies = array_pluck($allcompanies,'name', 'id');
        $data = Advertisement::where('id',$id)->orderBy('id', 'DESC')->first();
        
        return view('profileadvertisements.add',compact('data','title','companies','lang'));
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

    public function changeStatus($id)
    {
       
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $ad = Advertisement::find( $id );
        if($ad->status == 'active'){
            $ad->status = 'not_active';
        }else{
            $ad->status = 'active';
            $client = User::find($ad->user_id) ;
            if($client){
                $msg =  [
                    'en' => " Your ad has been accepted" ,
                    'ar' => " لقد تم قبول اعلانك" ,
                ]; 
                $type = "ads";
                $client->notify(new Notifications($msg,$type ));
                $device_id = $client->device_token;
                if($device_id){
                    $this->notification($device_id,$msg,$msg,$id);
                }
            }
        }
        $ad->save();
        return redirect()->back()->with('success','status changed');
         
    }

    
}
