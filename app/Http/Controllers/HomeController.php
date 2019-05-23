<?php

namespace App\Http\Controllers;
use App\Client;
use App\User;
use App\Country;
use App\City;
use App\Category;
use App\SubCategory;
use App\Deal;
use App\Term;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use App\Notifications\Notifications;
use Notification;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
           
            $dt = Carbon::now();
            $date = $dt->toDateString();
            $time  = date('H:i:s', strtotime($dt));
            // return $date ;

            
            // $clients      = User::where('role','client')->count('id');
            // $departments  = Departement::count('id');
            // $orders       = Order::count('id');
            // $users        = User::where('role','user')->count('id');
            $users      = User::where('role','user')->count('id');
            $categories  = Category::count('id');
            $deals        = Deal::whereDate('expiry_date','>',$date)->orWhere('expiry_date','')->orWhere('expiry_date',null)->count('id');
            $nowdeals        = Deal::whereDate('expiry_date','=',$date)->whereTime('expiry_time','>=',$time)->count('id');
            $lastdeals        = Deal::whereDate('expiry_date','<',$date)->orwhereDate('expiry_date','=',$date)->whereTime('expiry_time','<',$time)->count('id');
            
            $subcategories        = SubCategory::count('id');
            $title = 'home' ;
            return view('home',compact('title','deals','nowdeals','lastdeals','users','categories','subcategories','users'));
        
    }
    public function profile($id)
    {

        $admin = User::where('id',$id)->first();
        $term  = Term::first();
        
        $title = "home" ;
        return view('profile',compact('admin','title','term'));
    }
    public function editprofile(Request $request)
    {
        // return $request;
        $user = User::where('id',$request->id)->first();

        if($request->has('name')){
             $data=$this->validate(request(),
            [
                'name'  =>'alpha_spaces',            
            ],[],[
                'name' =>trans('admin.name'),
            ]);
            $user->name = $request->name;
        }
        if($request->has('email')){
             $data=$this->validate(request(),
                 [  
                    'email'  =>'email',
                ],[],[
                    'email'    =>trans('admin.email'),
                ]);
                if($request->email != $user->email ){
                    $data=$this->validate(request(),
                    [
                        'email'  =>'email|unique:users,email',

                    ],[],[
                        'email'    =>trans('admin.email'),
                    ]);
                }

            $user->email = $request->email;
            
        }
        if($request->password){
            $password = \Hash::make($request->password);
            $user->password = $password ;
            
        }
        if($request->has('mobile')){
            $data=$this->validate(request(),
            [
                'mobile'  =>'digits:10',            
            ],[],[
                'mobile' =>trans('admin.mobile'),
            ]);
            $user->mobile = $request->mobile;
            
        }
        if($request->has('national_id')){
            $user->national_id = $request->national_id;
            // return $user;
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $user->image   = $name;  
        }
        $user->save();
        $admin = User::where('id',$request->id)->first();
        // $pass = bcrypt($admin->password);
        // return $pass ;
        session()->flash('alert-info', trans('admin.record_updated'));
        return redirect()->route('profile',['id'=>$admin->id]);
        return view('profile',compact('admin'));
    }
    
    public function savetoken($token)
    {
        $user = Auth::user();
        $user->device_token = $token;
        $user->save();
        return response()->json([
            'msg' => $user
        ]);
    }

    public function messages()
    {
        $title = 'messages';
        // $clients = User::where('role','client')->get();
        $clients = User::where('role','<>','admin')->get();
        $countries = Country::where('id','<>','1')->get();
        $cities = City::where('id','<>','1')->get();
        // $users = User::where('role','user')->get();

        return view('messages.index',compact('clients','cities','countries','title'));
    }

    public function send(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'message' => 'required',
            'for' => 'required',
        ]);
        $user = User::where('role','admin')->first();
            if($user){
                $id = $user->id ;
            }
            else{
                $id ='1' ;
            }
        
        if($request->for == "all"){
            $clients =  User::where('role','<>','admin')->get();
        }
        else if($request->for == "for_country"){
            $clients =  User::whereIn('country_id',$request->countries)->get();
        }
        else if($request->for == "for_city"){
            $clients =  User::whereIn('city_id',$request->cities)->get();
        }
        else{
            $clients =  User::whereIn('id',$request->ids)->get();
        }
        if(sizeof($clients) > 0){

            foreach($clients as $client){
                if($client){
    
                    $type = "message";
                    $msg =  $request->message ;
                    $client->notify(new Notifications($msg,$type ));
                    $device_id = $client->device_token;
                    $title = $request->title ; 
                    if($device_id){
                        $this->notification($device_id,$title,$msg,$id);
                    }
                }
            }
        }
        if($request->send_points){
            if($request->send_points == 'send_points'){
                $validatedData = $request->validate([
                    'points' => 'required',
                    'coupons' => 'required',
                ]);
                if(sizeof($clients) > 0){
                    foreach($clients as $client){
                        if($client){
                            $client->points += $request->points ;
                            $client->coupons += $request->coupons ;
                            $client->save();
                        
                        }
                    }
                }
            }
        }
        session()->flash('alert-success', trans('admin.successfully_send'));
        return redirect()->route('messages');
    }
    
}
