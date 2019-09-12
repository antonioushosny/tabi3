<?php
use Illuminate\Support\Facades\Hash;
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

use App\Advertisement ;
use App\Contact;
use App\ContactUs;
use App\Department ;
use App\Doc;
use App\Expense;
use App\Form;
use App\Note;
use App\SubCategory ; 
use App\Category ; 
use App\PasswordReset ; 
use App\Payment;
use App\PaymentDetail ; 
use App\Sponsor ; 
use App\User;

use Carbon\Carbon;
use App\Notifications\Notifications;
use App\Notifications\SendMessages;
use Validator;

use StreamLab\StreamLabProvider\Facades\StreamLabFacades;
use App\Notifications\verify_code;

class ApiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
 
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        date_default_timezone_set('UTC');
        $this->middleware('guest')->except('logout');
    }
//////////////////////////////////////////////
// Advertisement function by Antonious hosny
    public function Advertisements(Request $request){ 
        $advertisements  = Advertisement::where('status','active')->orderBy('id', 'desc')->get();
            if(sizeof($advertisements) > 0){
                $advertisementss =[];
                $i = 0 ;

                foreach($advertisements as $advertisement){
                    if($advertisement){
                        // $advertisementss[$i]['link'] = $advertisement->link;
                        // $advertisementss[$i]['time'] = $advertisement->time;
                        if($advertisement->image != null){
                            $advertisementss[$i]['image']   = asset('img/').'/'. $advertisement->image;
                        }
                        else{
                            $advertisementss[$i]['image']   = null;
                        }
                        $i ++ ;
                       
                    }
                }
                return response()->json([
                    'success' => 'success',
                    'errors' => null,
                    'message' => trans('api.fetch'),
                    'data' => $advertisementss
                ]);
            }
            else
            {
                $errors=  trans('api.notfound');
                // $errors[] = trans('api.fail_login');
                return response()->json([
                    'success' => 'failed',
                    'errors' => $errors,
                    'message' => trans('api.notfound'),
                    'data' => null,

                ]);
            }


    }
//////////////////////////////////////////////
// register function by Antonious hosny
    public function Register(Request $request) {
        // return $request;
        $lang = $request->header('lang');
        // $this->validateLogin($request);
        $rules=array(   
            "name"=>"required",
            "email"=>"required|unique:users,email",
            "mobile"=>"required|between:8,11|unique:users,mobile", 
            "password"=>"required|min:6",
        
        );
        //check the validator true or not
        $validator  = \Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $messages = $validator->messages();
            $transformed = [];

            foreach ($messages->all() as $field => $message) {
                $transformed[] = [
                    'message' => $message
                ];
            }
            return response()->json([
                'success' => 'failed',
                'errors'  => $transformed,
                'message' => trans('api.failed_registered'),
                'data'    => null ,
            ]);
        }

            $user = new User;

            $password            = \Hash::make($request->password);
            $user->password      = $password ;
            $user->name          = $request->name ;
            $user->email         = $request->email ;
            $user->mobile        = $request->mobile ;
            $user->status        = 'active';
            $user->role          = 'user';
            $user->save();
            $user->generateToken();

            $type = "user";
            $msg =  [
                'en' => "New user registered"  ,
                'ar' => "  مستخدم جديد قام بالتسجيل"  ,
            ];
            $title = [
                'en' =>  "New user registered"  ,
                'ar' => "  مستخدم جديد قام بالتسجيل"  ,  
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
            /////// this for verify email addreess/////////

            // $token = rand(100000,999999);
            // $PasswordReset = PasswordReset::where('email',$user->email)->first();
            // if(!$PasswordReset){
            //     $PasswordReset = new PasswordReset ;
            // }
            // $PasswordReset->email = $user->email ;
            // $PasswordReset->token = $token ;
            // $PasswordReset->save();
            // User::find($user->id)->notify(new verify_code($token));
            /////// end verify email addreess/////////
            $user =  User::where('id',$user->id)->first();
            if($user){
                $users = [] ;
                $users['id'] = $user->id ;
                $users['user_name'] = $user->name ;
                $users['email'] = $user->email ;
                $users['mobile'] = $user->mobile ;
                $users['role'] = $user->role ;
                $users['remember_token'] = $user->remember_token ;
                
            }
            return response()->json([
                'success' => 'success',
                'errors'=> null ,
                'message' => trans('api.success_registered'),
                'data' => $users ,
            ]);
        
    }
//////////////////////////////////////////////
// login function by Antonious hosny
    public function Login(Request $request){
        // return $request;
        // print time();
        $lang = $request->header('lang');
        // $this->validateLogin($request);
        $rules=array(
            "mobile"=>"required",
            "password"=>"required",
            "device_token"=>"required",
            "device_type" => "required"  // 1 for ios , 0 for android  
        );

        //check the validator true or not
        $validator  = \Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $messages = $validator->messages();
            $transformed = [];
            foreach ($messages->all() as $field => $message) {
                $transformed[] = [
                    // 'field' => $field,
                    'message' => $message
                ];
            }
            return response()->json([
                'success' => 'failed',
                'errors'=>$transformed,
                'message' => trans('api.failed_login'),
                'data' => null,

            ]);
        }
        $user = User::where('mobile',$request->mobile)->first();
        // return $user;
        if(!$user){

            $errors =  trans('admin.mobile_notfound');
            return response()->json([
                'success' => 'failed',
                'errors' => $errors ,
                'message' => trans('admin.mobile_notfound'),
                'data' => null,

            ]);
        }
        else{
            if($user->password == null || $user->password == ''){
                return response()->json([
                    'success' => 'failed',
                    'errors' => trans('api.activate_account'),
                    'message' => trans('api.activate_account'),
                    'data' => null,
                ]);
            }
            if (\Hash::check( $request->password,$user->password)) {
                if($user->status == 'not_active'||$user->role == 'admin' ||$user->role == 'provider' ||$user->role == 'center'){
                    return response()->json([
                        'success' => 'failed',
                        'errors' => trans('api.allowed'),
                        'message' => trans('api.allowed'),
                        'data' => null,
                    ]);
                }
                $user->generateToken();
                $user->device_token = $request->device_token ;
                $user->type = $request->device_type ;
                $user->lang = $lang ;
                $user->save();
                $user =  User::where('id',$user->id)->first();
                $users = [] ;
                if($user){
                    $users['id'] = $user->id ;
                    $users['user_name'] = $user->name ;
                    $users['email'] = $user->email ;
                    $users['mobile'] = $user->mobile ;
                    $users['role'] = $user->role ;
                    if($user->image){
                        $users['image'] = asset('img/').'/'. $user->image;
                    }
                    else {
                        $users['image'] = null;
                    }

                    $users['remember_token'] = $user->remember_token ;
                    
                }
                return response()->json([
                    'success' => 'success',
                    'errors' => null,
                    'message' => trans('api.login'),
                    'data' => $users
                ]);
            }
            else
            {
                $errors=  trans('api.password_failed');
                return response()->json([
                    'success' => 'failed',
                    'errors' => $errors,
                    'message' => trans('api.password_failed'),
                    'data' => null,

                ]);
            }
                
            
        }

    }
//////////////////////////////////////////////
// editprofile function by Antonious hosny
    public function EditProfile(Request $request){
        // return $request ;
        $lang = $request->header('lang');
        $token = $request->token;
        if($token == ''){
            $errors[] = [
                'message' => trans('api.logged_out')
            ]; 
            return response()->json([
                'success' => 'failed',
                'errors' => $errors ,
                'message' => trans('api.logged_out'),
                'user' => null,

            ]);
        }  
        $user = User::where('remember_token',$token)->first();
        // return $request->mobile . '/ ' .  ;
        if($user){      
            $rules=array(  
                "name"=>"min:3",
                "mobile"=>"between:8,11", 
                "password" => "min:6",
                "email"=> 'email'
            );
            if($request->mobile){
                if($request->mobile != $user->mobile){
                    $rules['mobile'] = 'unique:users,mobile';
                }
            }
            if($request->email){
                if($request->email != $user->email){
                    $rules['email'] = 'email|unique:users,email';
                }
            }
            //check the validator true or not
            $validator  = \Validator::make($request->all(),$rules);
            if($validator->fails())
            {
                $messages = $validator->messages();
                $transformed = [];

                foreach ($messages->all() as $field => $message) {
                    $transformed[] = [
                        // 'field' => $field,
                        'message' => $message
                    ];
                }
                return response()->json([
                    'success' => 'failed',
                    'errors'=>$transformed,
                    'message' => trans('api.failed'),
                    'user' =>  null ,
                ]);
            }

            if($request->password){
                $password = \Hash::make($request->password);
                $user->password = $password ;
            }
            if($request->name){
                $user->name          = $request->name ;
            }
            if($request->email){
                $user->email         = $request->email ;
            }
            if($request->mobile){
                $user->mobile        = $request->mobile ;
            }
            
            if ($request->profile_pic){
                $image = $request->input('profile_pic'); // image base64 encoded
                $image = str_replace('data:image/png;base64,', '', $image);
                $image = str_replace(' ', '+', $image);
                $imageName = str_random(10). time().'.'.'png';
                \File::put(public_path(). '/img/' . $imageName, base64_decode($image));
                $user->image = $imageName;
            }

            // if ($request->hasFile('image')) {
            //     $image = $request->file('image');
            //     $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            //     $destinationPath = public_path('/img');
            //     $image->move($destinationPath, $name);
            //     $user->image   = $name;  
            // }
            $user->save();
            $user =  User::where('id',$user->id)->first();
            $users = [] ;
            if($user){
                $users['id'] = $user->id ;
                $users['user_name'] = $user->name ;
                $users['email'] = $user->email ;
                $users['mobile'] = $user->mobile ;
                $users['role'] = $user->role ;
                $users['remember_token'] = $user->remember_token ;
                
            }
            return response()->json([
                'success' => 'success',
                'errors'=> null ,
                'message' => trans('api.save'),
                'user' => $users ,
            ]);
        }
        else{
            $errors[] = [
                'message' => trans('api.logged_out')
            ]; 
            return response()->json([
                'success' => 'failed',
                'errors' => $errors ,
                'message' => trans('api.logged_out'),
                'user' => null,

            ]);

        }

    }
///////////////////////////////////////////////////
// logout function by Antonious hosny
    public function Logout(Request $request){
        $token = $request->token;
        if($token == ''){
        }
        // $token = $request->header('access_token');
        $user = User::where('remember_token',$token)->first();
        if ($user) {
            $user->remember_token = null;
            $user->device_token = null;
            $user->save();
            return response()->json([
                'success' => 'success',
                'errors' => null,
                "message"=>trans('api.logout'),
                ]);
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }

    }
//////////////////////////////////////////////////
// forget_password function by Antonious hosny
    public function ForgetPassword(Request $request){
        $rules['email'] = 'required';
        $validator  = \Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $messages = $validator->messages();
            $transformed = [];

            foreach ($messages->all() as $field => $message) {
                $transformed[] = [
                    'message' => $message
                ];
            }
            return response()->json([
                'success' => 'failed',
                'errors'=>$transformed,
                'message' => trans('api.failed'), 
                'user' =>  null ,
            ]);
        }
        $email = $request->email;
        $user = User::where('email',$email)->first();
        if($user){
            $token = rand(100000,999999);
            $PasswordReset = PasswordReset::where('email',$user->email)->first();
            if(!$PasswordReset){
                $PasswordReset = new PasswordReset ;
            }
            $PasswordReset->email = $user->email ;
            $PasswordReset->token = $token ;
            $PasswordReset->save();
            User::find($user->id)->notify(new verify_code($token));
            return response()->json([
                'success' => 'success',
                'errors'  => null,
                "message"=>trans('api.send_token'), 
                ]);

        }
        $error = trans('api.user_notfound');
        return response()->json([
            'success' => 'failed',
            'errors'  =>  $error,
            "message"=>trans('api.user_notfound'),

            ]);
        
    }
//////////////////////////////////////////////////
// verify_code function by Antonious hosny
    public function VerifyCode(Request $request){
        $code = $request->code;
        if($code){
            $PasswordReset = PasswordReset::where('token',$code)->first();
            // return $PasswordReset ;
            if ($PasswordReset) {
                $user = User::where('email',$PasswordReset->email)->first();
                if($user){
                    $user->status = 'active' ;
                    $user->save();
                }
                return response()->json([
                    'success' => 'success',
                    'errors'  => null,
                    "message"=>trans('api.success_code'),
                    'code' => $code 

                ]);
            }
            else{
                $error = trans('api.incorrect_code');
                return response()->json([
                    'success' => 'failed',
                    'errors'  =>  $error,
                    "message"=>trans('api.incorrect_code'),
                    'code' => null
                ]);
            }
            
        }
        $error = trans('api.code_requird');
        return response()->json([
            'success' => 'failed',
            'errors'  =>  $error,
            "message"=>trans('api.code_requird'),
            'code' => null
        ]);
        
    }
///////////////////////////////////////////////////
// reset_password function by Antonious hosny
    public function ResetPassword(Request $request){
        $code = $request->code;
        if($code){
            $PasswordReset = PasswordReset::where('token',$code)->first();
            if($PasswordReset){
                $user = User::where('email',$PasswordReset->email)->first();
            }
            
            else{
                $error = trans('api.code_notfound');
                return response()->json([
                    'success' => 'failed',
                    'errors'  => $error,
                    "message"=>trans('api.code_notfound'),

                ]);
            }
            if ($user) {
                if($request->password){
                    $password = \Hash::make($request->password);
                    $user->password = $password ;
                    // $user->generateToken();
                    $user->save();
                    $PasswordReset->delete();
                    return response()->json([
                        'success' => 'success',
                        'errors'  => null,
                        "message"=>trans('api.passwordsucces')
                    ]);
                }
                else{
                    $error = trans('api.password_requird');
                    return response()->json([
                        'success' => 'failed',
                        'errors'  => $error,
                        "message"=>trans('api.password_requird'),
                
                    ]);
                }
            
                // User::find($user->id)->notify(new verify_code($user->verify_code ));
                // return $user;
                
            }
            $error = trans('api.code_notfound');
            return response()->json([
                'success' => 'failed',
                'errors'  => $error,
                "message"=>trans('api.code_notfound'),
                

            ]);
        }
        $error = trans('api.code_required');
        return response()->json([
            'success' => 'failed',
            'errors'  => $error,
            "message"=>trans('api.code_required'),
        

        ]);
        
    }
/////////////////////////////////////////////////
// HomePage function by Antonious hosny
    public function HomePage(Request $request){
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        $count = 0 ;
        if($token){

            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();
                $count = count($user->unreadnotifications)  ; 
            }
        }
        $advertisementss = [];
        $i =0 ;
        $advertisements = Advertisement::where('page','home')->where('expiry_date','>',$date)->orderBy('id',"Desc")->get();
        // return  $advertisements;
        if(sizeof($advertisements) > 0){
            foreach($advertisements as $ads){
                $advertisementss[$i]['image'] = asset('img/').'/'. $ads->image;
                $advertisementss[$i]['link'] =  $ads->link;
                $advertisementss[$i]['title'] =  $ads->title;
                $i++;
            }
        }

        $sponsorss = [];
        $i =0 ;
        $sponsors = Sponsor::where('status','active')->orderBy('id',"Desc")->get();
        if(sizeof($sponsors) > 0){
            foreach($sponsors as $sponsor){
                $sponsorss[$i]['image'] = asset('img/').'/'. $sponsor->image;
                $sponsorss[$i]['link']  =  $sponsor->link;
                $sponsorss[$i]['title'] =  $sponsor->title;
                $i++;
            }
                }
                
        return response()->json([
            'success' => 'success',
            'errors' => null ,
            'message' => trans('api.fetch'),
            'data' => [
                'advertisements' => $advertisementss,
                'sponsors' => $sponsorss,
                'count' => $count ,
            ]
        ]);

        
    }
//////////////////////////////////////////////////
// Departments function by Antonious hosny
    public function Departments(Request $request){
        // $token = $request->token;
       $lang = $request->header('lang');
         $dt = Carbon::now();
         $date  = date('Y-m-d', strtotime($dt));
        // if($token){
        
        //     $user = User::where('remember_token',$token)->first();
        //     if($user){
        //         $user->lang  = $lang ;
        //         $user->save();
                $advertisementss = [];
                $i =0 ;
                $advertisements = Advertisement::where('page','companies')->where('expiry_date','>',$date)->orderBy('id',"Desc")->get();
                // return  $advertisements;
                if(sizeof($advertisements) > 0){
                    foreach($advertisements as $ads){
                        if($ads->image){
                            $advertisementss[$i]['image'] = asset('img/').'/'. $ads->image;
                        }else{
                            $advertisementss[$i]['image'] = null ;
                        }
                        $advertisementss[$i]['link'] =  $ads->link;
                        $advertisementss[$i]['title'] =  $ads->title;
                        $i++;
                    }
                }

                $departmentss = [];
                $i =0 ;
                $departments = Department::where('status','active')->orderBy('id',"Desc")->get();
                if(sizeof($departments) > 0){
                    foreach($departments as $department){
                        if($lang == 'ar'){
                            $departmentss[$i]['title'] =  $department->title_ar;
                        }else{
                            $departmentss[$i]['title'] =  $department->title_en;
                        }
                        if($department->image){
                            $departmentss[$i]['image'] = asset('img/').'/'. $department->image;
                        }else{
                            $departmentss[$i]['image'] = null ;
                        }
                        $i++;
                    }
                }
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.fetch'),
                    'data' => [
                        'advertisements' => $advertisementss,
                        'departments' => $departmentss,
                    ]
                ]);
            

        //     }else{
        //         return response()->json([
        //             'success' => 'logged',
        //             'errors' => trans('api.logout'),
        //             "message"=>trans('api.logout'),
        //             ]);
        //     }
        // }else{
        //     return response()->json([
        //         'success' => 'logged',
        //         'errors' => trans('api.logout'),
        //         "message"=>trans('api.logout'),
        //         ]);
        // }
        
    }
//////////////////////////////////////////////////
//  Categories function by Antonious hosny
    public function Categories(Request $request){ 
        $categiries  = Category::all() ;
        $sub_categiries  = SubCategory::where('category_id','1')->with('sons_category')->get() ;
                
        return response()->json([
            'success' => 'success',
            'errors' => null ,
            'message' => trans('api.fetch'),
            'data' => [
                 'categiries' => $categiries,
                 'sub_categiries' => $sub_categiries
            ]
        ]);
        
        
    }
///////////////////////////////////////////////////
// / Companies function by Antonious hosny
    public function Companies(Request $request){
        // $token = $request->token;
         $lang = $request->header('lang');
         $dt = Carbon::now();
         $date  = date('Y-m-d', strtotime($dt));
        // if($token){
        
        //     $user = User::where('remember_token',$token)->first();
        //     if($user){
        //         $user->lang  = $lang ;
        //         $user->save();
                $rules=array(
                    'department_id'      =>'required',
                );
                $validator  = \Validator::make($request->all(),$rules);
                if($validator->fails())
                {
                    $messages = $validator->messages();
                    $transformed = [];
        
                    foreach ($messages->all() as $field => $message) {
                        $transformed[] = [
                            'message' => $message
                        ];
                    }
                    return response()->json([
                        'success' => 'failed',
                        'errors'  => $transformed,
                        'message' => trans('api.validation_error'),
                        'data'    => null ,
                    ]);
                }

                $advertisementss = [];
                $i =0 ;
                $advertisements = Advertisement::where('page','companies')->where('expiry_date','>',$date)->orderBy('id',"Desc")->get();
                if(sizeof($advertisements) > 0){
                    foreach($advertisements as $ads){
                        $advertisementss[$i]['image'] = asset('img/').'/'. $ads->image;
                        $advertisementss[$i]['link'] =  $ads->link;
                        $advertisementss[$i]['title'] =  $ads->title;
                        $i++;
                    }
                }

                $companiess = [];
                $i =0 ;
                $companies = User::where('department_id',$request->department_id)->where('role','company')->where('status','active')->orderBy('id',"Desc")->get();
                if(sizeof($companies) > 0){
                    foreach($companies as $company){
                        $profileadvertisements = Advertisement::where('user_id',$company->id)->where('type' , 'profile')->orderBy('id', 'DESC')->get();
                        $profileadvertisementss =  [] ;
                        $n =0 ;
                        if(sizeof($profileadvertisements) > 0){
                            foreach($profileadvertisements as $profileadvertisement){
                                $profileadvertisementss[$n]['image'] = asset('img/').'/'. $profileadvertisement->image;
                                $profileadvertisementss[$n]['link'] =  $profileadvertisement->link;
                                $profileadvertisementss[$n]['title'] =  $profileadvertisement->title;
                                $n++;
                            }
                        }
                        $companiess[$i]['name'] =  $company->name;
                        $companiess[$i]['email'] =  $company->email;
                        $companiess[$i]['mobile'] =  $company->mobile;
                        $companiess[$i]['address'] =  $company->address;
                        $companiess[$i]['url'] =  $company->url;
                        $companiess[$i]['desc'] =  $company->desc;
                        $companiess[$i]['fax'] =  $company->fax;
                        $companiess[$i]['lat'] =  $company->lat;
                        $companiess[$i]['lng'] =  $company->lng;
                        if($company->image){
                            $companiess[$i]['image'] = asset('img/').'/'. $company->image;
                        }else{
                            $companiess[$i]['image'] = null ;
                        }
                        $companiess[$i]['profileadvertisement'] =   $profileadvertisementss ;

                        $i++;
                    }
                }
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.fetch'),
                    'data' => [
                        'advertisements' => $advertisementss,
                        'companies' => $companiess,
                    ]
                ]);
            

        //     }else{
        //         return response()->json([
        //             'success' => 'logged',
        //             'errors' => trans('api.logout'),
        //             "message"=>trans('api.logout'),
        //             ]);
        //     }
        // }else{
        //     return response()->json([
        //         'success' => 'logged',
        //         'errors' => trans('api.logout'),
        //         "message"=>trans('api.logout'),
        //         ]);
        // }
        
    }
 //////////////////////////////////////////////////
    // Offic function by Antonious hosny
    public function Offic(Request $request){
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
        
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();
                $advertisementss = [];
                $i =0 ;
                $advertisements = Advertisement::where('page','offic')->where('expiry_date','>',$date)->orderBy('id',"Desc")->get();
                // return  $advertisements;
                if(sizeof($advertisements) > 0){
                    foreach($advertisements as $ads){
                        $advertisementss[$i]['image'] = asset('img/').'/'. $ads->image;
                        $advertisementss[$i]['link'] =  $ads->link;
                        $advertisementss[$i]['title'] =  $ads->title;
                        $i++;
                    }
                }

                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.fetch'),
                    'data' => [
                        'advertisements' => $advertisementss,
                    ]
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////
// Forms function by Antonious hosny
    public function Forms(Request $request){
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
        
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();
                $rules=array(
                    'type'      =>'required',
                );
                $validator  = \Validator::make($request->all(),$rules);
                if($validator->fails())
                {
                    $messages = $validator->messages();
                    $transformed = [];
        
                    foreach ($messages->all() as $field => $message) {
                        $transformed[] = [
                            'message' => $message
                        ];
                    }
                    return response()->json([
                        'success' => 'failed',
                        'errors'  => $transformed,
                        'message' => trans('api.validation_error'),
                        'data'    => null ,
                    ]);
                }

                $advertisementss = [];
                $i =0 ;
                $advertisements = Advertisement::where('page','offic')->where('expiry_date','>',$date)->orderBy('id',"Desc")->get();
                if(sizeof($advertisements) > 0){
                    foreach($advertisements as $ads){
                        $advertisementss[$i]['image'] = asset('img/').'/'. $ads->image;
                        $advertisementss[$i]['link'] =  $ads->link;
                        $advertisementss[$i]['title'] =  $ads->title;
                        $i++;
                    }
                }

                $formss = [];
                $i =0 ;
                $forms = Form::where('type',$request->type)->where('user_id',$user->id)->orderBy('id',"Desc")->get();

                if(sizeof($forms) > 0){
                    foreach($forms as $form){
                        $formss[$i]['id'] =  $form->id;
                        $formss[$i]['title'] =  $form->title;
                        if($form->image){
                            $formss[$i]['image'] = asset('img/').'/'. $form->image;
                        }else{
                            $formss[$i]['image'] = null ;
                        }
                        if($form->file){
                            $formss[$i]['file'] = asset('img/').'/'. $form->file;
                        }else{
                            $formss[$i]['file'] = null ;
                        }
                       
                        $i++;
                    }
                }
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.fetch'),
                    'data' => [
                        'advertisements' => $advertisementss,
                        'forms' => $formss,
                    ]
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////
// AddEditForms function by Antonious hosny
    public function AddEditForms(Request $request){
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
        
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();
                $rules=array(
                    'type'      =>'required',
                    'title'      =>'required',
                );
                $validator  = \Validator::make($request->all(),$rules);
                if($validator->fails())
                {
                    $messages = $validator->messages();
                    $transformed = [];
        
                    foreach ($messages->all() as $field => $message) {
                        $transformed[] = [
                            'message' => $message
                        ];
                    }
                    return response()->json([
                        'success' => 'failed',
                        'errors'  => $transformed,
                        'message' => trans('api.validation_error'),
                        'data'    => null ,
                    ]);
                }

                if($request->id){
                    $form = Form::find($request->id);
                }else{
                    $form = new Form ;
                }
                $form->title  =  $request->title ;
                $form->type  =  $request->type ;
                $form->user_id  =  $user->id ;
                if ($request->image){
                    $image = $request->input('image'); // image base64 encoded
                    $image = str_replace('data:image/png;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $imageName = str_random(10). time().'.'.'png';
                    \File::put(public_path(). '/img/' . $imageName, base64_decode($image));
                    $form->image = $imageName;
                }

                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $name = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $destinationPath = public_path('/img');
                    $file->move($destinationPath, $name);
                    $form->file   = $name;  
                }
                $form->save();
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.save'),
                    'data' => [
                        'form' => $form,
                    ]
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////
// DeleteForm function by Antonious hosny
    public function DeleteForm(Request $request){
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
        
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();
                $rules=array(
                    'form_id'      =>'required',
                );
                $validator  = \Validator::make($request->all(),$rules);
                if($validator->fails())
                {
                    $messages = $validator->messages();
                    $transformed = [];
        
                    foreach ($messages->all() as $field => $message) {
                        $transformed[] = [
                            'message' => $message
                        ];
                    }
                    return response()->json([
                        'success' => 'failed',
                        'errors'  => $transformed,
                        'message' => trans('api.validation_error'),
                        'data'    => null ,
                    ]);
                }

                if($request->form_id){
                    $form = Form::find($request->form_id);
                    if($form){
                        $form->delete();
                    }
                }
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.delete'),
                    'data' => null
                    
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////
// Notes function by Antonious hosny
    public function Notes(Request $request){
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
        
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();

                $advertisementss = [];
                $i =0 ;
                $advertisements = Advertisement::where('page','offic')->where('expiry_date','>',$date)->orderBy('id',"Desc")->get();
                if(sizeof($advertisements) > 0){
                    foreach($advertisements as $ads){
                        $advertisementss[$i]['image'] = asset('img/').'/'. $ads->image;
                        $advertisementss[$i]['link'] =  $ads->link;
                        $advertisementss[$i]['title'] =  $ads->title;
                        $i++;
                    }
                }

                $notess = [];
                $i =0 ;
                $notes = Note::where('user_id',$user->id)->orderBy('id',"Desc")->get();

                if(sizeof($notes) > 0){
                    foreach($notes as $note){
                        $notess[$i]['id'] =  $note->id;
                        $notess[$i]['title'] =  $note->title;
                        $notess[$i]['desc'] =  $note->desc;
          
                        $i++;
                    }
                }
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.fetch'),
                    'data' => [
                        'advertisements' => $advertisementss,
                        'notes' => $notess,
                    ]
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////
// AddEditNotes function by Antonious hosny
    public function AddEditNotes(Request $request){
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
        
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();
                $rules=array(
                    'desc'      =>'required',
                    'title'      =>'required',
                );
                $validator  = \Validator::make($request->all(),$rules);
                if($validator->fails())
                {
                    $messages = $validator->messages();
                    $transformed = [];
        
                    foreach ($messages->all() as $field => $message) {
                        $transformed[] = [
                            'message' => $message
                        ];
                    }
                    return response()->json([
                        'success' => 'failed',
                        'errors'  => $transformed,
                        'message' => trans('api.validation_error'),
                        'data'    => null ,
                    ]);
                }

                if($request->id){
                    $note = Note::find($request->id);
                }else{
                    $note = new Note ;
                }
                $note->title  =  $request->title ;
                $note->desc  =  $request->desc ;
                $note->user_id  =  $user->id ;
                
                $note->save();
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.save'),
                    'data' => [
                        'note' => $note,
                    ]
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////
// DeleteNote function by Antonious hosny
    public function DeleteNote(Request $request){
        
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();
                $rules=array(
                    'note_id'      =>'required',
                );
                $validator  = \Validator::make($request->all(),$rules);
                if($validator->fails())
                {
                    $messages = $validator->messages();
                    $transformed = [];
        
                    foreach ($messages->all() as $field => $message) {
                        $transformed[] = [
                            'message' => $message
                        ];
                    }
                    return response()->json([
                        'success' => 'failed',
                        'errors'  => $transformed,
                        'message' => trans('api.validation_error'),
                        'data'    => null ,
                    ]);
                }

                if($request->note_id){
                    $note = Note::find($request->note_id);
                    if($note){
                        $note->delete();
                    }
                }
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.delete'),
                    'data' => null
                    
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////
//////////////////////////////////////////////////
// Box function by Antonious hosny
    public function Box(Request $request){
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
        
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();
                $advertisementss = [];
                $i =0 ;
                $advertisements = Advertisement::where('page','box')->where('expiry_date','>',$date)->orderBy('id',"Desc")->get();
                // return  $advertisements;
                if(sizeof($advertisements) > 0){
                    foreach($advertisements as $ads){
                        $advertisementss[$i]['image'] = asset('img/').'/'. $ads->image;
                        $advertisementss[$i]['link'] =  $ads->link;
                        $advertisementss[$i]['title'] =  $ads->title;
                        $i++;
                    }
                }

                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.fetch'),
                    'data' => [
                        'advertisements' => $advertisementss,
                    ]
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////
// Payments function by Antonious hosny
    public function Payments(Request $request){
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
        
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();

                $advertisementss = [];
                $i =0 ;
                $advertisements = Advertisement::where('page','box')->where('expiry_date','>',$date)->orderBy('id',"Desc")->get();
                if(sizeof($advertisements) > 0){
                    foreach($advertisements as $ads){
                        $advertisementss[$i]['image'] = asset('img/').'/'. $ads->image;
                        $advertisementss[$i]['link'] =  $ads->link;
                        $advertisementss[$i]['title'] =  $ads->title;
                        $i++;
                    }
                }

                $paymentss = [];
                $i =0 ;
                $payments = Payment::where('user_id',$user->id)->orderBy('id',"Desc")->get();
                $total_amount = Payment::where('user_id',$user->id)->orderBy('id',"Desc")->sum('amount');

                if(sizeof($payments) > 0){
                    foreach($payments as $payment){
                        $amount = PaymentDetail::where('payment_id',$payment->id)->sum('amount');
                        $remaining = $payment->amount - $amount ;
                        $paymentss[$i]['id'] =  $payment->id;
                        $paymentss[$i]['title'] =  $payment->title;
                        $paymentss[$i]['amount'] = $payment->amount;
                        $paymentss[$i]['amount_paid'] =  $amount;
                        $paymentss[$i]['remaining'] = $remaining;
                        $paymentss[$i]['date'] = $payment->date;
                        $i++;
                    }
                }
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.fetch'),
                    'data' => [
                        'advertisements' => $advertisementss,
                        'payments' => $paymentss,
                        'total_amount' => $total_amount,
                    ]
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////
// AddEditPayments function by Antonious hosny
    public function AddEditPayments(Request $request){
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
        
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();
                $rules=array(
                    'amount'      =>'required',
                    'title'      =>'required',
                );
                $validator  = \Validator::make($request->all(),$rules);
                if($validator->fails())
                {
                    $messages = $validator->messages();
                    $transformed = [];
        
                    foreach ($messages->all() as $field => $message) {
                        $transformed[] = [
                            'message' => $message
                        ];
                    }
                    return response()->json([
                        'success' => 'failed',
                        'errors'  => $transformed,
                        'message' => trans('api.validation_error'),
                        'data'    => null ,
                    ]);
                }

                if($request->id){
                    $payment = Payment::find($request->id);
                }else{
                    $payment = new Payment ;
                }
                $payment->title  =  $request->title ;
                $payment->amount  =  $request->amount ;
                $payment->date  =  $request->date ;
                $payment->user_id  =  $user->id ;
                
                $payment->save();
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.save'),
                    'data' => [
                        'payment' => $payment,
                    ]
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////
// DeletePayment function by Antonious hosny
    public function DeletePayment(Request $request){
            
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();
                $rules=array(
                    'payment_id'      =>'required',
                );
                $validator  = \Validator::make($request->all(),$rules);
                if($validator->fails())
                {
                    $messages = $validator->messages();
                    $transformed = [];
        
                    foreach ($messages->all() as $field => $message) {
                        $transformed[] = [
                            'message' => $message
                        ];
                    }
                    return response()->json([
                        'success' => 'failed',
                        'errors'  => $transformed,
                        'message' => trans('api.validation_error'),
                        'data'    => null ,
                    ]);
                }

                if($request->payment_id){
                    $payment = Payment::find($request->payment_id);
                    if($payment){
                        $payment->delete();
                    }
                }
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.delete'),
                    'data' => null
                    
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////
// PaymentDetails function by Antonious hosny
    public function PaymentDetails(Request $request){
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
        
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();
                $rules=array(
                    'payment_id'      =>'required',
                );
                $validator  = \Validator::make($request->all(),$rules);
                if($validator->fails())
                {
                    $messages = $validator->messages();
                    $transformed = [];
        
                    foreach ($messages->all() as $field => $message) {
                        $transformed[] = [
                            'message' => $message
                        ];
                    }
                    return response()->json([
                        'success' => 'failed',
                        'errors'  => $transformed,
                        'message' => trans('api.validation_error'),
                        'data'    => null ,
                    ]);
                }
                $advertisementss = [];
                $i =0 ;
                $advertisements = Advertisement::where('page','box')->where('expiry_date','>',$date)->orderBy('id',"Desc")->get();
                if(sizeof($advertisements) > 0){
                    foreach($advertisements as $ads){
                        $advertisementss[$i]['image'] = asset('img/').'/'. $ads->image;
                        $advertisementss[$i]['link'] =  $ads->link;
                        $advertisementss[$i]['title'] =  $ads->title;
                        $i++;
                    }
                }

                $paymentdetailss = [];
                $i =0 ;
                $paymentdetails = PaymentDetail::where('payment_id',$request->payment_id)->orderBy('id',"Desc")->get();
                $total_amount = PaymentDetail::where('payment_id',$request->payment_id)->orderBy('id',"Desc")->sum('amount');

                if(sizeof($paymentdetails) > 0){
                    foreach($paymentdetails as $detail){
                        $paymentdetailss[$i]['id'] =  $detail->id;
                        $paymentdetailss[$i]['title'] =  $detail->title;
                        $paymentdetailss[$i]['amount'] = $detail->amount;
                        $paymentdetailss[$i]['date'] = $detail->date;
                        if($detail->image){
                            $paymentdetailss[$i]['image'] = asset('img/').'/'. $detail->image;
                        }else{
                            $paymentdetailss[$i]['image'] = null;
                        }
                        if($detail->file){
                            $paymentdetailss[$i]['file'] = asset('img/').'/'. $detail->file;
                        }else{
                            $paymentdetailss[$i]['file'] = null;
                        }
                        
                        
                        $i++;
                    }
                }
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.fetch'),
                    'data' => [
                        'advertisements' => $advertisementss,
                        'payment_details' => $paymentdetailss,
                        'total_amount'  => $total_amount ,
                    ]
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////
// AddEditPaymentDetails function by Antonious hosny
    public function AddEditPaymentDetails(Request $request){
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
        
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();
                $rules=array(
                    'amount'      =>'required',
                    'payment_id'      =>'required',
                );
                $validator  = \Validator::make($request->all(),$rules);
                if($validator->fails())
                {
                    $messages = $validator->messages();
                    $transformed = [];
        
                    foreach ($messages->all() as $field => $message) {
                        $transformed[] = [
                            'message' => $message
                        ];
                    }
                    return response()->json([
                        'success' => 'failed',
                        'errors'  => $transformed,
                        'message' => trans('api.validation_error'),
                        'data'    => null ,
                    ]);
                }

                if($request->id){
                    $payment = PaymentDetail::find($request->id);
                }else{
                    $payment = new PaymentDetail ;
                }
                $payment->title  =  $request->title ;
                $payment->amount  =  $request->amount ;
                $payment->date  =  $request->date ;
                $payment->payment_id  =  $request->payment_id ;
                $payment->user_id  =  $user->id ;
                if ($request->image){
                    $image = $request->input('image'); // image base64 encoded
                    $image = str_replace('data:image/png;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $imageName = str_random(10). time().'.'.'png';
                    \File::put(public_path(). '/img/' . $imageName, base64_decode($image));
                    $payment->image = $imageName;
                }

                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $name = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $destinationPath = public_path('/img');
                    $file->move($destinationPath, $name);
                    $payment->file   = $name;  
                }
                $payment->save();
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.save'),
                    'data' => [
                        'PaymentDetail' => $payment,
                    ]
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////
// DeletePaymentDetails function by Antonious hosny
    public function DeletePaymentDetails(Request $request){
            
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();
                $rules=array(
                    'paymentdetail_id'      =>'required',
                );
                $validator  = \Validator::make($request->all(),$rules);
                if($validator->fails())
                {
                    $messages = $validator->messages();
                    $transformed = [];
        
                    foreach ($messages->all() as $field => $message) {
                        $transformed[] = [
                            'message' => $message
                        ];
                    }
                    return response()->json([
                        'success' => 'failed',
                        'errors'  => $transformed,
                        'message' => trans('api.validation_error'),
                        'data'    => null ,
                    ]);
                }

                if($request->paymentdetail_id){
                    $payment = PaymentDetail::find($request->paymentdetail_id);
                    if($payment){
                        $payment->delete();
                    }
                }
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.delete'),
                    'data' => null
                    
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////

// Expenses function by Antonious hosny
    public function Expenses(Request $request){
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
        
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();

                $advertisementss = [];
                $i =0 ;
                $advertisements = Advertisement::where('page','box')->where('expiry_date','>',$date)->orderBy('id',"Desc")->get();
                if(sizeof($advertisements) > 0){
                    foreach($advertisements as $ads){
                        $advertisementss[$i]['image'] = asset('img/').'/'. $ads->image;
                        $advertisementss[$i]['link'] =  $ads->link;
                        $advertisementss[$i]['title'] =  $ads->title;
                        $i++;
                    }
                }

                $expensess = [];
                $i =0 ;
                $expenses = Expense::where('user_id',$user->id)->orderBy('id',"Desc")->get();
                $total_amount = Expense::where('user_id',$user->id)->orderBy('id',"Desc")->sum('amount');

                if(sizeof($expenses) > 0){
                    foreach($expenses as $expense){
                        $expensess[$i]['id'] =  $expense->id;
                        $expensess[$i]['title'] =  $expense->title;
                        $expensess[$i]['amount'] = $expense->amount;
                        if($expense->image){
                            $expensess[$i]['image'] = asset('img/').'/'. $expense->image;
                        }else{
                            $expensess[$i]['image'] = null ;
                        }
                        if($expense->file){
                            $expensess[$i]['file'] = asset('img/').'/'. $expense->file;
                        }else{
                            $expensess[$i]['file'] = null ;
                        }
                        $i++;
                    }
                }
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.fetch'),
                    'data' => [
                        'advertisements' => $advertisementss,
                        'expenses' => $expensess,
                        'total_amount' => $total_amount ,
                    ]
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////
// AddEditExpense function by Antonious hosny
    public function AddEditExpense(Request $request){
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
        
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();
                $rules=array(
                    'amount'      =>'required',
                    'title'      =>'required',
                );
                $validator  = \Validator::make($request->all(),$rules);
                if($validator->fails())
                {
                    $messages = $validator->messages();
                    $transformed = [];
        
                    foreach ($messages->all() as $field => $message) {
                        $transformed[] = [
                            'message' => $message
                        ];
                    }
                    return response()->json([
                        'success' => 'failed',
                        'errors'  => $transformed,
                        'message' => trans('api.validation_error'),
                        'data'    => null ,
                    ]);
                }

                if($request->id){
                    $expense = Expense::find($request->id);
                }else{
                    $expense = new Expense ;
                }
                $expense->title  =  $request->title ;
                $expense->amount  =  $request->amount ;
                if ($request->image){
                    $image = $request->input('image'); // image base64 encoded
                    $image = str_replace('data:image/png;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $imageName = str_random(10). time().'.'.'png';
                    \File::put(public_path(). '/img/' . $imageName, base64_decode($image));
                    $expense->image = $imageName;
                }

                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $name = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $destinationPath = public_path('/img');
                    $file->move($destinationPath, $name);
                    $expense->file   = $name;  
                }
                $expense->user_id  =  $user->id ;
                
                $expense->save();
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.save'),
                    'data' => [
                        'expense' => $expense,
                    ]
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////
// DeleteExpense function by Antonious hosny
    public function DeleteExpense(Request $request){
            
        $token = $request->token;
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        if($token){
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->lang  = $lang ;
                $user->save();
                $rules=array(
                    'expense_id'      =>'required',
                );
                $validator  = \Validator::make($request->all(),$rules);
                if($validator->fails())
                {
                    $messages = $validator->messages();
                    $transformed = [];
        
                    foreach ($messages->all() as $field => $message) {
                        $transformed[] = [
                            'message' => $message
                        ];
                    }
                    return response()->json([
                        'success' => 'failed',
                        'errors'  => $transformed,
                        'message' => trans('api.validation_error'),
                        'data'    => null ,
                    ]);
                }

                if($request->expense_id){
                    $expense = Expense::find($request->expense_id);
                    if($expense){
                        $expense->delete();
                    }
                }
                
                return response()->json([
                    'success' => 'success',
                    'errors' => null ,
                    'message' => trans('api.delete'),
                    'data' => null
                    
                ]);
            

            }else{
                return response()->json([
                    'success' => 'logged',
                    'errors' => trans('api.logout'),
                    "message"=>trans('api.logout'),
                    ]);
            }
        }else{
            return response()->json([
                'success' => 'logged',
                'errors' => trans('api.logout'),
                "message"=>trans('api.logout'),
                ]);
        }
        
    }
//////////////////////////////////////////////////
// staticPages  function by Antonious hosny
    public function StaticPages(Request $request){
        $lang = $request->header('lang');
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        $rules=array(
            'type'      =>'required',
        );
        $validator  = \Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $messages = $validator->messages();
            $transformed = [];

            foreach ($messages->all() as $field => $message) {
                $transformed[] = [
                    'message' => $message
                ];
            }
            return response()->json([
                'success' => 'failed',
                'errors'  => $transformed,
                'message' => trans('api.validation_error'),
                'data'    => null ,
            ]);
        }
        $docs = Doc::where('type',$request->type)->first();
        
        $advertisementss = [];
        $i =0 ;
        $advertisements = Advertisement::where('page','information')->where('expiry_date','>',$date)->orderBy('id',"Desc")->get();
        if(sizeof($advertisements) > 0){
            foreach($advertisements as $ads){
                $advertisementss[$i]['image'] = asset('img/').'/'. $ads->image;
                $advertisementss[$i]['link'] =  $ads->link;
                $advertisementss[$i]['title'] =  $ads->title;
                $i++;
            }
        }
        return response()->json([
            'success' => 'success',
            'errors' => null ,
            'message' => trans('api.fetch'),
            'data' => [
                'advertisements' => $advertisementss,
                'informations' => $docs,
            ] 
                
        ]);
    


    }
///////////////////////////////////////////////////

/////////////////////////////////////////////////////
// ContactUs function by Antonious hosny
    public function ContactUs(Request $request){

        $rules=array(   
            "message"=>"required",
            "title"=>"required",
            "email"=>"required|email",
            "name"=>"required",
        );

        $validator  = \Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $messages = $validator->messages();
            $transformed = [];

            foreach ($messages->all() as $field => $message) {
                $transformed[] = [
                    'message' => $message
                ];
            }
            return response()->json([
                'success' => 'failed',
                'errors'  => $transformed,
                'message' => trans('api.failed'),
                'user'    => null ,
            ]);
        }
        else{
            $contact = new ContactUs ;

            $contact->name = $request->name ;
            $contact->email = $request->email ;
            $contact->title = $request->title ;
            $contact->message = $request->message ;
            $contact->status = 'new' ;
            $contact->save();

            return response()->json([
                'success' => 'success',
                'errors' => null ,
                'message' => trans('api.save'),
                'data' => [
                    "contact" => $contact,
                    ],
            ]);
        }
        

    }
/////////////////////////////////////////////////////
// Terms and Conditions function by Antonious hosny
    public function TermsConditions(Request $request){
        $lang = $request->header('lang');
        $docs = Doc::where('type','terms')->where('status','active')->get();
        $docss =[] ;
        $i = 0 ;
        if(sizeof($docs)> 0){
            foreach($docs as $doc){
                // $docss[$i]['id'] = $doc->id ; 
                if($lang == 'ar'){
                    $docss[$i]['title'] = $doc->title_ar ; 
                    $docss[$i]['disc'] = $doc->disc_ar ; 
                }else{
                    $docss[$i]['title'] = $doc->title_en ;      
                    $docss[$i]['disc'] = $doc->disc_en ;      
                }    
                
                $i ++ ; 
            }
        }
        return response()->json([
            'success' => 'success',
            'errors' => null ,
            'message' => trans('api.fetch'),
            'data' =>  $docss,
                
        ]);
    

    }
///////////////////////////////////////////////////
// Policy function by Antonious hosny
    public function Policy(Request $request){
        $lang = $request->header('lang');
        $docs = Doc::where('type','policy')->where('status','active')->get();
        $docss =[] ;
        $i = 0 ;
        if(sizeof($docs)> 0){
            foreach($docs as $doc){
                // $docss[$i]['id'] = $doc->id ; 
                if($lang == 'ar'){
                    $docss[$i]['title'] = $doc->title_ar ; 
                    $docss[$i]['disc'] = $doc->disc_ar ; 
                }else{
                    $docss[$i]['title'] = $doc->title_en ;      
                    $docss[$i]['disc'] = $doc->disc_en ;      
                }    
                
                $i ++ ; 
            }
        }
        return response()->json([
            'success' => 'success',
            'errors' => null ,
            'message' => trans('api.fetch'),
            'data' =>  $docss,
                
        ]);


    }
///////////////////////////////////////////////////
// AboutUs function by Antonious hosny
    public function AboutUs(Request $request){
        $lang = $request->header('lang');
        $docs = Doc::where('type','about')->where('status','active')->get();
        $docss =[] ;
        $i = 0 ;
        if(sizeof($docs)> 0){
            foreach($docs as $doc){
                // $docss[$i]['id'] = $doc->id ; ي
                if($lang == 'ar'){
                    $docss[$i]['title'] = $doc->title_ar ; 
                    $docss[$i]['disc'] = $doc->disc_ar ; 
                }else{
                    $docss[$i]['title'] = $doc->title_en ;      
                    $docss[$i]['disc'] = $doc->disc_en ;      
                }    
                
                $i ++ ; 
            }
        }
        return response()->json([
            'success' => 'success',
            'errors' => null ,
            'message' => trans('api.fetch'),
            'data' =>  $docss,
                
        ]);


    }
///////////////////////////////////////////////////
// AboutUs function by Antonious hosny
    public function SocialContacts(Request $request){
        $lang = $request->header('lang');
        $contacts= Contact::first();
        if($contacts){
            return response()->json([
                'success' => 'success',
                'errors' => null ,
                'message' => trans('api.fetch'),
                'data' =>  $contacts,
                    
            ]);
        }else{
            return response()->json([
                'success' => 'failed',
                'errors' => null ,
                'message' => trans('api.notfound'),
                'data' =>  null,
                    
            ]);
        }
        


    }
///////////////////////////////////////////////////
// count_notification function by Antonious hosny
    public function count_notification(Request $request){
        $lang = $request->header('lang');
        date_default_timezone_set('Africa/Cairo');
        $token = $request->token;
        // return $token ;
        if($token == ''){
            $errors =  trans('api.logged_out');
            
            return response()->json([
                'success' => 'logged',
                'errors' => $errors ,
                'message' => trans('api.logged_out'),
                'count' => null,
            ]);
        }
        $user = User::where('remember_token',$token)->first();
        // $user->notify(new Notifications());
        // return $user ;
        if($user){
            $user->lang  = $lang ;
            $user->save();
            $count = count($user->unreadnotifications) ;
            // return $count ;
            return response()->json([
                'success' => 'success',
                'errors' => null ,
                'message' => trans('api.fetch'),
                'count' => $count ,
            ]);
        }
        else{
            $errors[] = [
                'message' => trans('api.logged_out')
            ]; 
            return response()->json([
                'success' => 'logged',
                'errors' => $errors ,
                'message' => trans('api.logged_out'),
                'count' => null,
            ]);
        }

    }
/////////////////////////////////////////////////////////
// get_notification function by Antonious hosny
    public function get_notification(Request $request){
        date_default_timezone_set('Africa/Cairo');
        $token = $request->token;
        if($token == ''){
            $errors = trans('api.logged_out');
        
            return response()->json([
                'success' => 'failed',
                'errors' => $errors ,
                'message' => trans('api.logged_out'),
                'notifications' => null,
            ]);
        }
        $user = User::where('remember_token',$token)->first();
        // $user->notify(new Notifications());
        // return $user ;
        if($user){
            $notifications = $user->notifications->take(25)  ;
            foreach($user->unreadnotifications as $note){
                $note->markAsRead();
            }
            // return $count ;
    
            return response()->json([
                'success' => 'success',
                'errors' => null ,
                'message' => trans('api.fetch'),
                'notifications' => $notifications ,
            ]);
        }
        else{
            $errors = trans('api.logged_out');
        
            return response()->json([
                'success' => 'failed',
                'errors' => $errors ,
                'message' => trans('api.logged_out'),
                'notifications' => null,
            ]);
        }

    }
/////////////////////////////////////////////////////////




////////////////////////////////////////////for test only //////////////////////////////////
// for test send_notifications
    public function send_notifications(Request $request){
        // $request->device_id;
            $rules=array(
                        'device_id'          => 'required',
                    );
                        $Messages = [
                    ];
                    //check the validator true or not
                    $validator  = Validator::make($request->all(),$rules,$Messages);
        $device_id = $request->device_id;
        // $msg = "you have message from backend";
        // $title = "test";
        
        $msg =  [
            'en' => "New user registered"  ,
            'ar' => "  مستخدم جديد قام بالتسجيل"  ,
        ];
        $title = [
            'en' =>  "New user registered"  ,
            'ar' => "  مستخدم جديد قام بالتسجيل"  ,  
        ];
        $this->notification($device_id,$title,$msg);
        
        return response()->json([
            'message' => 'done'
        ]);

    }
////////////////////////////////////////////////////////
// for test send_notifications
    public function webnotifications(Request $request){
        // $request->device_id;
            $rules=array(
                        'device_id'          => 'required',
                    );
            $Messages = [
                    ];
                    //check the validator true or not
        $validator  = Validator::make($request->all(),$rules,$Messages);
        $device_id = $request->device_id;
        // $msg = "you have message from backend";
        // $title = "test";
        
        // $msg =  'لديك طلب جديد من '  ;

        // $title = 'طلب جديد';
        $type = "order" ;

        $msg =  [
            'en' => "New user registered"  ,
            'ar' => "  مستخدم جديد قام بالتسجيل"  ,
        ];
        $title = [
            'en' =>  "New user registered"  ,
            'ar' => "  مستخدم جديد قام بالتسجيل"  ,  
        ];
        $this->webnotification($device_id,$title,$msg, $type);
        
        return response()->json([
            'message' => 'done'
        ]);

    }

////////////////////////////////////////////////////////
   
}
