<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\User;
use App\Country;
use App\Category;

use Auth;
use App;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    
        // if(Auth::user()->role != 'admin' ){
        //     return view('unauthorized',compact('role','admin'));
        // }
        
    }
    public function index()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'users';
        $users = User::where('role','user')->orderBy('id', 'DESC')->get();
 
        return view('users.index',compact('users','countries','cities','title','lang'));

    }

    public function changestatus($id)
    {
            $title =  'users' ;
            $user = User::where('id',$id)->first();
            if($user){
                if($user->status == 'active'){
                    $user->status = 'not_active' ;
                }
                else{
                    $user->status = 'active' ;                    
                }
                $user->save();
            }
            return redirect()->route('users');
    }
    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
       

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
        $title = 'users';
        return view('users.add',compact('title','lang','countries','categories'));
    }
     
    public function store(Request $request)
    {
            // return $request ;
            if($request->id ){
                $rules =
                [
                    'name'  =>'required|max:190',
                    'email'  =>'nullable|email|max:190',            
                    'status'  =>'required',   
                    'mobile'  =>'required|numeric',   
                    'country_id'  =>'required',   
                ];
                
            }     
        
            else{
                $rules =
                [
                    'name'  =>'required|max:190',
                    'email'  =>'nullable|email|unique:users,email|max:190',            
                    'mobile'  =>'required|numeric|unique:users,mobile',            
                    'password'  =>'required|min:6|max:190',     
                    'status'  =>'required',    
                    'country_id'  =>'required',   

                ];
            }
            
            
             $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
            }
    
    
            // return $request ;
            if($request->id ){
                $user = User::find( $request->id );
               
              
                if($request->email != $user->email){
                    $rules =
                    [       
                        'email'  =>'required|email|unique:users,email',     
                    ];
                    $validator = \Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
                    }
                }
                
                if ($request->hasFile('image')) {
    
                    $imageName =  $user->image; 
                    \File::delete(public_path(). '/img/' . $imageName);
                }
                if($request->password){
                    $rules =
                    [
                        'password'  =>'min:6',                    
                    ];
                    $validator = \Validator::make($request->all(), $rules);
                    if ($validator->fails()){
                        return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
                    }
                    $password = \Hash::make($request->password);
                    $user->password      = $password ;
                }
                $user->update($request->all());
                //     $mobile = '965'.$user->mobile ;
                //     // return $mobile; 
                //     $body = 'تم عمل حساب جديد لك في تطبيق تبيع
                //     اسم المستخدم ' .$mobile.'
                //     كلمة السر '.$request->password.'
                //     Ios url : https://apps.apple.com/us/app/t-be3-تبيع/id1485303433?ls=1 
                //     Android url : https://play.google.com/store/apps/details?id=com.hala.tabe3'  ;
                //    $result = $this->sendWhatsappMessage($mobile, $body);
                //    return $result ; 
            }
            else{
                $user = User::create($request->all());
                $password = \Hash::make($request->password);
                $user->password      = $password ;
                $user->save();
                $mobile = '965'.$user->mobile ;
                // return $mobile; 
                $body = 'تم عمل حساب جديد لك في تطبيق تبيع
                اسم المستخدم ' .$mobile.'
                كلمة السر '.$request->password.'
                Ios url : https://apps.apple.com/us/app/t-be3-تبيع/id1485303433?ls=1 
                Android url : https://play.google.com/store/apps/details?id=com.hala.tabe3'  ;
                $this->sendWhatsappMessage($mobile, $body); $mobile = '965'.$user->mobile ;
                $body = 'اهلا بك في تطبيق تبيع الان يمكنك تسجيل الدخول بواسطة رقم الهاتف الخاص بك وكلمة المرور هي ' .$request->password ;
                $this->sendWhatsappMessage($mobile, $body);
            }         
            $lang = App::getlocale();
            $title = 'users';
            return redirect()->route('users');
        
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
        $user = User::findOrfail($id);
        $title = 'users';
        return view('users.edit',compact('title','lang','countries','categories','user'));
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
        $id = User::find( $id );
        $imageName =  $id->image; 
        \File::delete(public_path(). '/img/' . $imageName);
        $id ->delete();

        session()->flash('alert-danger', trans('admin.record_deleted'));   
        return response()->json($id);
        // return view('admin.index',compact('admins','title'));
    }

    public function deleteall(Request $request)
    {
        
        
        if($request->ids){
            foreach($request->ids as $id){
                $id = User::find($id);
                $imageName =  $id->image; 
                \File::delete(public_path(). '/img/' . $imageName);
            }
            $ids = User::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
        session()->flash('alert-danger', trans('admin.record_selected_deleted'));
        // return redirect()->route('users');
      
    }
}
