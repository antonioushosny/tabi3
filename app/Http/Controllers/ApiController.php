<?php
use Illuminate\Support\Facades\Hash;
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Http\SMSTrait;
use Intervention\Image\Facades\Image ;
use App\Area ;
use App\Advertisement ;
use App\AvailableDay;
use App\City;
use App\Contact;
use App\ContactUs;
use App\Favourite;
use App\View;
use App\Country ; 
use App\Category ; 
use App\Delegate;
use App\Location;
use App\Payment;
use App\Chat;
use App\Message;

use App\Doc;
use App\Order;
use App\SubscriptionType ; 
use App\PasswordReset ; 
use App\User;
use App\Service;
use App\Rate;
use App\Nationality;
use App\Reason;

use Carbon\Carbon;
use App\Notifications\Notifications;
use App\Notifications\SendMessages;
use Validator;

use StreamLab\StreamLabProvider\Facades\StreamLabFacades;
use App\Notifications\verify_code;
use function GuzzleHttp\json_encode;
use App\SubCategory;
use App\Notifications\Whatsapp;
use App\Notifications\Whatsapi;


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
 
    use   SMSTrait, AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    private $objuser;
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        date_default_timezone_set('Asia/Riyadh');
        $this->middleware('guest')->except('logout');
    }
    protected function SuccessResponse($message ,$data)
    {
        return response()->json([
            'success' => 1,
            'errors'=>[],
            'message' =>$message,
            'data' => $data,
        ]);
    }
    protected function FailedResponse($message ,$errors)
    {
       
        return response()->json([
            'success' => 0,
            'errors'=>$errors,
            'message' =>$message,
            'data' => null,

        ]);
    }

    protected function LoggedResponse($message )
    {
        return response()->json([
            'success' => -1,
            'errors'=>[],
            'message' =>$message,
            'data' => null,

        ]);
    }

// Countries function by Antonious hosny
    public function Countries(Request $request){ 
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        $lang = $request->header('lang');
        if($lang == 'ar'){
            $countries  = Country::where('status','active')->with('cities')->orderBy('title_ar', 'asc')->get();
        }else{
            $countries  = Country::where('status','active')->with('cities')->orderBy('title_en', 'asc')->get();
        }
            if(sizeof($countries) > 0){
                $countriess =[];
                $i = 0 ;

                foreach($countries as $country){
                    if($country){
                        $countriess[$i]['country_id']   = $country->id;
                        if($lang == 'ar'){
                            $countriess[$i]['country_name']   = $country->title_ar;
                        }else{
                            $countriess[$i]['country_name']   =  $country->title_en;
                        }
                        if($country->image){
                            $countriess[$i]['logo'] = asset('img/').'/'. $country->image;
                        }else{
                            $countriess[$i]['logo'] = null ;
                        }
                        $citiess = [] ;
                        $n  = 0 ;
                        if(sizeOf($country->cities) > 0){

                            foreach($country->cities as $city){
                                $citiess[$n]['city_id']   = $city->id;
                                if($lang == 'ar'){
                                    $citiess[$n]['city_name']   = $city->title_ar;
                                }else{
                                    $citiess[$n]['city_name']   =  $city->title_en;
                                }
                                $areass = [] ;
                                $j  = 0 ;
                                if(sizeOf($city->areas) > 0){
        
                                    foreach($city->areas as $area){
                                        $areass[$j]['area_id']   = $area->id;
                                        if($lang == 'ar'){
                                            $areass[$j]['area_name']   = $area->title_ar;
                                        }else{
                                            $areass[$j]['area_name']   =  $area->title_en;
                                        }
                                        $j ++ ;
                                
                                    }
                                }
                                $citiess[$n]['areas'] = $areass ;
                                $n ++ ;

                            }
                        }
                        $countriess[$i]['cities'] = $citiess ;
                        $i ++ ;
                    
                    }
                }

                $ads  = Advertisement::where('user_id',null)->whereDate('expiry_date','>=',$date)->with('country')->with('category')->get()  ;
                // return $ads ;
                $adds = [] ;
                $i = 0; 
                if(sizeof($ads) > 0){
                    $ad  = Advertisement::where('user_id',null)->whereDate('expiry_date','>=',$date)->with('country')->with('category')->get()->random('1') ;
                     $images = json_decode($ad[0]->images) ;
                     
                    if(sizeof($images) > 0){
                        $imagess  = [] ;
                        $n = 0; 
                        foreach($images as $image){
                            $imagess[$n]['image'] = asset('img/').'/'. $image;
                            $n ++ ;
                        }
                       
                        $adds['images'] =  $imagess ;
                      
                    }else{
                        $adds['images'] = [] ;
                    }
                    // $adds['video'] = asset('img/').'/'. $ad[0]->video ;
                    $adds['id'] = $ad[0]->id ;
                    $adds['title'] = $ad[0]->title ;
                    $adds['views'] = $ad[0]->views ;
                    $adds['favorites'] = $ad[0]->favorites ;
                    $adds['likes'] = $ad[0]->likes ;
                    
                } 
                $data['countries'] =  $countriess ;
                $data['ad']        = $adds ;
                $message = trans('api.fetch') ;
                return $this->SuccessResponse($message , $data) ;
                
            }
            else
            {
                $errors=  [];
                $message = trans('api.notfound') ;
                return $this->FailedResponse($message , $errors) ;
            
                
            }

    }
//////////////////////////////////////////////
// Categories function by Antonious hosny
    public function Categories(Request $request){ 
        $rules=array(
            "country_id"=>"required",
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
            $message = trans('api.failed') ;
            return  $this->FailedResponse($message , $transformed) ;

        }  
        $lang = $request->header('lang');
        $categories  = Category::where('status','active')->with('sub_categories')->orderBy('id', 'asc')->get();
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        // return $categories ;
        if(sizeof($categories) > 0){
            $categoriess =[];
            $i = 0 ;
            $data = [];
            foreach($categories as $category){
                if($category){
                    $star_adds  = Advertisement::where('user_id',null)->where('country_id',$request->country_id)->where('category_id',$category->id)->whereDate('expiry_date','>=',$date)->with('country')->with('category')->get();
                    $star_addss = [];
                    $j = 0; 
                    if(sizeof($star_adds) > 0){
                        foreach($star_adds as $ad){
                            $star_addss[$j]['id'] = $ad->id ;
                            $star_addss[$j]['title'] = $ad->title ;
                            $images = json_decode($ad->images) ;
                            // return  $images ;
                            if(sizeof($images) > 0){
                                $imagess  = [] ;
                                $n = 0; 
                                foreach($images as $image){
                                    $imagess[$n]['image'] = asset('img/').'/'. $image;
                                    $n ++ ;
                                }
                                $star_addss[$j]['images'] =  $imagess ;
                            }else{
                                $star_addss[$j]['images'] = [] ;
                            }
                            $star_addss[$j]['favorites'] = $ad->favorites ;
                            $star_addss[$j]['likes'] = $ad->likes ;
                            $star_addss[$j]['views'] = $ad->views ;
                            
                            $j++ ;
                        }
                    }
                    $categoriess[$i]['star_addss']   =  $star_addss;
                    $categoriess[$i]['category_id']   = $category->id;
                    if($lang == 'ar'){
                        $categoriess[$i]['category_name']   = $category->title_ar;
                    }else{
                        $categoriess[$i]['category_name']   =  $category->title_en;
                    }
                    if($category->image){
                        $categoriess[$i]['image'] = asset('img/').'/'. $category->image;
                    }else{
                        $categoriess[$i]['image'] = null ;
                    }
                    $sub_categoriess = [] ;
                    $n  = 0 ;
                    if(sizeOf($category->sub_categories) > 0){
 
                        foreach($category->sub_categories as $sub_category){
                            $sub_categoriess[$n]['sub_category_id']   = $sub_category->id;
                            if($lang == 'ar'){
                                $sub_categoriess[$n]['sub_category_name']   = $sub_category->title_ar;
                            }else{
                                $sub_categoriess[$n]['sub_category_name']   =  $sub_category->title_en;
                            }
                            if($sub_category->image){
                                $sub_categoriess[$n]['sub_category_image'] = asset('img/').'/'. $sub_category->image;
                            }else{
                                $sub_categoriess[$n]['sub_category_image'] = null ;
                            }
                                $sons_categoriess = [] ;
                            $j  = 0 ;
                            if(sizeOf($sub_category->sons_category) > 0){
    
                                foreach($sub_category->sons_category as $son_category){
                                    $sons_categoriess[$j]['son_category_id']   = $son_category->id;
                                    if($lang == 'ar'){
                                        $sons_categoriess[$j]['son_category_name']   = $son_category->title_ar;
                                    }else{
                                        $sons_categoriess[$j]['son_category_name']   =  $son_category->title_en;
                                    }
                                    if($son_category->image){
                                        $sons_categoriess[$j]['son_category_image'] = asset('img/').'/'. $son_category->image;
                                    }else{
                                        $sons_categoriess[$j]['son_category_image'] = null ;
                                    }
                                     $jh  = 0 ;
                                      $sons_categoriessa = [] ;
                                      $subcategories1 = SubCategory::where('parent_id',$son_category->id)->get() ;
                                      if(sizeof($subcategories1) > 0){
                                      foreach($subcategories1 as $son_category1){       
                                          
                                            $sons_categoriessa[$jh]['son_category_id']   = $son_category1->id;
                                            if($lang == 'ar'){
                                                $sons_categoriessa[$jh]['son_category_name']   = $son_category1->title_ar;
                                            }else{
                                                $sons_categoriessa[$jh]['son_category_name']   =  $son_category1->title_en;
                                            }
                                            if($son_category->image){
                                                $sons_categoriessa[$jh]['son_category_image'] = asset('img/').'/'. $son_category1->image;
                                            }else{
                                                $sons_categoriessa[$jh]['son_category_image'] = null ;
                                            }
                                    
                                                             $h  = 0 ;
                                            $sons_categoriessav = [] ;
                                            $subcategories12 = SubCategory::where('parent_id',$son_category1->id)->get() ;
                                            if(sizeof($subcategories12) > 0){
                                            foreach($subcategories12 as $son_category21){
                                                
                                                        $sons_categoriessav[$h]['son_category_id']   = $son_category21->id;
                                                        if($lang == 'ar'){
                                                            $sons_categoriessav[$h]['son_category_name']   = $son_category21->title_ar;
                                                        }else{
                                                            $sons_categoriessav[$h]['son_category_name']   =  $son_category21->title_en;
                                                        }
                                                        if($son_category->image){
                                                            $sons_categoriessav[$h]['son_category_image'] = asset('img/').'/'. $son_category21->image;
                                                        }else{
                                                            $sons_categoriessav[$h]['son_category_image'] = null ;
                                                        }
                                                
                                            
                                                
                                                $h ++ ;
                                        
                                            }
                                
                                    
                                   
                                        }
                             
                                     $sons_categoriessa[$jh]['sons_categories'] = $sons_categoriessav ;
                                    
                                   
                                    
                                    $jh ++ ;
                            
                                }
                                
                                    
                                   
                            }
                             
                                     $sons_categoriess[$j]['sons_categories'] = $sons_categoriessa ;
                                    $j ++ ;
                            
                                }
                            }
                            $sub_categoriess[$n]['sons_categories'] = $sons_categoriess ;
                            $n ++ ;

                        }
                    }
                    $categoriess[$i]['sub_categories'] = $sub_categoriess ;
                    $i ++ ;

                }
            }

            $ads  = Advertisement::where('user_id',null)->where('country_id',$request->country_id)->whereDate('expiry_date','>=',$date)->with('category')->get()  ;

            $adds = [];
            $i = 0; 
            if(sizeof($ads) > 0){
                foreach($ads as $ad){
                    $adds[$i]['id'] = $ad->id ;
                    $adds[$i]['title'] = $ad->title ;
                    $images = json_decode($ad->images) ;
                    // return  $images ;
                    if(sizeof($images) > 0){
                        $imagess  = [] ;
                        $n = 0; 
                        foreach($images as $image){
                            $imagess[$n]['image'] = asset('img/').'/'. $image;
                            $n ++ ;
                        }
                        $adds[$i]['images'] =  $imagess ;
                    }else{
                        $adds[$i]['images'] = [] ;
                    }

                    $i++ ;
                }
            }

            $install_ads  = Advertisement::where('country_id',$request->country_id)->where('install','1')->whereDate('expiry_date','>=',$date)->with('country')->with('city')->with('area')->with('category')->with('subcategory')->get()  ;
            $install_adss = [];
            $i = 0; 
            if(sizeof($install_ads) > 0){
                foreach($install_ads as $ad){
                    $install_adss[$i]['id'] = $ad->id ;
                    $install_adss[$i]['title'] = $ad->title ;
                    $images = json_decode($ad->images) ;
                    // return  $images ;
                    if(sizeof($images) > 0){
                        $imagess  = [] ;
                        $n = 0; 
                        foreach($images as $image){
                            $imagess[$n]['image'] = asset('img/').'/'. $image;
                            $n ++ ;
                        }
                        $install_adss[$i]['images'] =  $imagess ;
                    }else{
                        $install_adss[$i]['images'] = [] ;
                    }
                    $install_adss[$i]['favorites'] = $ad->favorites ;
                    $install_adss[$i]['views'] = $ad->views ;
                    $install_adss[$i]['likes'] = $ad->likes ;
                    
                    
                    $i++ ;
                }
            }
          
            $star_adds  = Advertisement::where('country_id',$request->country_id)->where('star','1')->whereDate('expiry_date','>=',$date)->with('country')->with('city')->with('area')->with('category')->with('subcategory')->get()  ;
            $star_addss = [];
            $i = 0; 
            if(sizeof($star_adds) > 0){
                foreach($star_adds as $ad){
                    $star_addss[$i]['id'] = $ad->id ;
                    $star_addss[$i]['title'] = $ad->title ;
                    $images = json_decode($ad->images) ;
                    // return  $images ;
                    if(sizeof($images) > 0){
                        $imagess  = [] ;
                        $n = 0; 
                        foreach($images as $image){
                            $imagess[$n]['image'] = asset('img/').'/'. $image;
                            $n ++ ;
                        }
                        $star_addss[$i]['images'] =  $imagess ;
                    }else{
                        $star_addss[$i]['images'] = [] ;
                    }
                    $star_addss[$i]['favorites'] = $ad->favorites ;
                    $star_addss[$i]['views'] = $ad->views ;
                    $star_addss[$i]['likes'] = $ad->likes ;
                    
                    $i++ ;
                }
            }

            $data['all_adss'] = $adds ;
            $data['install_adss'] = $install_adss ;
            $data['star_addss'] = $star_addss ;
            $data['categories'] = $categoriess ;
            $message = trans('api.fetch') ;
            return $this->SuccessResponse($message , $data) ;
            
        }
        else
        {
            $errors=  [];
            $message = trans('api.notfound') ;
            return $this->FailedResponse($message , $errors) ;
        
            
        }

    }
//////////////////////////////////////////////
// Categories function by Antonious hosny
    public function SonCategories(Request $request){ 
        $rules=array(
            "country_id"=>"required",
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
            $message = trans('api.failed') ;
            return  $this->FailedResponse($message , $transformed) ;

        }  
        $lang = $request->header('lang');
        $categories  = Category::where('status','active')->with('sub_categories')->orderBy('id', 'asc')->get();
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        // return $categories ;
        if(sizeof($categories) > 0){
    
            $sons_categoriess = [] ;
            $i = 0 ;
            $data = [];
            foreach($categories as $category){
                if($category){
                    if(sizeOf($category->sub_categories) > 0){
                        foreach($category->sub_categories as $sub_category){
                            if(sizeOf($sub_category->sons_category) > 0){
                                foreach($sub_category->sons_category as $son_category){
                                    $subcategories1 = SubCategory::where('parent_id',$son_category->id)->get() ;
                                    if(sizeof($subcategories1) > 0){
                                        foreach($subcategories1 as $son_category1){       
                                            $subcategories12 = SubCategory::where('parent_id',$son_category1->id)->get() ;
                                            if(sizeof($subcategories12) > 0){
                                                foreach($subcategories12 as $son_category21){
                                                
                                                    $sons_categoriess[$i]['son_category_id']   = $son_category21->id;
                                                    if($lang == 'ar'){
                                                        $sons_categoriess[$i]['son_category_name']   = $son_category21->title_ar;
                                                    }else{
                                                        $sons_categoriess[$i]['son_category_name']   =  $son_category21->title_en;
                                                    }
                                                    if($son_category21->image){
                                                        $sons_categoriess[$i]['son_category_image'] = asset('img/').'/'. $son_category21->image;
                                                    }else{
                                                        $sons_categoriess[$i]['son_category_image'] = null ;
                                                    }
                                                    $i ++ ;
                                                    
                                                }

                                            }else{
                                                $sons_categoriess[$i]['son_category_id']   = $son_category1->id;
                                                if($lang == 'ar'){
                                                    $sons_categoriess[$i]['son_category_name']   = $son_category1->title_ar;
                                                }else{
                                                    $sons_categoriess[$i]['son_category_name']   =  $son_category1->title_en;
                                                }
                                                if($son_category1->image){
                                                    $sons_categoriess[$i]['son_category_image'] = asset('img/').'/'. $son_category1->image;
                                                }else{
                                                    $sons_categoriess[$i]['son_category_image'] = null ;
                                                }
                                                $i ++ ;
                                            }
                            
                                        }

                                    }else{
                                        $sons_categoriess[$i]['son_category_id']   = $son_category->id;
                                        if($lang == 'ar'){
                                            $sons_categoriess[$i]['son_category_name']   = $son_category->title_ar;
                                        }else{
                                            $sons_categoriess[$i]['son_category_name']   =  $son_category->title_en;
                                        }
                                        if($son_category->image){
                                            $sons_categoriess[$i]['son_category_image'] = asset('img/').'/'. $son_category->image;
                                        }else{
                                            $sons_categoriess[$i]['son_category_image'] = null ;
                                        }
                                        $i ++ ;
                                    }
                            
                                }
                            }else{
                                $sons_categoriess[$i]['son_category_id']   = $sub_category->id;
                                if($lang == 'ar'){
                                    $sons_categoriess[$i]['son_category_name']   = $sub_category->title_ar;
                                }else{
                                    $sons_categoriess[$i]['son_category_name']   =  $sub_category->title_en;
                                }
                                if($sub_category->image){
                                    $sons_categoriess[$i]['son_category_image'] = asset('img/').'/'. $sub_category->image;
                                }else{
                                    $sons_categoriess[$i]['son_category_image'] = null ;
                                }
                                $i ++ ;
                            }


                        }
                    }
                }
            }

            $data['sons_categories'] = $sons_categoriess ;
            $message = trans('api.fetch') ;
            return $this->SuccessResponse($message , $data) ;
            
        }
        else
        {
            $errors=  [];
            $message = trans('api.notfound') ;
            return $this->FailedResponse($message , $errors) ;
        
            
        }

    }
//////////////////////////////////////////////
// Delegates function by Antonious hosny
    public function Delegates(Request $request){

        $lang = $request->header('lang');


        $delegates = Delegate::where('status','active')->with('locations')->orderBy('id', 'desc')->get();
        $locations = Location::where('status','active')->orderBy('id', 'desc')->get();
        //  return $delegates ;
        $delegatess = [] ;
        $i =0 ;
        if(sizeof($delegates) > 0 ){
            foreach($delegates as $delegate){
                
                // $servicess[$i]['service_id'] = $delegate->id ;    
                $delegatess[$i]['name'] = $delegate->name ; 
                $delegatess[$i]['mobile'] = $delegate->mobile ; 
                 
                if($delegate->image){
                    $delegatess[$i]['image'] = asset('img/').'/'. $delegate->image;
                }else{
                    $delegatess[$i]['image'] = null ;
                }
                $delegatelocations = [] ;
                $n =0 ;
                if($delegate->locations && sizeof($delegate->locations) > 0){
                    foreach($delegate->locations as $location){
                        $delegatelocations[$n]['location_id'] = $location->id ;
                        if($lang == 'ar'){
                            $delegatelocations[$n]['title'] = $location->title_ar ;
                        }else{
                            $delegatelocations[$n]['title'] = $location->title_en ;
                        }
                        $n ++ ;
                       
                    }
                    
                }
                $delegatess[$i]['delegatelocations'] = $delegatelocations ;
                $i ++ ;                    
                
            }
        }
        $locationss = [] ;
        $n =0 ;
        if( sizeof($locations) > 0){
            foreach($locations as $location){
                $locationss[$n]['location_id'] = $location->id ;
                if($lang == 'ar'){
                    $locationss[$n]['title'] = $location->title_ar ;
                }else{
                    $locationss[$n]['title'] = $location->title_en ;
                }
                $n ++ ;
               
            }
            
        }
        $data['delegatess'] = $delegatess ;
        $data['locations'] = $locationss ;
        $message = trans('api.fetch') ;
        return  $this->SuccessResponse($message,$data ) ;
                
            


    }
//////////////////////////////////////////////////
// Features function by Antonious hosny
    public function Features(Request $request){

        $lang = $request->header('lang');


        $install_ad = Doc::where('type','install')->first();
        $star_ad = Doc::where('type','star')->first();
        $uploade_video = Doc::where('type','uploade_video')->first();
        //  return $delegates ;
        $Featuress = [] ;
        if($lang == 'ar'){

            $Featuress['install_ad_title'] = $install_ad->title_ar ; 
            $Featuress['install_ad_cost'] = $install_ad->disc_ar ; 
            $Featuress['star_ad_title'] = $star_ad->title_ar ; 
            $Featuress['star_ad_cost'] = $star_ad->disc_ar ; 
            $Featuress['uploade_video_title'] = $uploade_video->title_ar ; 
            $Featuress['uploade_video_cost'] = $uploade_video->disc_ar ; 
        }else{
            $Featuress['install_ad_title'] = $install_ad->title_en ; 
            $Featuress['install_ad_cost'] = $install_ad->disc_ar ; 
            $Featuress['star_ad_title'] = $star_ad->title_en ; 
            $Featuress['star_ad_cost'] = $star_ad->disc_ar ; 
            $Featuress['uploade_video_title'] = $uploade_video->title_en ; 
            $Featuress['uploade_video_cost'] = $uploade_video->disc_ar ;
        }
            
        $data['Features'] = $Featuress ;
        $message = trans('api.fetch') ;
        return  $this->SuccessResponse($message,$data ) ;

    }
//////////////////////////////////////////////////
// IsRegistered function by Antonious hosny
    public function IsRegistered(Request $request){ 
        $rules=array(
            "mobile"=>"required",
            // "mobile_code"=>"required",
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
            $message = trans('api.failed_login') ;
            return   $this->FailedResponse($message , $transformed) ;
            
        }
        $user  = User::where('mobile',$request->mobile)->where('role','<>','admin')->orderBy('id', 'desc')->first();

        if($user){
            $code = rand(100000,999999);
            $UserCode = PasswordReset::where('email',$request->mobile)->first();
            $this->sms([$request->mobile], "The Code To Verify mobile Is $code");
            if(!$UserCode){
                $UserCode = new PasswordReset ;
            }
            $UserCode->email = $request->mobile ;
            $UserCode->token = $code ;
            $UserCode->save();
            $data['code'] = $code ;
            $data['IsRegistered'] = 1 ;
            $message = trans('api.send_code') ;
            return $this->SuccessResponse($message , $data) ;
        
        }
        else
        {
            $code = rand(100000,999999);
            $UserCode = PasswordReset::where('email',$request->mobile)->first();
            if(!$UserCode){
                $UserCode = new PasswordReset ;
            }
            $UserCode->email = $request->mobile ;
            $UserCode->token = $code ;
            $UserCode->save();
            $data['code'] = $code ;
            $data['IsRegistered'] = 0 ;

            $message = trans('api.mobile_notfound') ;
            return $this->SuccessResponse($message , $data) ;

        }


    }
//////////////////////////////////////////////
// SendCode function by Antonious hosny
    public function SendCode(Request $request){ 
        $rules=array(
            "mobile"=>"required",
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
            $message = trans('api.failed_login') ;
            return   $this->FailedResponse($message , $transformed) ;
            
        }
        $code = rand(100000,999999);
        $UserCode = PasswordReset::where('email',$request->mobile)->first();
        $this->sms([$request->mobile], "The Code To Verify mobile Is $code");
        if(!$UserCode){
            $UserCode = new PasswordReset ;
        }
        $UserCode->email = $request->mobile ;
        $UserCode->token = $code ;
        $UserCode->save();

        $message = trans('api.send_code') ;
        return $this->SuccessResponse($message , $code) ;
        



    }
//////////////////////////////////////////////
// register function by Antonious hosny
    public function Register(Request $request) {
        // return $request;
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        $lang = $request->header('lang');
        // $this->validateLogin($request);
        $rules=array(   
            "name"=>"required",
            "email"=>"required|unique:users,email",
            "mobile"=>"required|between:8,11|unique:users,mobile", 
            "mobile_code"=>"required",
            "code"=>"required",
            "password"=>"required",
            // "address"=>"required",
            // "desc"=>"required",
            // "lat"=>"required",
            // "lng"=>"required",
            "gender"=>"required",
            "country_id"=>"required",
            "device_id"=>"required",
            "device_type"=>"required",
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

            $errors = [] ;
            $message = trans('api.failed_registered') ;
            return  $this->FailedResponse($message , $transformed) ;
        
            
        } 
        $UserCode = PasswordReset::where('email',$request->mobile)->first();
        if (  $UserCode && $request->code == $UserCode->token) {
            
            $user = new User;
            $password = \Hash::make($request->password);
            $user->password      = $password ;

            $user->name          = $request->name ;
            $user->mobile_code   = $request->mobile_code ;
            $user->email         = $request->email ;
            $user->mobile        = $request->mobile ;
            $user->address       = $request->address ;
            $user->lat           = $request->lat ;
            $user->lng           = $request->lng ;
            $user->gender        = $request->gender ;
            $user->wallet        = 3 ;
            $user->status        = 'active';
            $user->role          = 'user' ;
            $user->device_token  = $request->device_id ;
            $user->desc  = $request->desc ;
            $user->type          = $request->type ;
            
            if(Country::find($request->country_id)){
                $user->country_id = $request->country_id ;
            }
            $user->available = 1 ;
            $user->save();
            $user->generateToken();
 
            $UserCode->delete() ;
            // $msg1 = "  مستخدم جديد قام بالتسجيل" ;
            $type = "user";
            // $title1 = "  مستخدم جديد قام بالتسجيل" ;
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
            
            $user =  User::where('id',$user->id)->first();
            $users = [] ;
            if($user){
                $users['id']        = $user->id ;
                $users['name']      = $user->name ;
                $users['email']     = $user->email ;
                $users['mobile']    = $user->mobile ;
                $users['mobileCode']= $user->mobile_code ;
                $users['address']   = $user->address ;
                $users['gender']   = $user->gender ;
                if($user->country){
                    $users['country_id']        = $user->country->id ;
                    if($lang == 'ar'){
                        $users['country_name']  = $user->country->title_ar;
                    }else{
                        $users['country_name']  = $user->country->title_en;
                    }
                }else{
                    $users['country_id']        = null ;
                    $users['country_name']      =  null;
                }
                
                $users['lat']                   = $user->lat ;
                $users['lng']                   = $user->lng ;
                $users['desc']                  = $user->desc ;
                $users['created_at']                  = $user->created_at->format('Y-m-d') ;
                // $users['role'] = $user->role ;
                $users['remember_token']        = $user->remember_token ;
                if($user->image){
                    $users['image']             = asset('img/').'/'. $user->image;
                }
                else {
                    $users['image']             = null;
                }

                
            }
            $message = trans('api.success_registered') ;
            return  $this->SuccessResponse($message , $users) ;
        
        } 
        else
        {
            // $errors[] =[
            //     'message' => trans('api.code_failed')
            // ];
            $errors = [] ;
            $message = trans('api.code_failed') ;
            return  $this->FailedResponse($message , $errors) ;
        }
        
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
            "device_id"=>"required",
            // "role"=>"required",
            "device_type" => "required",  // 1 for ios , 0 for android  
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
            $message = trans('api.failed_login') ;
            return  $this->FailedResponse($message , $transformed) ;
 
        }

        $user = User::where('mobile',$request->mobile)->first();
        // return $user;
        if(!$user){
 
            $errors = [] ;
            $message = trans('api.mobile_notfound') ;
            return  $this->FailedResponse($message , $errors) ;
 
        }
        else{
            if($user->password == null || $user->password == ''){
                $errors = [] ;
                $message = trans('api.activate_account') ;
                return  $this->FailedResponse($message , $errors) ;
            }
            if (\Hash::check( $request->password,$user->password)) {
                if($user->status == 'not_active'||$user->role == 'admin'){
                    $errors = [] ;
                    $message = trans('api.allowed') ;
                    return  $this->FailedResponse($message , $errors) ;
                        
                }
                $user->generateToken();
                $user->device_token = $request->device_id ;
                $user->type = $request->device_type ;
                // $user->code = '' ;/
                // $user->available = '1';

                $user->save();
                $user =  User::where('id',$user->id)->first();
                $users = [] ;
                if($user){
                    $users['id'] = $user->id ;
                    $users['name'] = $user->name ;
                    $users['email'] = $user->email ;
                    $users['mobile'] = $user->mobile ;
                    $users['mobileCode'] = $user->mobile_code ;
                    $users['address'] = $user->address ;
                    $users['gender']   = $user->gender ;

                    if($user->country){
                        $users['country_id'] = $user->country->id ;
                        if($lang == 'ar'){
                            $users['country_name']   = $user->country->title_ar;
                        }else{
                            $users['country_name']   = $user->country->title_en;
                        }
                    }else{
                        $users['country_id'] = null ;
                        $users['country_name']   =  null;
                    }
                 
                    $users['lat'] = $user->lat ;
                    $users['lng'] = $user->lng ;
                    // $users['role'] = $user->role ;
                    $users['desc'] = $user->desc ;
                    $users['created_at']  = $user->created_at->format('Y-m-d') ;
                    $users['remember_token'] = $user->remember_token ;
                    if($user->image){
                        $users['image'] = asset('img/').'/'. $user->image;
                    }
                    else {
                        $users['image'] = null;
                    }

                    
                }
                $message = trans('api.login') ;
                return  $this->SuccessResponse($message , $users) ;
            }
            else
            {
                // $errors[] =[
                //     'message' => trans('api.code_failed')
                // ];
                $errors = [] ;
                $message = trans('api.code_failed') ;
                return  $this->FailedResponse($message , $errors) ;
            }
  
        }

    }
//////////////////////////////////////////////
// editprofile function by Antonious hosny
    public function EditProfile(Request $request){
        // return $request ;
        $lang = $request->header('lang');
        $token = $request->header('token');
        if($token == ''){
 
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
           
        }  
        $user = User::where('remember_token',$token)->first();
        if($user){      
            $rules=array(  
                "name"=>"min:3",
                "email"=> 'email',
                "image" => 'file',
            );
            $user = User::where('id',$user->id)->first();
            if($request->mobile){
                if( $request->mobile != $user->mobile){
                    $rules['mobile'] = 'between:8,11|unique:users,mobile';
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
                $message = trans('api.failed') ;
                return  $this->FailedResponse($message , $transformed) ;
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
            
            if($request->lat){
                $user->lat           = $request->lat ;
            }
            if($request->lng){
                $user->lng           = $request->lng ;
            }
            if($request->address){
                $user->address           = $request->address ;
            }
            if($request->gender){
                $user->gender           = $request->gender ;
            }
            if($request->desc){
                $user->desc           = $request->desc ;
            }
            if($request->country_id){
                $user->country_id           = $request->country_id ;
            }
             
            
            // if ($request->profile_pic){
            //     $image = $request->input('profile_pic'); // image base64 encoded
            //     $image = str_replace('data:image/png;base64,', '', $image);
            //     $image = str_replace(' ', '+', $image);
            //     $imageName = str_random(10). time().'.'.'png';
            //     \File::put(public_path(). '/img/' . $imageName, base64_decode($image));
            //     $user->image = $imageName;
            // }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
                $destinationPath = public_path('/img');
                $image->move($destinationPath, $name);
                $user->image   = $name;  
            }
            $user->save();
     
            $user =  User::where('id',$user->id)->first();
            $users = [] ;
            if($user){
                $users['id'] = $user->id ;
                $users['name'] = $user->name ;
                $users['email'] = $user->email ;
                $users['mobile'] = $user->mobile ;
                $users['mobileCode'] = $user->mobile_code ;
                $users['address'] = $user->address ;
                $users['gender']   = $user->gender ;

                if($user->country){
                    $users['country_id'] = $user->country->id ;
                    if($lang == 'ar'){
                        $users['country_name']   = $user->country->title_ar;
                    }else{
                        $users['country_name']   = $user->country->title_en;
                    }
                }else{
                    $users['country_id'] = null ;
                    $users['country_name']   =  null;
                }
             
                $users['lat'] = $user->lat ;
                $users['lng'] = $user->lng ;
                // $users['role'] = $user->role ;
                $users['desc'] = $user->desc ;
                $users['remember_token'] = $user->remember_token ;
                if($user->image){
                    $users['image'] = asset('img/').'/'. $user->image;
                }
                else {
                    $users['image'] = null;
                }

                
            }
            $message = trans('api.save') ;
            return  $this->SuccessResponse($message , $users) ;

        }
        else{
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }

    }
///////////////////////////////////////////////////
// UploadeMedia function by Antonious hosny
    public function UploadeMedia(Request $request){
        // return $request ;
        // $lang = $request->header('lang');
        // $token = $request->header('token');
        // if($token == ''){

        //     $message = trans('api.logged_out') ;
        //     return  $this->LoggedResponse($message ) ;
        
        // }  
        // $user = User::where('remember_token',$token)->first();
        // if($user){      
            $rules=array(  
                "media" => 'required|file',
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
                $message = trans('api.failed') ;
                return  $this->FailedResponse($message , $transformed) ;
            }
  
            if ($request->hasFile('media')) {
                $media = $request->file('media');
          
                $name = md5($media->getClientOriginalName() . time()) . "." . $media->getClientOriginalExtension();
                $destinationPath = public_path('/img');
                $media->move($destinationPath, $name);
                // return $media->getClientOriginalExtension() ;
                $extensions = ["jpg" , "jpeg" ,"png","gif","svg","bmp"]; // all extension type for images
                if (in_array($media->getClientOriginalExtension() , $extensions)){
                    $img = Image::make(public_path('img/'.$name));
                    $img->insert(public_path('images/watermarck-100.png'), 'bottom-right', 5, 5);
                    $img->save(public_path('img/'. $name)); 
                    // dd('saved image successfully.');
                }
                // dd('saved image successfully.');
              
                $data['name'] = $name ;
                $data['link'] = asset('img/').'/'. $name ;
                $message = trans('api.save') ;
                return  $this->SuccessResponse($message , $data) ;
            }
            $errors = [] ;
            $message = trans('api.failed') ;
            return  $this->FailedResponse($message , $errors) ;
        // }
        // else{
        //     $message = trans('api.logged_out') ;
        //     return  $this->LoggedResponse($message ) ;
        // }

    }
///////////////////////////////////////////////////
// logout function by Antonious hosny
    public function Logout(Request $request){
        $token = $request->header('token');
        
        $token = $request->header('token');
        if($token == ''){
 
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
           
        }  
        // $token = $request->header('access_token');
        $user = User::where('remember_token',$token)->first();
        if ($user) {
            $user->remember_token = null;
            $user->device_token = null;
             $user->save();
            
            $message = trans('api.logout') ;
            return  $this->SuccessResponse($message , $user) ;
          
        }else{
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }

    }
//////////////////////////////////////////////////
// MakeAds function by Antonious hosny
    public function MakeAds(Request $request){
        
        $rules=array(
            "title"=>"required",
            "cost"=>"required",
            "images"=>"required",
            // "video"=>"required",
            "allow_messages"=>"required",
            "allow_call"=>"required",
            "without_number"=>"required",
            "republish"=>"required",
            "not_disturb"=>"required",
            "numbers"=>"required",
            "lat"=>"required",
            "lng"=>"required",
            "star"=>"required",
            "address"=>"required",
            // "status"=>"required",
            "category_id"=>"required",
            "sub_id"=>"required",
            "country_id"=>"required",
            "city_id"=>"required",
            "area_id"=>"required",
            // "from"=>"required",
            // "to"=>"required",
            // "disc"=>"required",
            "cost_advertising" => "required",
            "cost_benefits" => "required",
            "total" => "required",
        );
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        // return $date ;
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
            $message = trans('api.failed') ;
            return  $this->FailedResponse($message , $transformed) ;
        }

        $token = $request->header('token');
        $lang = $request->header('lang');
        $category = Category::where('id',$request->category_id)->first();
        $new_date =  $date  ;
         if($category){
            $new_date = strtotime($category->days."day", strtotime($date));
            $new_date =date("Y-m-d", $new_date); 
        }else{
            $transformed['message']  = trans('api.category_notfound') ;
            $message = trans('api.failed') ;
            return  $this->FailedResponse($message , $transformed) ;
        }
        // return  $request  ; 
        if($token){
            $user = User::where('remember_token',$token)->first();
            if($user){
                // return $user ;
                if($user->wallet >= $request->total){
                    $ads = New Advertisement ;
                    $ads->user_id = $user->id ;
                    $ads->title = $request->title ;
                    $ads->cost = $request->cost  ;
                    $ads->lat = $request->lat ;
                    $ads->lng = $request->lng ;
                    $ads->address = $request->address ;
                    $ads->allow_messages = $request->allow_messages ;
                    $ads->allow_call = $request->allow_call ;
                    $ads->without_number = $request->without_number ;
                    $ads->republish = $request->republish ;
                    $ads->not_disturb = $request->not_disturb ;
                    $ads->numbers = $request->numbers ;
                    $ads->star = $request->star ;
                    $ads->install = $request->install ;
                    $ads->category_id = $request->category_id ;
                    $ads->sub_id = $request->sub_id ;
                    $ads->country_id = $request->country_id ;
                    $ads->city_id = $request->city_id ;
                    $ads->area_id = $request->area_id ;
                    $ads->from = $request->from ;
                    $ads->to = $request->to ;
                    $ads->cost_advertising = $request->cost_advertising ;
                    $ads->cost_benefits = $request->cost_benefits ;
                    $ads->total = $request->total ;
                    $ads->disc = $request->disc ;
                    $ads->expiry_date = $new_date ;
                    $ads->images = $request->images;
                    $ads->video = $request->video ;
                    $ads->views = 0 ;
                    $ads->favorites = 0 ;
                    $ads->likes = 0 ;
                    $ads->status  = 'not_active' ;
                    $ads->save() ;
                    $user->wallet = $user->wallet - $request->total ;
                    $user->save();
                    $type = "ads";
                    // $msg =  [
                    //     'en' => "    new Ad from " . $user->name ." Ad number ". $ads->id  , 
                    //     'ar' =>  "  اعلان جديد  من " . $user->name ."  رقم الاعلان ". $ads->id,
                    // ];
                
                    // $admins = User::where('role', 'admin')->get(); 
                    // foreach($admins as $admin){
                    //     $admin->notify(new Notifications($msg,$type ));
                    //     $device_token = $admin->device_token ;
                    //     if($device_token){
                    //         $this->webnotification($device_token,$msg,$msg,$type);
                    //     }
                    // }
                    
                    $data['ads'] = $ads ;
                    $message = trans('api.savead')  ;
                    return  $this->SuccessResponse($message,$data ) ;
                }else{
                    $message = trans('api.failed') ;
                    $errors['message'] = trans('api.balance_is_not_enough') ;
                    return  $this->FailedResponse($message , $errors) ;
                }
                
            }else{
                $message = trans('api.logged_out') ;
                return  $this->LoggedResponse($message ) ;
            }
            
        }else{
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }


    }
//////////////////////////////////////////////////
// Favorite function by Antonious hosny
    public function Favorite(Request $request){

        $rules=array(
            "ad_id"=>"required"
        );
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        // return $date ;
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
            $message = trans('api.failed') ;
            return  $this->FailedResponse($message , $transformed) ;
        }

        $token = $request->header('token');
        $lang = $request->header('lang');

        if($token){
            $user = User::where('remember_token',$token)->first();
            if($user){
                // return $user ;
                $data['isFavorite'] = 0;
                $ad = Advertisement::where('id',$request->ad_id)->first();
                $favorite = Favourite::where('user_id',$user->id)->where('ad_id',$ad->id)->first();
                if($favorite){
                    $favorite->delete() ;
                    $data['isFavorite'] = 0 ;
                    $ad->favorites -= 1 ;
                    $ad->save();

                }else{
                    $favorite = new Favourite ;
                    $favorite->user_id = $user->id ;
                    $favorite->ad_id = $ad->id ;
                    $favorite->save() ;
                    $ad->favorites += 1 ;
                    $ad->save() ;
                    $data['isFavorite'] = 1 ;
 
                }
                $message = trans('api.save') ;
                return  $this->SuccessResponse($message,$data ) ;
                
            }else{
                $message = trans('api.logged_out') ;
                return  $this->LoggedResponse($message ) ;
            }
            
        }else{
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }


    }
//////////////////////////////////////////////////
// MyFavorites function by Antonious hosny
    public function MyFavorites(Request $request){
      
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        
        $token = $request->header('token');
        $lang = $request->header('lang');

        if($token){
            $user = User::where('remember_token',$token)->first();
            if($user){
                
             
                $favorites = Favourite::where('user_id',$user->id)->with('ad')->get();

                $adds = [];
                $i = 0; 
                if(sizeof($favorites) > 0){
                    foreach($favorites as $favorite){
                        $adds[$i]['id'] = $favorite->ad->id ;
                        $images = json_decode($favorite->ad->images) ;
                        // return  $images ;
                        if(sizeof($images) > 0){
                            $imagess  = [] ;
                            $n = 0; 
                            foreach($images as $image){
                                $imagess[$n]['image'] = asset('img/').'/'. $image;
                                $n ++ ;
                            }
                            $adds[$i]['images'] =  $imagess ;
                        }else{
                            $adds[$i]['images'] = [] ;
                        }
                        $adds[$i]['video'] = asset('img/').'/'. $favorite->ad->video ;
                        $adds[$i]['title'] = $favorite->ad->title ;
                        $adds[$i]['cost'] = $favorite->ad->cost ;
                        $adds[$i]['allow_messages'] = $favorite->ad->allow_messages ;
                        $adds[$i]['allow_call'] = $favorite->ad->allow_call ;
                        $adds[$i]['without_number'] = $favorite->ad->without_number ;
                        $adds[$i]['not_disturb'] = $favorite->ad->not_disturb ;
                        $adds[$i]['numbers'] = json_decode($favorite->ad->numbers) ;
                        $adds[$i]['star'] = $favorite->ad->star ;
                        $adds[$i]['address'] = $favorite->ad->address ;
                        $adds[$i]['from'] = $favorite->ad->from ;
                        $adds[$i]['to'] = $favorite->ad->to ;
                        $adds[$i]['install'] = $favorite->ad->install ;

                        $i++ ;
                    }
                }

                $data['ads'] = $adds ;

                $message = trans('api.fetch') ;
                return  $this->SuccessResponse($message,$data ) ;
                
            }else{
                $message = trans('api.logged_out') ;
                return  $this->LoggedResponse($message ) ;
            }
            
        }else{
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }


    }
//////////////////////////////////////////////////
// Like function by Antonious hosny
public function Like(Request $request){

    $rules=array(
        "ad_id"=>"required"
    );
    $dt = Carbon::now();
    $date  = date('Y-m-d', strtotime($dt));
    // return $date ;
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
        $message = trans('api.failed') ;
        return  $this->FailedResponse($message , $transformed) ;
    }

    $token = $request->header('token');
    $lang = $request->header('lang');

    if($token){
        $user = User::where('remember_token',$token)->first();
        if($user){
            // return $user ;
            $data['isLike'] = 0;
            $ad = Advertisement::where('id',$request->ad_id)->first();
            // return $ad ;
            $like = View::where('user_id',$user->id)->where('ad_id',$ad->id)->first();
            if($like){
                $like->delete() ;
                $data['isLike'] = 0 ;
                $ad->likes -= 1 ;
                $ad->save();

            }else{
                $like = new View ;
                $like->user_id = $user->id ;
                $like->ad_id = $ad->id ;
                $like->save() ;
                $ad->likes += 1 ;
                $ad->save() ;
                $data['isLike'] = 1 ;

            }
            $message = trans('api.save') ;
            return  $this->SuccessResponse($message,$data ) ;
            
        }else{
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }
        
    }else{
        $message = trans('api.logged_out') ;
        return  $this->LoggedResponse($message ) ;
    }


}
//////////////////////////////////////////////////
// Like function by Antonious hosny
public function View(Request $request){

    $rules=array(
        "ad_id"=>"required"
    );
    $dt = Carbon::now();
    $date  = date('Y-m-d', strtotime($dt));
    // return $date ;
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
        $message = trans('api.failed') ;
        return  $this->FailedResponse($message , $transformed) ;
    }

    $token = $request->header('token');
    $lang = $request->header('lang');

    // if($token){
    //     $user = User::where('remember_token',$token)->first();
    //     if($user){
            // return $user ;
            // $data['isLike'] = 0;
            $ad = Advertisement::where('id',$request->ad_id)->first();
            $ad->views += 1 ;
            $ad->save();
            $data['ad'] =$ad;
            $message = trans('api.save') ;
            return  $this->SuccessResponse($message,$data ) ;
            
    //     }else{
    //         $message = trans('api.logged_out') ;
    //         return  $this->LoggedResponse($message ) ;
    //     }
        
    // }else{
    //     $message = trans('api.logged_out') ;
    //     return  $this->LoggedResponse($message ) ;
    // }


}
//////////////////////////////////////////////////
 
// MyViews function by Antonious hosny
    public function MyViews(Request $request){
        
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        
        $token = $request->header('token');
        $lang = $request->header('lang');

        if($token){
            $user = User::where('remember_token',$token)->first();
            if($user){
                
            
                $views = View::where('user_id',$user->id)->with('ad')->get();

                $adds = [];
                $i = 0; 
                if(sizeof($views) > 0){
                    foreach($views as $view){
                        $adds[$i]['id'] = $view->ad->id ;
                        $images = json_decode($view->ad->images) ;
                        // return  $images ;
                        if(sizeof($images) > 0){
                            $imagess  = [] ;
                            $n = 0; 
                            foreach($images as $image){
                                $imagess[$n]['image'] = asset('img/').'/'. $image;
                                $n ++ ;
                            }
                            $adds[$i]['images'] =  $imagess ;
                        }else{
                            $adds[$i]['images'] = [] ;
                        }
                        $adds[$i]['video'] = asset('img/').'/'. $view->ad->video ;
                        $adds[$i]['title'] = $view->ad->title ;
                        $adds[$i]['cost'] = $view->ad->cost ;
                        $adds[$i]['allow_messages'] = $view->ad->allow_messages ;
                        $adds[$i]['allow_call'] = $view->ad->allow_call ;
                        $adds[$i]['without_number'] = $view->ad->without_number ;
                        $adds[$i]['not_disturb'] = $view->ad->not_disturb ;
                        $adds[$i]['numbers'] = json_decode($view->ad->numbers) ;
                        $adds[$i]['star'] = $view->ad->star ;
                        $adds[$i]['address'] = $view->ad->address ;
                        $adds[$i]['from'] = $view->ad->from ;
                        $adds[$i]['to'] = $view->ad->to ;
                        $adds[$i]['install'] = $view->ad->install ;

                        $i++ ;
                    }
                }

                $data['ads'] = $adds ;

                $message = trans('api.fetch') ;
                return  $this->SuccessResponse($message,$data ) ;
                
            }else{
                $message = trans('api.logged_out') ;
                return  $this->LoggedResponse($message ) ;
            }
            
        }else{
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }


    }
//////////////////////////////////////////////////
// ChargeWallet function by Antonious hosny
    public function ChargeWallet(Request $request){
         $rules=array(
            "amount"=>"required",
            "method"=>"required",
        );
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        // return $date ;
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
            $message = trans('api.failed') ;
            return  $this->FailedResponse($message , $transformed) ;

        }
        $token = $request->header('token');
        $lang = $request->header('lang');

        if($token){
            $user = User::where('remember_token',$token)->first();
            if($user){
                
                $payment  = new Payment  ;
                $payment->user_id  =  $user->id ;
                $payment->amount  =  $request->amount ;
                $payment->method  =  $request->method ;
                $payment->status  =  'paid' ;
                $payment->save();

                $user->wallet += $request->amount ;

                $user->save();
                
                $type = "charge";
                $msg =  [
                    'en' =>  $user->name ." He has purchased an extra credit. Transaction number ". $payment->id  , 
                    'ar' =>   $user->name ."  لقد اشترى رصيدًا إضافيًا. رقم المعاملة "  . $payment->id  , 
                ];
                
                $admins = User::where('role', 'admin')->get(); 
                foreach($admins as $admin){
                    if($admin){
                        $admin->notify(new Notifications($msg,$type ));
                        $device_token = $admin->device_token ;
                        if($device_token){
                            $this->notification($device_token,$msg,$msg);
                            $this->webnotification($device_token,$msg,$msg,$type);
                        }
                    }
                }

                $data['payment'] = $payment ;

                $message = trans('api.save') ;
                return  $this->SuccessResponse($message,$data ) ;
                
            }else{
                $message = trans('api.logged_out') ;
                return  $this->LoggedResponse($message ) ;
            }
            
        }else{
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }


    }
//////////////////////////////////////////////////
// ChargesHistory function by Antonious hosny
    public function ChargesHistory(Request $request){
        
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        
        $token = $request->header('token');
        $lang = $request->header('lang');

        if($token){
            $user = User::where('remember_token',$token)->first();
            if($user){
                
                $payments  = Payment::where('user_id',$user->id)->get()  ;
                $paymentss = [];
                $i = 0; 
                if(sizeof($payments) > 0){
                    foreach($payments as $payment){
                        $paymentss[$i]['date'] = $payment->created_at->format('Y-m-d') ;
                        $paymentss[$i]['amount'] = $payment->amount ;
                        $paymentss[$i]['method'] = $payment->method ;
                        $paymentss[$i]['status'] = $payment->status ;
                        $i++ ;
                    }
                }
    
                $data['user_wallet'] = $user->wallet ;
                $data['payments'] = $paymentss ;

                $message = trans('api.fetch') ;
                return  $this->SuccessResponse($message,$data ) ;
                
            }else{
                $message = trans('api.logged_out') ;
                return  $this->LoggedResponse($message ) ;
            }
            
        }else{
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }


    }
//////////////////////////////////////////////////
// MyAds function by Antonious hosny
    public function MyAds(Request $request){
            
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        
        $token = $request->header('token');
        $lang = $request->header('lang');

        if($token){
            $user = User::where('remember_token',$token)->first();
            if($user){
                
                $ads  = Advertisement::where('user_id',$user->id)->with('country')->with('city')->with('area')->with('category')->with('subcategory')->get()  ;
                $adds = [];
                $i = 0; 
                if(sizeof($ads) > 0){
                    foreach($ads as $ad){
                        $adds[$i]['id'] = $ad->id ;
                        $images = json_decode($ad->images) ;
                        // return  $images ;
                        if(sizeof($images) > 0){
                            $imagess  = [] ;
                            $n = 0; 
                            foreach($images as $image){
                                $imagess[$n]['image'] = asset('img/').'/'. $image;
                                $n ++ ;
                            }
                            $adds[$i]['images'] =  $imagess ;
                        }else{
                            $adds[$i]['images'] = [] ;
                        }
                        $adds[$i]['video'] = asset('img/').'/'. $ad->video ;
                        $adds[$i]['title'] = $ad->title ;
                        $adds[$i]['cost'] = $ad->cost ;
                        $adds[$i]['allow_messages'] = $ad->allow_messages ;
                        $adds[$i]['allow_call'] = $ad->allow_call ;
                        $adds[$i]['without_number'] = $ad->without_number ;
                        $adds[$i]['republish'] = $ad->republish ;
                        $adds[$i]['not_disturb'] = $ad->not_disturb ;
                        $adds[$i]['numbers'] = json_decode($ad->numbers) ;
                        $adds[$i]['lat'] = $ad->lat ;
                        $adds[$i]['lng'] = $ad->lng ;
                        $adds[$i]['views'] = $ad->views ;
                        $adds[$i]['favorites'] = $ad->favorites ;
                        $adds[$i]['star'] = $ad->star ;
                        $adds[$i]['address'] = $ad->address ;
                        $adds[$i]['status'] = $ad->status ;
                        $adds[$i]['category_id'] = $ad->category_id ;
                        if($ad->category){
                            if($lang == 'ar'){
                                $adds[$i]['category_name'] = $ad->category->title_ar ;

                            }else{
                                $adds[$i]['category_name'] = $ad->category->title_en ;

                            }
                        }else{
                            $adds[$i]['category_name'] = '' ; 
                        }
                        $adds[$i]['sub_id'] = $ad->sub_id ;
                        if($ad->subcategory){
                            if($lang == 'ar'){
                                $adds[$i]['subcategory_name'] = $ad->subcategory->title_ar ;

                            }else{
                                $adds[$i]['subcategory_name'] = $ad->subcategory->title_en ;

                            }
                        }else{
                            $adds[$i]['subcategory_name'] = '' ; 
                        }
                        $adds[$i]['country_id'] = $ad->country_id ;
                        if($ad->country){
                            if($lang == 'ar'){
                                $adds[$i]['country_name'] = $ad->country->title_ar ;

                            }else{
                                $adds[$i]['country_name'] = $ad->country->title_en ;

                            }
                        }else{
                            $adds[$i]['country_name'] = '' ; 
                        }
                        $adds[$i]['city_id'] = $ad->city_id ;
                        if($ad->city){
                            if($lang == 'ar'){
                                $adds[$i]['city_name'] = $ad->city->title_ar ;

                            }else{
                                $adds[$i]['city_name'] = $ad->city->title_en ;

                            }
                        }else{
                            $adds[$i]['city_name'] = '' ; 
                        }
                        $adds[$i]['area_id'] = $ad->area_id ;
                        if($ad->area){
                            if($lang == 'ar'){
                                $adds[$i]['area_name'] = $ad->area->title_ar ;

                            }else{
                                $adds[$i]['area_name'] = $ad->area->title_en ;

                            }
                        }else{
                            $adds[$i]['area_name'] = '' ; 
                        }
                        // $adds[$i]['user_id'] = $ad->user_id ;
                        $adds[$i]['from'] = $ad->from ;
                        $adds[$i]['to'] = $ad->to ;
                        $adds[$i]['expiry_date'] = $ad->expiry_date ;
                        $adds[$i]['install'] = $ad->install ;
                        $adds[$i]['cost_advertising'] = $ad->cost_advertising ;
                        $adds[$i]['cost_benefits'] = $ad->cost_benefits ;
                        $adds[$i]['total'] = $ad->total ;
                        $adds[$i]['disc'] = $ad->disc ;
                        $i++ ;
                    }
                }
 
                 $data['ads'] = $adds ;

                $message = trans('api.fetch') ;
                return  $this->SuccessResponse($message,$data ) ;
                
            }else{
                $message = trans('api.logged_out') ;
                return  $this->LoggedResponse($message ) ;
            }
            
        }else{
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }


    }
//////////////////////////////////////////////////
// AllAds function by Antonious hosny
    public function AllAds(Request $request){
         $rules=array(
            "country_id"=>"required",
        );
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        // return $date ;
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
            $message = trans('api.failed') ;
            return  $this->FailedResponse($message , $transformed) ;

        }  
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        
        $token = $request->header('token');
        $lang = $request->header('lang');

        // if($token){
        //     $user = User::where('remember_token',$token)->first();
        //     if($user){
                
                $ads  = Advertisement::where('user_id',null)->where('country_id',$request->country_id)->whereDate('expiry_date','>=',$date)->with('country')->with('category')->get();
                $adds = [];
                $i = 0; 
                if(sizeof($ads) > 0){
                    foreach($ads as $ad){
                        // $ad->views += 1 ;
                        // $ad->favorites += 1 ;
                        $ad->save() ;
                        $adds[$i]['id'] = $ad->id ;
                        $images = json_decode($ad->images) ;
                        // return  $images ;
                        if(sizeof($images) > 0){
                            $imagess  = [] ;
                            $n = 0; 
                            foreach($images as $image){
                                $imagess[$n]['image'] = asset('img/').'/'. $image;
                                $n ++ ;
                            }
                            $adds[$i]['images'] =  $imagess ;
                        }else{
                            $adds[$i]['images'] = [] ;
                        }
                        // $adds[$i]['video'] = asset('img/').'/'. $ad->video ;
                        $adds[$i]['title'] = $ad->title ;
                        $adds[$i]['favorites'] = $ad->favorites ;
                        $adds[$i]['likes'] = $ad->likes ;
                        $adds[$i]['views'] = $ad->views ;
                        
                        $i++ ;
                    }
                }

                $data['ads'] = $adds ;

                $message = trans('api.fetch') ;
                return  $this->SuccessResponse($message,$data ) ;
                
        //     }else{
        //         $message = trans('api.logged_out') ;
        //         return  $this->LoggedResponse($message ) ;
        //     }
            
        // }else{
        //     $message = trans('api.logged_out') ;
        //     return  $this->LoggedResponse($message ) ;
        // }


    }
//////////////////////////////////////////////////
// CategoryAds function by Antonious hosny
    public function CategoryAds(Request $request){
        $rules=array(
            "country_id"=>"required",
            "category_id"=>"required",
        );
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        // return $date ;
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
            $message = trans('api.failed') ;
            return  $this->FailedResponse($message , $transformed) ;

        }  
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        
        $token = $request->header('token');
        $lang = $request->header('lang');

        // if($token){
        //     $user = User::where('remember_token',$token)->first();
        //     if($user){
                
                $ads  = Advertisement::where('country_id',$request->country_id)->where('category_id',$request->category_id)->whereDate('expiry_date','>=',$date)->with('country')->with('city')->with('area')->with('category')->with('subcategory')  ;
                if($request->price_from){
                    $ads  =  $ads->Where('cost', '>=',  $request->price_from ) ;
                }
                if($request->price_to){
                    $ads  =  $ads->Where('cost', '<=',  $request->price_to ) ;
                }
                if($request->search){
                    $ads  =  $ads->Where('title', 'like', '%' .$request->search . '%')->orWhere('disc', 'like', '%' .$request->search . '%');
                }
                $ads  =  $ads->get() ;
                $adds = [];
                $i = 0; 
                if(sizeof($ads) > 0){
                    foreach($ads as $ad){
                        $adds[$i]['id'] = $ad->id ;
                        $images = json_decode($ad->images) ;
                        // return  $images ;
                        if(sizeof($images) > 0){
                            $imagess  = [] ;
                            $n = 0; 
                            foreach($images as $image){
                                $imagess[$n]['image'] = asset('img/').'/'. $image;
                                $n ++ ;
                            }
                            $adds[$i]['images'] =  $imagess ;
                        }else{
                            $adds[$i]['images'] = [] ;
                        }
                        $adds[$i]['video'] = asset('img/').'/'. $ad->video ;
                        $adds[$i]['title'] = $ad->title ;
                        $adds[$i]['cost'] = $ad->cost ;
                        $adds[$i]['allow_messages'] = $ad->allow_messages ;
                        $adds[$i]['allow_call'] = $ad->allow_call ;
                        $adds[$i]['without_number'] = $ad->without_number ;
                        $adds[$i]['not_disturb'] = $ad->not_disturb ;
                        $adds[$i]['numbers'] = json_decode($ad->numbers) ;
                        $adds[$i]['views'] = $ad->views ;
                        $adds[$i]['favorites'] = $ad->favorites ;
                        $adds[$i]['likes'] = $ad->likes ;
                        $adds[$i]['star'] = $ad->star ;
                        $adds[$i]['address'] = $ad->address ;
                        $adds[$i]['from'] = $ad->from ;
                        $adds[$i]['to'] = $ad->to ;
                        $adds[$i]['install'] = $ad->install ;
                        
                        $i++ ;
                    }
                }

                $install_ads  = Advertisement::where('country_id',$request->country_id)->where('category_id',$request->category_id)->where('install','1')->whereDate('expiry_date','>=',$date)->with('country')->with('city')->with('area')->with('category')->with('subcategory')  ;
                if($request->price_from){
                    $install_ads  =  $install_ads->Where('cost', '>=',  $request->price_from ) ;
                }
                if($request->price_to){
                    $install_ads  =  $install_ads->Where('cost', '<=',  $request->price_to ) ;
                }
                if($request->search){
                    $install_ads  =  $install_ads->Where('title', 'like', '%' .$request->search . '%')->orWhere('disc', 'like', '%' .$request->search . '%');
                }
                $install_ads  =  $install_ads->get() ;
                $install_adss = [];
                $i = 0; 
                if(sizeof($install_ads) > 0){
                    foreach($install_ads as $ad){
                        $install_adss[$i]['id'] = $ad->id ;
                        $images = json_decode($ad->images) ;
                        // return  $images ;
                        if(sizeof($images) > 0){
                            $imagess  = [] ;
                            $n = 0; 
                            foreach($images as $image){
                                $imagess[$n]['image'] = asset('img/').'/'. $image;
                                $n ++ ;
                            }
                            $install_adss[$i]['images'] =  $imagess ;
                        }else{
                            $install_adss[$i]['images'] = [] ;
                        }
                        $install_adss[$i]['video'] = asset('img/').'/'. $ad->video ;
                        $install_adss[$i]['title'] = $ad->title ;
                        $install_adss[$i]['cost'] = $ad->cost ;
                        $install_adss[$i]['allow_messages'] = $ad->allow_messages ;
                        $install_adss[$i]['allow_call'] = $ad->allow_call ;
                        $install_adss[$i]['without_number'] = $ad->without_number ;
                        $install_adss[$i]['not_disturb'] = $ad->not_disturb ;
                        $install_adss[$i]['numbers'] = json_decode($ad->numbers) ;
                        $install_adss[$i]['star'] = $ad->star ;
                        $install_adss[$i]['address'] = $ad->address ;
                        $install_adss[$i]['from'] = $ad->from ;
                        $install_adss[$i]['to'] = $ad->to ;
                        $install_adss[$i]['install'] = $ad->install ;
                       
                        $i++ ;
                    }
                }

                $star_adds  = Advertisement::where('country_id',$request->country_id)->where('category_id',$request->category_id)->where('star','1')->whereDate('expiry_date','>=',$date)->with('country')->with('city')->with('area')->with('category')->with('subcategory')  ;
                if($request->price_from){
                    $star_adds  =  $star_adds->Where('cost', '>=',  $request->price_from ) ;
                }
                if($request->price_to){
                    $star_adds  =  $star_adds->Where('cost', '<=',  $request->price_to ) ;
                }
                if($request->search){
                    $star_adds  =  $star_adds->Where('title', 'like', '%' .$request->search . '%')->orWhere('disc', 'like', '%' .$request->search . '%');
                }
                $star_adds  =  $star_adds->get() ;

                $star_addss = [];
                $i = 0; 
                if(sizeof($star_adds) > 0){
                    foreach($star_adds as $ad){
                        $star_addss[$i]['id'] = $ad->id ;
                        $images = json_decode($ad->images) ;
                        // return  $images ;
                        if(sizeof($images) > 0){
                            $imagess  = [] ;
                            $n = 0; 
                            foreach($images as $image){
                                $imagess[$n]['image'] = asset('img/').'/'. $image;
                                $n ++ ;
                            }
                            $star_addss[$i]['images'] =  $imagess ;
                        }else{
                            $star_addss[$i]['images'] = [] ;
                        }
                        $star_addss[$i]['video'] = asset('img/').'/'. $ad->video ;
                        $star_addss[$i]['title'] = $ad->title ;
                        $star_addss[$i]['cost'] = $ad->cost ;
                        $star_addss[$i]['allow_messages'] = $ad->allow_messages ;
                        $star_addss[$i]['allow_call'] = $ad->allow_call ;
                        $star_addss[$i]['without_number'] = $ad->without_number ;
                        $star_addss[$i]['not_disturb'] = $ad->not_disturb ;
                        $star_addss[$i]['numbers'] = json_decode($ad->numbers) ;
                        $star_addss[$i]['star'] = $ad->star ;
                        $star_addss[$i]['address'] = $ad->address ;
                        $star_addss[$i]['from'] = $ad->from ;
                        $star_addss[$i]['to'] = $ad->to ;
                        $star_addss[$i]['install'] = $ad->install ;
                       
                        $i++ ;
                    }
                }
                $category  = Category::where('id',$request->category_id)->with('sub_categories')->orderBy('id', 'asc')->first();
                // return $categories ;
                $categoriess =[];
         
                if($category){
                   
                    $sub_categoriess = [] ;
                    $n  = 0 ;
                    if(sizeOf($category->sub_categories) > 0){

                        foreach($category->sub_categories as $sub_category){
                            $sub_categoriess[$n]['sub_category_id']   = $sub_category->id;
                            if($lang == 'ar'){
                                $sub_categoriess[$n]['sub_category_name']   = $sub_category->title_ar;
                            }else{
                                $sub_categoriess[$n]['sub_category_name']   =  $sub_category->title_en;
                            }
                            if($sub_category->image){
                                $sub_categoriess[$n]['sub_category_image'] = asset('img/').'/'. $sub_category->image;
                            }else{
                                $sub_categoriess[$n]['sub_category_image'] = null ;
                            }
                                $sons_categoriess = [] ;
                            $j  = 0 ;
                            if(sizeOf($sub_category->sons_category) > 0){

                                foreach($sub_category->sons_category as $son_category){
                                    $sons_categoriess[$j]['son_category_id']   = $son_category->id;
                                    if($lang == 'ar'){
                                        $sons_categoriess[$j]['son_category_name']   = $son_category->title_ar;
                                    }else{
                                        $sons_categoriess[$j]['son_category_name']   =  $son_category->title_en;
                                    }
                                    if($son_category->image){
                                        $sons_categoriess[$j]['son_category_image'] = asset('img/').'/'. $son_category->image;
                                    }else{
                                        $sons_categoriess[$j]['son_category_image'] = null ;
                                    }
                                    $j ++ ;
                            
                                }
                            }
                            $sub_categoriess[$n]['sons_categories'] = $sons_categoriess ;
                            $n ++ ;

                        }
                    }
                    $categoriess['sub_categories'] = $sub_categoriess ;
                    $i ++ ;

                    $star_adds  = Advertisement::where('user_id',null)->where('country_id',$request->country_id)->where('category_id',$category->id)->whereDate('expiry_date','>=',$date)->with('country')->with('category')->get();
                    $star_addss = [];
                    $j = 0; 
                    if(sizeof($star_adds) > 0){
                        foreach($star_adds as $ad){
                            $star_addss[$j]['id'] = $ad->id ;
                            $star_addss[$j]['title'] = $ad->title ;
                            $images = json_decode($ad->images) ;
                            // return  $images ;
                            if(sizeof($images) > 0){
                                $imagess  = [] ;
                                $n = 0; 
                                foreach($images as $image){
                                    $imagess[$n]['image'] = asset('img/').'/'. $image;
                                    $n ++ ;
                                }
                                $star_addss[$j]['images'] =  $imagess ;
                            }else{
                                $star_addss[$j]['images'] = [] ;
                            }
                            $star_addss[$j]['favorites'] = $ad->favorites ;
                            $star_addss[$j]['views'] = $ad->views ;
                            $star_addss[$j]['likes'] = $ad->likes ;
                            
                            $j++ ;
                        }
                    }
                    $categoriess[$i]['category_adds']   =  $star_addss;
                
                }
 
                
                $data['star_ads'] = $star_addss ;
                $data['install_ads'] = $install_adss ;
                $data['all_category_ads'] = $adds ;
                $data['subCategories'] = $categoriess ;

                $message = trans('api.fetch') ;
                return  $this->SuccessResponse($message,$data ) ;
                
        //     }else{
        //         $message = trans('api.logged_out') ;
        //         return  $this->LoggedResponse($message ) ;
        //     }
            
        // }else{
        //     $message = trans('api.logged_out') ;
        //     return  $this->LoggedResponse($message ) ;
        // }


    }
//////////////////////////////////////////////////
// SubCategoryAds function by Antonious hosny
    public function SubCategoryAds(Request $request){
        $rules=array(
            "country_id"=>"required",
            "subcategory_id"=>"required",
        );
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        // return $date ;
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
            $message = trans('api.failed') ;
            return  $this->FailedResponse($message , $transformed) ;

        }  
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        
        $token = $request->header('token');
        $lang = $request->header('lang');

        // if($token){
        //     $user = User::where('remember_token',$token)->first();
        //     if($user){
                $SubCategory = SubCategory::where('id',$request->subcategory_id)->first() ;
                // return $SubCategory->category_id ;
                $subcategories = SubCategory::where('parent_id',$request->subcategory_id)->get() ;
                if(sizeof($subcategories) > 0){
                    $sub_categoriess = [];
                    $n = 0 ; 
                    foreach($subcategories as $sub_category){
                        $sub_categoriess[$n]['sub_category_id']   = $sub_category->id;
                        if($lang == 'ar'){
                            $sub_categoriess[$n]['sub_category_name']   = $sub_category->title_ar;
                        }else{
                            $sub_categoriess[$n]['sub_category_name']   =  $sub_category->title_en;
                        }
                        if($sub_category->image){
                            $sub_categoriess[$n]['sub_category_image'] = asset('img/').'/'. $sub_category->image;
                        }else{
                            $sub_categoriess[$n]['sub_category_image'] = null ;
                        }
                        $n ++ ;

                    }
                    $ads  = Advertisement::where('country_id',$request->country_id)->where('category_id',$SubCategory->category_id)->whereDate('expiry_date','>=',$date)->with('country')->with('city')->with('area')->with('category')->with('subcategory')  ;
                    if($request->price_from){
                        $ads  =  $ads->Where('cost', '>=',  $request->price_from ) ;
                    }
                    if($request->price_to){
                        $ads  =  $ads->Where('cost', '<=',  $request->price_to ) ;
                    }
                    if($request->search){
                        $ads  =  $ads->Where('title', 'like', '%' .$request->search . '%')->orWhere('disc', 'like', '%' .$request->search . '%');
                    }
                    $ads  =  $ads->get() ;
                    $adds = [];
                    $i = 0; 
                    if(sizeof($ads) > 0){
                        foreach($ads as $ad){
                            $adds[$i]['id'] = $ad->id ;
                            $images = json_decode($ad->images) ;
                            // return  $images ;
                            if(sizeof($images) > 0){
                                $imagess  = [] ;
                                $n = 0; 
                                foreach($images as $image){
                                    $imagess[$n]['image'] = asset('img/').'/'. $image;
                                    $n ++ ;
                                }
                                $adds[$i]['images'] =  $imagess ;
                            }else{
                                $adds[$i]['images'] = [] ;
                            }
                            $adds[$i]['video'] = asset('img/').'/'. $ad->video ;
                            $adds[$i]['title'] = $ad->title ;
                            $adds[$i]['cost'] = $ad->cost ;
                            $adds[$i]['allow_messages'] = $ad->allow_messages ;
                            $adds[$i]['allow_call'] = $ad->allow_call ;
                            $adds[$i]['without_number'] = $ad->without_number ;
                            // $adds[$i]['republish'] = $ad->republish ;
                            $adds[$i]['not_disturb'] = $ad->not_disturb ;
                            $adds[$i]['numbers'] = json_decode($ad->numbers) ;
                            // $adds[$i]['lat'] = $ad->lat ;
                            // $adds[$i]['lng'] = $ad->lng ;
                            $adds[$i]['views'] = $ad->views ;
                            $adds[$i]['favorites'] = $ad->favorites ;
                            $adds[$i]['likes'] = $ad->likes ;
                            $adds[$i]['star'] = $ad->star ;
                            $adds[$i]['address'] = $ad->address ;
                             
                            $adds[$i]['from'] = $ad->from ;
                            $adds[$i]['to'] = $ad->to ;
                            // $adds[$i]['expiry_date'] = $ad->expiry_date ;
                            $adds[$i]['install'] = $ad->install ;
                             
                            $i++ ;
                        }
                    }
    
                    $install_ads  = Advertisement::where('country_id',$request->country_id)->where('category_id',$SubCategory->category_id)->where('install','1')->whereDate('expiry_date','>=',$date)->with('country')->with('city')->with('area')->with('category')->with('subcategory')   ;

                    if($request->price_from){
                        $install_ads  =  $install_ads->Where('cost', '>=',  $request->price_from ) ;
                    }
                    if($request->price_to){
                        $install_ads  =  $install_ads->Where('cost', '<=',  $request->price_to ) ;
                    }
                    if($request->search){
                        $install_ads  =  $install_ads->Where('title', 'like', '%' .$request->search . '%')->orWhere('disc', 'like', '%' .$request->search . '%');
                    }
                    $install_ads  =  $install_ads->get() ;

                    $install_adss = [];
                    $i = 0; 
                    if(sizeof($install_ads) > 0){
                        foreach($install_ads as $ad){
                            $install_adss[$i]['id'] = $ad->id ;
                            $images = json_decode($ad->images) ;
                            // return  $images ;
                            if(sizeof($images) > 0){
                                $imagess  = [] ;
                                $n = 0; 
                                foreach($images as $image){
                                    $imagess[$n]['image'] = asset('img/').'/'. $image;
                                    $n ++ ;
                                }
                                $install_adss[$i]['images'] =  $imagess ;
                            }else{
                                $install_adss[$i]['images'] = [] ;
                            }
                            $install_adss[$i]['video'] = asset('img/').'/'. $ad->video ;
                            $install_adss[$i]['title'] = $ad->title ;
                            $install_adss[$i]['cost'] = $ad->cost ;
                            $install_adss[$i]['allow_messages'] = $ad->allow_messages ;
                            $install_adss[$i]['allow_call'] = $ad->allow_call ;
                            $install_adss[$i]['without_number'] = $ad->without_number ;
                            $install_adss[$i]['not_disturb'] = $ad->not_disturb ;
                            $install_adss[$i]['numbers'] = json_decode($ad->numbers) ;
                            $install_adss[$i]['star'] = $ad->star ;
                            $install_adss[$i]['address'] = $ad->address ;
                            $install_adss[$i]['from'] = $ad->from ;
                            $install_adss[$i]['to'] = $ad->to ;
                            $install_adss[$i]['install'] = $ad->install ;
                        
                            $i++ ;
                        }
                    }
    
                    $star_adds  = Advertisement::where('country_id',$request->country_id)->where('category_id',$SubCategory->category_id)->where('star','1')->whereDate('expiry_date','>=',$date)->with('country')->with('city')->with('area')->with('category')->with('subcategory')   ;
                    if($request->price_from){
                        $star_adds  =  $star_adds->Where('cost', '>=',  $request->price_from ) ;
                    }
                    if($request->price_to){
                        $star_adds  =  $star_adds->Where('cost', '<=',  $request->price_to ) ;
                    }
                    if($request->search){
                        $star_adds  =  $star_adds->Where('title', 'like', '%' .$request->search . '%')->orWhere('disc', 'like', '%' .$request->search . '%');
                    }
                    $star_adds  =  $star_adds->get() ;
                    $star_addss = [];
                    $i = 0; 
                    if(sizeof($star_adds) > 0){
                        foreach($star_adds as $ad){
                            $star_addss[$i]['id'] = $ad->id ;
                            $images = json_decode($ad->images) ;
                            // return  $images ;
                            if(sizeof($images) > 0){
                                $imagess  = [] ;
                                $n = 0; 
                                foreach($images as $image){
                                    $imagess[$n]['image'] = asset('img/').'/'. $image;
                                    $n ++ ;
                                }
                                $star_addss[$i]['images'] =  $imagess ;
                            }else{
                                $star_addss[$i]['images'] = [] ;
                            }
                            $star_addss[$i]['video'] = asset('img/').'/'. $ad->video ;
                            $star_addss[$i]['title'] = $ad->title ;
                            $star_addss[$i]['cost'] = $ad->cost ;
                            $star_addss[$i]['allow_messages'] = $ad->allow_messages ;
                            $star_addss[$i]['allow_call'] = $ad->allow_call ;
                            $star_addss[$i]['without_number'] = $ad->without_number ;
                            $star_addss[$i]['not_disturb'] = $ad->not_disturb ;
                            $star_addss[$i]['numbers'] = json_decode($ad->numbers) ;
                            $star_addss[$i]['star'] = $ad->star ;
                            $star_addss[$i]['address'] = $ad->address ;
                            $star_addss[$i]['from'] = $ad->from ;
                            $star_addss[$i]['to'] = $ad->to ;
                            $star_addss[$i]['install'] = $ad->install ;
                        
                            $i++ ;
                        }
                    }
                   
                    $data['star_ads'] = $star_addss ;
                    $data['install_ads'] = $install_adss ;
                    $data['all_subcategory_ads'] = $adds ;
                    $data['sub_categories'] = $sub_categoriess ;
 
                    $message = trans('api.fetch') ;
                    return  $this->SuccessResponse($message,$data);
                }
                $ads  = Advertisement::where('country_id',$request->country_id)->where('sub_id',$request->subcategory_id)->whereDate('expiry_date','>=',$date)->with('country')->with('city')->with('area')->with('category')->with('subcategory')   ;
                if($request->price_from){
                    $ads  =  $ads->Where('cost', '>=',  $request->price_from ) ;
                }
                if($request->price_to){
                    $ads  =  $ads->Where('cost', '<=',  $request->price_to ) ;
                }
                if($request->search){
                    $ads  =  $ads->Where('title', 'like', '%' .$request->search . '%')->orWhere('disc', 'like', '%' .$request->search . '%');
                }
                $ads  =  $ads->get() ;
                $adds = [];
                $i = 0; 
                if(sizeof($ads) > 0){
                    foreach($ads as $ad){
                        $adds[$i]['id'] = $ad->id ;
                        $images = json_decode($ad->images) ;
                        // return  $images ;
                        if(sizeof($images) > 0){
                            $imagess  = [] ;
                            $n = 0; 
                            foreach($images as $image){
                                $imagess[$n]['image'] = asset('img/').'/'. $image;
                                $n ++ ;
                            }
                            $adds[$i]['images'] =  $imagess ;
                        }else{
                            $adds[$i]['images'] = [] ;
                        }
                        $adds[$i]['video'] = asset('img/').'/'. $ad->video ;
                        $adds[$i]['title'] = $ad->title ;
                        $adds[$i]['cost'] = $ad->cost ;
                        $adds[$i]['allow_messages'] = $ad->allow_messages ;
                        $adds[$i]['allow_call'] = $ad->allow_call ;
                        $adds[$i]['without_number'] = $ad->without_number ;
                        // $adds[$i]['republish'] = $ad->republish ;
                        $adds[$i]['not_disturb'] = $ad->not_disturb ;
                        $adds[$i]['numbers'] = json_decode($ad->numbers) ;
                        // $adds[$i]['lat'] = $ad->lat ;
                        // $adds[$i]['lng'] = $ad->lng ;
                        // $adds[$i]['views'] = $ad->views ;
                        // $adds[$i]['favorites'] = $ad->favorites ;
                        $adds[$i]['star'] = $ad->star ;
                        $adds[$i]['address'] = $ad->address ;
                        // $adds[$i]['status'] = $ad->status ;
                        // $adds[$i]['category_id'] = $ad->category_id ;
                        // if($ad->category){
                        //     if($lang == 'ar'){
                        //         $adds[$i]['category_name'] = $ad->category->title_ar ;

                        //     }else{
                        //         $adds[$i]['category_name'] = $ad->category->title_en ;

                        //     }
                        // }else{
                        //     $adds[$i]['category_name'] = '' ; 
                        // }
                        // $adds[$i]['sub_id'] = $ad->sub_id ;
                        // if($ad->subcategory){
                        //     if($lang == 'ar'){
                        //         $adds[$i]['subcategory_name'] = $ad->subcategory->title_ar ;

                        //     }else{
                        //         $adds[$i]['subcategory_name'] = $ad->subcategory->title_en ;

                        //     }
                        // }else{
                        //     $adds[$i]['subcategory_name'] = '' ; 
                        // }
                        // $adds[$i]['country_id'] = $ad->country_id ;
                        // if($ad->country){
                        //     if($lang == 'ar'){
                        //         $adds[$i]['country_name'] = $ad->country->title_ar ;

                        //     }else{
                        //         $adds[$i]['country_name'] = $ad->country->title_en ;

                        //     }
                        // }else{
                        //     $adds[$i]['country_name'] = '' ; 
                        // }
                        // $adds[$i]['city_id'] = $ad->city_id ;
                        // if($ad->city){
                        //     if($lang == 'ar'){
                        //         $adds[$i]['city_name'] = $ad->city->title_ar ;

                        //     }else{
                        //         $adds[$i]['city_name'] = $ad->city->title_en ;

                        //     }
                        // }else{
                        //     $adds[$i]['city_name'] = '' ; 
                        // }
                        // $adds[$i]['area_id'] = $ad->area_id ;
                        // if($ad->area){
                        //     if($lang == 'ar'){
                        //         $adds[$i]['area_name'] = $ad->area->title_ar ;

                        //     }else{
                        //         $adds[$i]['area_name'] = $ad->area->title_en ;

                        //     }
                        // }else{
                        //     $adds[$i]['area_name'] = '' ; 
                        // }
                        // $adds[$i]['user_id'] = $ad->user_id ;
                        $adds[$i]['from'] = $ad->from ;
                        $adds[$i]['to'] = $ad->to ;
                        // $adds[$i]['expiry_date'] = $ad->expiry_date ;
                        $adds[$i]['install'] = $ad->install ;
                        // $adds[$i]['cost_advertising'] = $ad->cost_advertising ;
                        // $adds[$i]['cost_benefits'] = $ad->cost_benefits ;
                        // $adds[$i]['total'] = $ad->total ;
                        // $adds[$i]['disc'] = $ad->disc ;
                        $i++ ;
                    }
                }

                $install_ads  = Advertisement::where('country_id',$request->country_id)->where('sub_id',$request->subcategory_id)->where('install','1')->whereDate('expiry_date','>=',$date)->with('country')->with('city')->with('area')->with('category')->with('subcategory')   ;
                if($request->price_from){
                    $install_ads  =  $install_ads->Where('cost', '>=',  $request->price_from ) ;
                }
                if($request->price_to){
                    $install_ads  =  $install_ads->Where('cost', '<=',  $request->price_to ) ;
                }
                if($request->search){
                    $install_ads  =  $install_ads->Where('title', 'like', '%' .$request->search . '%')->orWhere('disc', 'like', '%' .$request->search . '%');
                }
                $install_ads  =  $install_ads->get() ;
                $install_adss = [];
                $i = 0; 
                if(sizeof($install_ads) > 0){
                    foreach($install_ads as $ad){
                        $install_adss[$i]['id'] = $ad->id ;
                        $images = json_decode($ad->images) ;
                        // return  $images ;
                        if(sizeof($images) > 0){
                            $imagess  = [] ;
                            $n = 0; 
                            foreach($images as $image){
                                $imagess[$n]['image'] = asset('img/').'/'. $image;
                                $n ++ ;
                            }
                            $install_adss[$i]['images'] =  $imagess ;
                        }else{
                            $install_adss[$i]['images'] = [] ;
                        }
                        $install_adss[$i]['video'] = asset('img/').'/'. $ad->video ;
                        $install_adss[$i]['title'] = $ad->title ;
                        $install_adss[$i]['cost'] = $ad->cost ;
                        $install_adss[$i]['allow_messages'] = $ad->allow_messages ;
                        $install_adss[$i]['allow_call'] = $ad->allow_call ;
                        $install_adss[$i]['without_number'] = $ad->without_number ;
                        $install_adss[$i]['not_disturb'] = $ad->not_disturb ;
                        $install_adss[$i]['numbers'] = json_decode($ad->numbers) ;
                        $install_adss[$i]['star'] = $ad->star ;
                        $install_adss[$i]['address'] = $ad->address ;
                        $install_adss[$i]['from'] = $ad->from ;
                        $install_adss[$i]['to'] = $ad->to ;
                        $install_adss[$i]['install'] = $ad->install ;
                    
                        $i++ ;
                    }
                }

                $star_adds  = Advertisement::where('country_id',$request->country_id)->where('sub_id',$request->subcategory_id)->where('star','1')->whereDate('expiry_date','>=',$date)->with('country')->with('city')->with('area')->with('category')->with('subcategory')  ;
                if($request->price_from){
                    $star_adds  =  $star_adds->Where('cost', '>=',  $request->price_from ) ;
                }
                if($request->price_to){
                    $star_adds  =  $star_adds->Where('cost', '<=',  $request->price_to ) ;
                }
                if($request->search){
                    $star_adds  =  $star_adds->Where('title', 'like', '%' .$request->search . '%')->orWhere('disc', 'like', '%' .$request->search . '%');
                }
                $star_adds  =  $star_adds->get() ;

                $star_addss = [];
                $i = 0; 
                if(sizeof($star_adds) > 0){
                    foreach($star_adds as $ad){
                        $star_addss[$i]['id'] = $ad->id ;
                        $images = json_decode($ad->images) ;
                        // return  $images ;
                        if(sizeof($images) > 0){
                            $imagess  = [] ;
                            $n = 0; 
                            foreach($images as $image){
                                $imagess[$n]['image'] = asset('img/').'/'. $image;
                                $n ++ ;
                            }
                            $star_addss[$i]['images'] =  $imagess ;
                        }else{
                            $star_addss[$i]['images'] = [] ;
                        }
                        $star_addss[$i]['video'] = asset('img/').'/'. $ad->video ;
                        $star_addss[$i]['title'] = $ad->title ;
                        $star_addss[$i]['cost'] = $ad->cost ;
                        $star_addss[$i]['allow_messages'] = $ad->allow_messages ;
                        $star_addss[$i]['allow_call'] = $ad->allow_call ;
                        $star_addss[$i]['without_number'] = $ad->without_number ;
                        $star_addss[$i]['not_disturb'] = $ad->not_disturb ;
                        $star_addss[$i]['numbers'] = json_decode($ad->numbers) ;
                        $star_addss[$i]['star'] = $ad->star ;
                        $star_addss[$i]['address'] = $ad->address ;
                        $star_addss[$i]['from'] = $ad->from ;
                        $star_addss[$i]['to'] = $ad->to ;
                        $star_addss[$i]['install'] = $ad->install ;
                    
                        $i++ ;
                    }
                }
               
                $data['star_ads'] = $star_addss ;
                $data['install_ads'] = $install_adss ;
                $data['all_subcategory_ads'] = $adds ;
                $data['sub_categories'] = [] ;
                $message = trans('api.fetch') ;
                return  $this->SuccessResponse($message,$data ) ;
                
        //     }else{
        //         $message = trans('api.logged_out') ;
        //         return  $this->LoggedResponse($message ) ;
        //     }
            
        // }else{
        //     $message = trans('api.logged_out') ;
        //     return  $this->LoggedResponse($message ) ;
        // }


    }
//////////////////////////////////////////////////
// AdDetails function by Antonious hosny
    public function AdDetails(Request $request){
        $rules=array(
            "ad_id"=>"required",
        );
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        // return $date ;
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
            $message = trans('api.failed') ;
            return  $this->FailedResponse($message , $transformed) ;

        }  
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        
        $token = $request->header('token');
        $lang = $request->header('lang');

        $ad  = Advertisement::where('id',$request->ad_id)->whereDate('expiry_date','>=',$date)->with('country')->with('city')->with('area')->with('category')->with('subcategory')->first()  ;
        $adds = [];
        
        if($ad){
            $ad->views += 1 ;
            $ad->save();
                $adds['id'] = $ad->id ;
            $images = json_decode($ad->images) ;
            // return  $images ;
            if(sizeof($images) > 0){
                $imagess  = [] ;
                $n = 0; 
                foreach($images as $image){
                    $imagess['image'] = asset('img/').'/'. $image;
                    $n ++ ;
                }
                $adds['images'] =  $imagess ;
            }else{
                $adds['images'] = [] ;
            }
            $adds['video'] = asset('img/').'/'. $ad->video ;
            $adds['title'] = $ad->title ;
            $adds['cost'] = $ad->cost ;
            $adds['allow_messages'] = $ad->allow_messages ;
            $adds['allow_call'] = $ad->allow_call ;
            $adds['without_number'] = $ad->without_number ;
            // $adds['republish'] = $ad->republish ;
            $adds['not_disturb'] = $ad->not_disturb ;
            $adds['numbers'] = json_decode($ad->numbers) ;
            $adds['lat'] = $ad->lat ;
            $adds['lng'] = $ad->lng ;
            $adds['views'] = $ad->views ;
            $adds['favorites'] = $ad->favorites ;
            $adds['likes'] = $ad->likes ;
            $adds['star'] = $ad->star ;
            $adds['address'] = $ad->address ;
            $adds['status'] = $ad->status ;
            $adds['category_id'] = $ad->category_id ;
            if($ad->category){
                if($lang == 'ar'){
                    $adds['category_name'] = $ad->category->title_ar ;

                }else{
                    $adds['category_name'] = $ad->category->title_en ;

                }
            }else{
                $adds['category_name'] = '' ; 
            }
            $adds['sub_id'] = $ad->sub_id ;
            if($ad->subcategory){
                if($lang == 'ar'){
                    $adds['subcategory_name'] = $ad->subcategory->title_ar ;

                }else{
                    $adds['subcategory_name'] = $ad->subcategory->title_en ;

                }
            }else{
                $adds['subcategory_name'] = '' ; 
            }
            $adds['country_id'] = $ad->country_id ;
            if($ad->country){
                if($lang == 'ar'){
                    $adds['country_name'] = $ad->country->title_ar ;

                }else{
                    $adds['country_name'] = $ad->country->title_en ;

                }
            }else{
                $adds['country_name'] = '' ; 
            }
            $adds['city_id'] = $ad->city_id ;
            if($ad->city){
                if($lang == 'ar'){
                    $adds['city_name'] = $ad->city->title_ar ;

                }else{
                    $adds['city_name'] = $ad->city->title_en ;

                }
            }else{
                $adds['city_name'] = '' ; 
            }
            $adds['area_id'] = $ad->area_id ;
            if($ad->area){
                if($lang == 'ar'){
                    $adds['area_name'] = $ad->area->title_ar ;

                }else{
                    $adds['area_name'] = $ad->area->title_en ;

                }
            }else{
                $adds['area_name'] = '' ; 
            }
            $adds['user_id'] = $ad->user_id ;
            if($ad->user){
                $adds['user_name'] = $ad->user->name ;
                $adds['image'] = asset('img/').'/'. $ad->user->image ;

            }else{
                $adds['user_name'] = '' ; 
                $adds['image'] =  null ;
            }
            $adds['from'] = $ad->from ;
            $adds['to'] = $ad->to ;
            // $adds['expiry_date'] = $ad->expiry_date ;
            $adds['install'] = $ad->install ;
            // $adds[$i]['cost_advertising'] = $ad->cost_advertising ;
            // $adds[$i]['cost_benefits'] = $ad->cost_benefits ;
            // $adds[$i]['total'] = $ad->total ;
            $adds ['disc'] = $ad->disc ;
        }

        $token = $request->header('token');
        if($token){
            $user = User::where('remember_token',$token)->first();
            if($user){
                $view = View::where('user_id',$user->id)->where('ad_id',$ad->id)->first();
                $favorite = Favourite::where('user_id',$user->id)->where('ad_id',$ad->id)->first();
                if($favorite){
                    $adds['isFavorite'] = 1 ;
                }else{
                    $adds['isFavorite'] = 0 ;
                }
                if($view){
                     
                }else{
                    $view = new View ;
                    $view->user_id = $user->id ;
                    $view->ad_id = $ad->id ;
                    $view->save() ;
                }
            }
        }
        $data['ads'] = $adds ;

        $message = trans('api.fetch') ;
        return  $this->SuccessResponse($message,$data ) ;
        
             


    }
//////////////////////////////////////////////////
// MakeAvailable function by Antonious hosny
    public function MakeAvailable(Request $request){
    
        $token = $request->header('token');
        $lang = $request->header('lang');

        if($token){
            $user = User::where('remember_token',$token)->first();
            if($user){
                $fannie = Technician::where('user_id', $user->id)->first(); 
                if($fannie){
                    if($fannie->available == 0){
                        $fannie->available = 1 ;
                    }else{
                        $fannie->available = 0 ;
                    }
                    $fannie->save() ;
                    $message = trans('api.save') ;
                    return  $this->SuccessResponse($message,$fannie ) ;
                }

                
            }else{
                $message = trans('api.logged_out') ;
                return  $this->LoggedResponse($message ) ;
            }
            
        }else{
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }


    }

/////////////////////for chats ///////////////////////////
// SendMessage function by Antonious hosny
    public function SendMessage(Request $request){

        $rules=array(
            "receiver_id"=>"required",
            "message"=>"required",
        );
        $dt = Carbon::now();
        $date  = date('Y-m-d', strtotime($dt));
        // return $date ;
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
            $message = trans('api.failed') ;
            return  $this->FailedResponse($message , $transformed) ;
        }

        $token = $request->header('token');
        $lang = $request->header('lang');
        $data = [] ;
        // return  $request  ; 
        if($token){
            $user = User::where('remember_token',$token)->first();
            if($user){
                $chat = Chat::where('sender_id',$user->id)->where('receiver_id',$request->receiver_id)->first();
                if(!$chat){
                    $chat = Chat::where('receiver_id',$user->id)->where('sender_id',$request->receiver_id)->first();
                }
                if(!$chat){
                    $chat = New Chat ;
                }
                
                $chat->sender_id = $user->id ;
                $chat->receiver_id = $request->receiver_id ;
                $chat->message = $request->message  ;
                $chat->save();

                $message = New Message ;
                $message->chat_id = $chat->id ;
                $message->sender_id = $user->id ;
                $message->receiver_id = $request->receiver_id ;
                $message->message = $request->message  ;
                $message->save();

                $type = "chat";
                $msg =  [
                    'en' =>  $request->message  , 
                    'ar' =>  $request->message ,
                    'chat_id' =>  $chat->id ,
                ];
            
                $receiver = User::where('id',$request->receiver_id )->first(); 
            
                $receiver->notify(new Notifications($msg,$type ));
                $device_token = $receiver->device_token ;
                if($device_token){
                    $this->webnotification($device_token,$msg,$msg,$type);
                }
                
                
                $data['message'] = $message ;
                $message = trans('api.save') ;
                return  $this->SuccessResponse($message,$data ) ;
                
                
            }else{
                $message = trans('api.logged_out') ;
                return  $this->LoggedResponse($message ) ;
            }
            
        }else{
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }


    }

    public function Chats(Request $request){

        $token = $request->header('token');
        $lang = $request->header('lang');
    
        // return  $request  ; 
        if($token){
            $user = User::where('remember_token',$token)->first();
            if($user){
                $chats = Chat::where('sender_id',$user->id)->with('sender')->with('receiver')->orWhere('receiver_id',$user->id)->get();
                // return  $chats ;
                $data = [] ;
                $i = 0 ;
                foreach($chats as $chat) {
                    $data[$i]['chat_id'] = $chat->id ;
                    $data[$i]['sender_id'] = $chat->sender_id ;
                    $data[$i]['sender_name'] = $chat->sender->name ;
                    if($chat->sender->image){
                        $data[$i]['sender_image'] =  asset('img/').'/'.$chat->sender->image ;
                    }else{
                        $data[$i]['sender_image'] = null ;
                    }
                    $data[$i]['receiver_id'] = $chat->receiver_id ;
                    $data[$i]['receiver_name'] = $chat->receiver->name ;
                    if($chat->receiver->image){
                        $data[$i]['receiver_image'] =  asset('img/').'/'.$chat->receiver->image ;
                    }else{
                        $data[$i]['receiver_image'] = null ;
                    }
                    $data[$i]['message'] = $chat->message ;
                    $data[$i]['created_at'] = $chat->created_at->format('Y-m-d H:i:s') ;
                    $i ++ ;
                }
                $message = trans('api.fetch') ;
                return  $this->SuccessResponse($message,$data ) ;
                
                
            }else{
                $message = trans('api.logged_out') ;
                return  $this->LoggedResponse($message ) ;
            }
            
        }else{
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }


    }

    public function Messages(Request $request){

        $token = $request->header('token');
        $lang = $request->header('lang');
    
        $rules=array(
            "chat_id"=>"required",
        
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
            $message = trans('api.failed') ;
            return  $this->FailedResponse($message , $transformed) ;
        }
        // return  $request  ; 
        if($token){
            $user = User::where('remember_token',$token)->first();
            if($user){
                $messages = Message::where('chat_id',$request->chat_id)->orderBy('created_at','desc')->get();
                $data = [] ;
                $i = 0 ;
                foreach($messages as $message) {
                    $data[$i]['message_id'] = $message->id ;
                    $data[$i]['sender_id'] = $message->sender_id ;
                    $data[$i]['sender_name'] = $message->sender->name ;
                    if($message->sender->image){
                        $data[$i]['sender_image'] =  asset('img/').'/'.$message->sender->image ;
                    }else{
                        $data[$i]['sender_image'] = null ;
                    }
                    $data[$i]['receiver_id'] = $message->receiver_id ;
                    $data[$i]['receiver_name'] = $message->receiver->name ;
                    if($message->receiver->image){
                        $data[$i]['receiver_image'] =  asset('img/').'/'.$message->receiver->image ;
                    }else{
                        $data[$i]['receiver_image'] = null ;
                    }
                    $data[$i]['message'] = $message->message ;
                    $data[$i]['created_at'] = $message->created_at->format('Y-m-d H:i:s') ;
                    $i ++ ;
                }
                $message = trans('api.fetch') ;
                return  $this->SuccessResponse($message,$data ) ;
                
                
            }else{
                $message = trans('api.logged_out') ;
                return  $this->LoggedResponse($message ) ;
            }
            
        }else{
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }


    }

//////////////////////////////////////////////////
//////////////////////////////////////////////////
// ContactUs function by Antonious hosny
    public function ContactUs(Request $request){
        $lang = $request->header('lang');
        $token = $request->header('token');
        // if($token){
            // $user =User::where('remember_token',$token)->first();
            // if($user){
                $rules=array(   
                    "message"=>"required",
                    "title"=>"required",
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
                    $message = trans('api.failed') ;
                    return   $this->FailedResponse($message , $transformed) ;
                     
                }
                else{
                    $contact = new ContactUs ;
        
                    $contact->name = $request->name ;
                    $contact->email = $request->email ;
                    $contact->title = $request->title ;
                    $contact->message = $request->message ;
                    $contact->status = 'new' ;
                    $contact->save();
                    $type = "contact";
                    // $title1 = "  مستخدم جديد قام بالتسجيل" ;
                    $msg =  [
                        'en' => "you have new message from ".  $request->name   ,
                        'ar' => "  لديك رسالة جديدة من " . $request->name   ,
                    ];
                    
                    $admins = User::where('role', 'admin')->get(); 
                    if(sizeof($admins) > 0){
                        foreach($admins as $admin){
                            $admin->notify(new Notifications($msg,$type ));
                        }
                        $device_token = $admin->device_token ;
                        if($device_token){
                            $this->notification($device_token,$msg,$msg);
                            $this->webnotification($device_token,$msg,$msg,$type);
                        }
                    }
                    $message = trans('api.send') ;
                    return $this->SuccessResponse($message , $contact) ;
        
                
                }
                
        //     }
        //     $message = trans('api.logout') ;
        //     return   $this->LoggedResponse($message ) ;
        // }
        // $message = trans('api.logout') ;
        // return   $this->LoggedResponse($message ) ;

    }
/////////////////////////////////////////////////////
// Terms and Conditions function by Antonious hosny
    public function TermsConditions(Request $request){
        $lang = $request->header('lang');
        $term = Doc::where('type','terms')->first();
        $terms =[] ;
        if($term){
            if($lang == 'ar'){
                $terms['title'] = $term->title_ar ; 
                $terms['disc'] = $term->disc_ar ; 
            }else{
                $terms['title'] = $term->title_en ;      
                $terms['disc'] = $term->disc_en ;      
            }    
        }

         
        
        $data['terms'] = $terms ;
 
        $message = trans('api.fetch') ;
        return $this->SuccessResponse($message , $data) ;
           
                
   
    

    }
///////////////////////////////////////////////////
// AboutUs function by Antonious hosny
    public function AboutUs(Request $request){
        $lang = $request->header('lang');
        $doc = Doc::where('type','about')->first();
        $docss =[] ;
        if($doc){
            if($lang == 'ar'){
                $docss['title'] = $doc->title_ar ; 
                $docss['disc'] = $doc->disc_ar ; 
            }else{
                $docss['title'] = $doc->title_en ;      
                $docss['disc'] = $doc->disc_en ;      
            }    
        }
        $data['about'] = $docss ;
         
        $message = trans('api.fetch') ;
        return $this->SuccessResponse($message , $data) ;
       


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
        $token = $request->header('token');
        date_default_timezone_set('Africa/Cairo');
         // return $token ;
        if($token == ''){
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }
        $user = User::where('remember_token',$token)->first();
        // $user->notify(new Notifications());
        // return $user ;
        if($user){
            $user->lang  = $lang ;
            $user->save();
            $count = count($user->unreadnotifications) ;
            // return $count ;

            $message = trans('api.fetch') ;
            return  $this->SuccessResponse($message , $count) ;
             
        }
        else{
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }

    }
/////////////////////////////////////////////////////////
// get_notification function by Antonious hosny
    public function get_notification(Request $request){
        date_default_timezone_set('Africa/Cairo');
        $token = $request->header('token');
        if($token == ''){
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
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
            $message = trans('api.fetch') ;
            return  $this->SuccessResponse($message , $notifications) ;
            
        }
        else{
            $message = trans('api.logged_out') ;
            return  $this->LoggedResponse($message ) ;
        }

    }
/////////////////////////////////////////////////////////

// mV/WX8XFYBq6d+4bxh0M/GHVfr8S1X6KKnd5FNYr
////////////////////////////////////////////for test only //////////////////////////////////
// for test send_notifications
    public function send_notifications(Request $request){

        // $client = new \GuzzleHttp\Client();
         //    return 'done';
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
            'en' =>  "  agreed to deliver the request"  ,
            'ar' =>   "  قام بالموافقة علي توصيل الطلب"  ,
        ];
        $title = [
            'en' =>  "  agreed to deliver the request"  ,
            'ar' =>   "  قام بالموافقة علي توصيل الطلب"  ,
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
