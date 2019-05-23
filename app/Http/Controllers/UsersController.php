<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\User;
use App\Country;
use App\City; 
use App\Ticket; 
use App\Deal; 
use App\Favorite; 
use App\Charge; 

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
        $allcountries = Country::where('id','<>','1')->get();
        $countries = array_pluck($allcountries,'name_ar', 'id');
        $allcities = City::where('id','<>','1')->get();
        $cities = array_pluck($allcities,'name_ar', 'id');
        $users = User::where('role','user')->orderBy('id', 'DESC')->get();
 
        return view('users.index',compact('users','countries','cities','title','lang'));

    }
    public function deals($id)
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'users';
        $tickets = Ticket::where('user_id',$id)->where('status','1')->get();
        $deals = [];
        $i = 0 ;
        foreach($tickets as $ticket){

            $Deal = Deal::where('id',$ticket->deal_id)->first();  
            if($Deal){

                $deals[$i]['id'] = $Deal->id ;    
                if($lang == 'ar'){
                    $deals[$i]['title_ar'] = $Deal->title_ar ; 
                    $deals[$i]['disc'] = $Deal->disc_ar ; 
                    $deals[$i]['info'] = $Deal->info_ar ; 
                }else{
                    $deals[$i]['title'] = $Deal->title_en ; 
                    $deals[$i]['disc'] = $Deal->disc_en ; 
                    $deals[$i]['info'] = $Deal->info_en ; 
                }
                if($Deal->image){
                    $deals[$i]['image'] = asset('img/').'/'. $Deal->image;
                }else{
                    $deals[$i]['image'] = null ;
                } 
                
                $deals[$i]['original_price'] = $Deal->original_price ; 
                $deals[$i]['initial_price'] = $Deal->initial_price ; 
                $deals[$i]['points'] = $Deal->points ; 
                $deals[$i]['tickets'] = $Deal->tickets ; 
                $deals[$i]['tender_cost'] = $Deal->tender_cost ; 
                $deals[$i]['tender_edit_cost'] = $Deal->tender_edit_cost ; 
                $deals[$i]['tender_coupon'] = $Deal->tender_coupon ; 
                $deals[$i]['status'] = $Deal->status ; 
                $deals[$i]['expiry_date'] = date('d-m-Y H:i:s', strtotime($Deal->expiry_date) );   
                // return $Deal->images ;
                $favorite = Favorite::where('user_id',$id)->where('deal_id',$Deal->id)->first();
                if($favorite){
                    $deals[$i]['is_favorite'] = 'true' ;
                }else{
                    $deals[$i]['is_favorite'] = 'false' ;
                }
            
                $i++ ;
            }
        }
        return view('users.deals',compact('deals','title','lang'));
    }
    public function charges($id)
    {
            $title =  'users' ;
            $charges = Charge::with('package')->where('user_id',$id)->get();
            return view('users.charges',compact('charges','title'));
    }
    public function store(Request $request)
    {
        
        if($request->id ){
            $rules =
            [
                'name'  =>'required|max:190',
                'user_name'  =>'required|max:190',
                'email'  =>'required|email|max:190',            
                'mobile'  =>'required|digits:10',            
                'status'  =>'required',   
                'birth_date'  =>'required',        
                'job'  =>'required',        
                'gender'  =>'required',        
                'country_id'  =>'required',        
                'city_id'  =>'required',   
            ];
            
        }     
    
        else{
            $rules =
            [
                'name'  =>'required|max:190',
                'user_name'  =>'required|unique:users,user_name|max:190',            
                'email'  =>'required|email|unique:users,email|max:190',            
                'password'  =>'required|min:6|max:190',  
                'mobile'  =>'required|digits:10|unique:users,mobile',            
                'status'  =>'required',        
                'birth_date'  =>'required',        
                'job'  =>'required',        
                'gender'  =>'required',        
                'country_id'  =>'required',        
                'city_id'  =>'required',        
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
            
            if($request->user_name != $user->user_name){
                $rules =
                [       
                    'user_name'  =>'required|unique:users,user_name',     
                ];
                $validator = \Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
                }
            }

            if($request->mobile != $user->mobile){
                $rules =
                [       
                    'mobile'  =>'required|digits:10|unique:users,mobile',    
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
       

         
         $user->name          = $request->name ;
         $user->user_name     = $request->user_name ;
         $user->email         = $request->email ;
         $user->mobile        = $request->mobile ;
         $user->job           = $request->job ;
         $user->birth_date    = $request->birth_date ;
         $user->gender        = $request->gender ;
         $user->country_id    = $request->country_id ;
         $user->city_id       = $request->city_id ;
         $user->status        = $request->status ;
         $user->role            = 'user';
         $user->save();
       if ($request->hasFile('image')) {
            $image = $request->file('image');
            // return $image->getClientOriginalName();
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            // $file->getClientOriginalExtension();
            // $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $user->image   = $name;  
        }

        $user->save();

        return response()->json($user);

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

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
