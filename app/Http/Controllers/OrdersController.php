<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\User;
use App\City;
use App\Area;
use App\Order;
use App\Container;
use App\CenterContainer;

use Spatie\Permission\Models\Role;
use Auth;
use App;
use DB;
class OrdersController  extends Controller
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
        if(!(Auth::user()->role != 'order' )){
            $role = 'order';
            return view('unauthorized',compact('role','order'));
        }
        $title = 'orders';
        $orders = Order::where('center_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
        
        // return $orders ; 
        return view('orders.index',compact('orders','title','lang'));

    }

    public function neworders()
    {
        $lang = App::getlocale();
        if(!(Auth::user()->role != 'order' )){
            $role = 'order';
            return view('unauthorized',compact('role','order'));
        }
        $title = 'neworders';
        $orders = Order::where('status','pending')->where('center_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
        
        // return $orders ; 
        return view('orders.index',compact('orders','title','lang'));

    }
    public function noworders()
    {
        $lang = App::getlocale();
        if(!(Auth::user()->role != 'order' )){
            $role = 'order';
            return view('unauthorized',compact('role','order'));
        }
        $title = 'noworders';
        $orders = Order::where('center_id',Auth::user()->id)->where('status','accepted')->orWhere('status','assigned')->orderBy('id', 'DESC')->get();
        // return $orders ; 
        return view('orders.index',compact('orders','title','lang'));

    }
    public function lastorders()
    {
        $lang = App::getlocale();
        if(!(Auth::user()->role != 'order' )){
            $role = 'order';
            return view('unauthorized',compact('role','order'));
        }
        $title = 'lastorders';
        $orders = Order::where('center_id',Auth::user()->id)->where('status','delivered')->orWhere('status','canceled')->orderBy('id', 'DESC')->get();
        
        // return $orders ; 
        return view('orders.index',compact('orders','title','lang'));

    }
    public function add()
    {
        $lang = App::getlocale();
        if(!(Auth::user()->role == 'admin' ||  Auth::user()->role == 'provider')){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'orders';
        $allcities = City::all();
        if($lang == 'ar'){
            $cities = array_pluck($allcities,'name_ar', 'id'); 
        }else{
            $cities = array_pluck($allcities,'name_en', 'id');
        }

        $allcontainers = Container::all();
        if($lang == 'ar'){
            $containers = array_pluck($allcontainers,'name_ar', 'id'); 
        }else{
            $containers = array_pluck($allcontainers,'name_en', 'id');
        }

        $allproviders = User::where('role','provider')->get();
        $providers = array_pluck($allproviders,'company_name', 'id'); 
        
        return view('orders.add',compact('title','providers','containers','cities','lang'));
    }
    public function store(Request $request)
    {
       
        // return $request ;
        if($request->id ){
            $rules =
            [
                'provider_id'   =>'required', 
                'city_id'   =>'required', 
                'area_id'   =>'required', 
                'responsible_name'  =>'required|max:190',
                'email'  =>'required|email|max:190',            
                'status'  =>'required',   
                'lat' =>'required',
                'lng'    =>'required', 
            ];
            
        }     
    
        else{
            $rules =
            [
                'provider_id'   =>'required', 
                'city_id'   =>'required', 
                'area_id'   =>'required', 
                'responsible_name'  =>'required|max:190',
                'email'  =>'required|email|unique:users,email|max:190',            
                'status'  =>'required',       
                // 'password'  =>'required|min:6|max:190',     
                // 'image'  =>'required',      
                'lat' =>'required',
                'lng'    =>'required',   
                // 'mobile'     =>'required',   
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
         }
         else{
            $user = new User ;
            $password = \Hash::make($request->password);
            $user->password      = $password ;
        }
        
         $user->name          = $request->responsible_name ;
         $user->lat           = $request->lat ;
         $user->lng           = $request->lng ;
         $user->email         = $request->email ;
         $user->status        = $request->status ;
         $user->mobile        = $request->mobile ;
         $user->city_id       = $request->city_id ;
         $user->area_id       = $request->area_id ;
         $user->provider_id       = $request->provider_id ;

         $user->role          = 'order';
         $user->save();
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $user->image   = $name;  
        }

        $user->save();
        $containers  = CenterContainer::where('order_id',$user->id)->delete();
        $i = 0; 
        foreach($request->containers as $container_id){
          
            if($container_id != '' || $container_id != null){
                $container = CenterContainer::where('order_id',$user->id)->where('container_id',$container_id)->first();
                if(!$container){

                    $container = new CenterContainer ;
                    $container->container_id = $container_id ;
                    $container->order_id = $user->id ;
                    $container->price = $request->price[$i] ;
                    $container->save();
                }
                $i ++ ;
            }
        }

        return redirect()->route('orders');
        // return \Redirect::back();
        // return view('orders.index',compact('admins','title','lang'));

        return response()->json($user);

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $lang = App::getlocale();
        if(!(Auth::user()->role == 'admin' ||  Auth::user()->role == 'provider')){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'orders';
        $allcities = City::all();
        if($lang == 'ar'){
            $cities = array_pluck($allcities,'name_ar', 'id'); 
        }else{
            $cities = array_pluck($allcities,'name_en', 'id');
        }
        $allproviders = User::where('role','provider')->get();
        $providers = array_pluck($allproviders,'company_name', 'id');  

        $allcontainers = Container::all();
        if($lang == 'ar'){
            $containers = array_pluck($allcontainers,'name_ar', 'id'); 
        }else{
            $containers = array_pluck($allcontainers,'name_en', 'id');
        }

        $order = User::where('id',$id)->with('containers')->orderBy('id', 'DESC')->first();
        $allareas = Area::where('city_id',$order->city_id)->get();
        if($lang == 'ar'){
            $areas = array_pluck($allareas,'name_ar', 'id'); 
        }else{
            $areas = array_pluck($allareas,'name_en', 'id');
        }
        // return $order ; 
        return view('orders.edit',compact('order','areas','cities','containers','providers','title','lang'));
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
       
        if(!(Auth::user()->role == 'admin' ||  Auth::user()->role == 'provider')){
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
        // session()->flash('alert-danger', trans('admin.record_selected_deleted'));
        // return redirect()->route('admins');
      
    }
}
