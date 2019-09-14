<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\User;
use App\Category;
use App\Notifications\Notifications;

use Auth;
use App;
class CategoriesController extends Controller
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
        $title = 'categories';
        $categories = Category::orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('categories.index',compact('categories','title','lang'));

    }

    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'categories';
        return view('categories.add',compact('title','lang'));
    }
    public function store(Request $request)
    {
        
        if($request->id ){
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',           
                'status'  =>'required',   
                'cost'  =>'required',   
                'days'  =>'required',   
            ];
        }     
        else{
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',           
                'status'  =>'required',   
                'cost'  =>'required',   
                'days'  =>'required',   
            ];
        }
        
        
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
         }
         
        // return $request ;

        if($request->id ){
            $categorie = Category::find( $request->id );
        }
        else{
            $categorie = new Category ;

        }

        $categorie->title_ar          = $request->title_ar ;
        $categorie->title_en         = $request->title_en ;
        $categorie->cost         = $request->cost ;
        $categorie->days         = $request->days ;
        $categorie->status        = $request->status ;
        $categorie->save();
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $categorie->image   = $name;  
        }
        $categorie->save();
        return response()->json($categorie);

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
        $title = 'categories';
        $data = Category::where('id',$id)->orderBy('id', 'DESC')->first();
        // return $admin ; 
        return view('categories.add',compact('data','title','lang'));
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
        $id = Category::find( $id );
        $id ->delete();
        $id ->delete();
        return response()->json($id);
    }

    public function deleteall(Request $request)
    {
        
        
        if($request->ids){
            foreach($request->ids as $id){
                $id = Category::find($id);
            }
            $ids = Category::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
    }
}
