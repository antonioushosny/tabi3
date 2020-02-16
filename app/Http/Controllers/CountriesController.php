<?php

namespace App\Http\Controllers;
use App\Http\Requests\CountriesRequest;
use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\City;
use App\Area;
use App\Country;
use Auth;
use App;
class CountriesController extends Controller
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
 
        $searchArray = [
            'title_ar' => [request('title_ar'), 'like'], 
            'title_en' => [request('title_en'), 'like'], 
            'status' => [request('status'), '=']
        ];
        request()->flash();

        $query = Country::orderBy('id', 'DESC') ;

        
        $searchQuery = $this->searchIndex($query, $searchArray);
        $countries = $searchQuery->paginate(env('PerPage'));

        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'countries';
    
        return view('admin.sections.countries.index',compact('countries','title','lang'));



    }

    public function cities(Request $request, $id) {
        // return $id ;
        if ($request->ajax()) {
            $lang = App::getlocale();
            if($lang == 'ar'){
                $cities = City::where('country_id', $id)->select('title_ar AS name','id')->get();
            }else{
                $cities = City::where('country_id', $id)->select('title_en AS name','id')->get();
            }
            return response()->json([
                'cities' => $cities ,
            ]);
        }
    }
    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'countries';
        return view('admin.sections.countries.create',compact('title','lang'));
    }
    public function store(CountriesRequest $request)
    {
 
        // return $request ;
        if($request->id ){
            $country = Country::find( $request->id );
        }
        else{
            $country = new Country ;
        }

        $country->title_ar          = $request->title_ar ;
        $country->title_en         = $request->title_en ;
        $country->status        = $request->status ;
        $country->save();
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $country->image   = $name;  
        }
        $country->save();
        $country = Country::where('id',$country->id)->first();
        if($request->id ){
            return redirect()->route('countries')->with('status', __('lang.updatedDone'));
        }else{
            return redirect()->route('countries')->with('status', __('lang.createdDone'));
        }
        // return response()->json($country);

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
        $title = 'countries';
        $countrie = Country::where('id',$id)->orderBy('id', 'DESC')->first();
        // return $admin ; 
        return view('admin.sections.countries.edit',compact('countrie','title','lang'));
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
        $id = Country::find( $id );
        $id ->delete();
        return back()->with('status', __('lang.deletedDone'));
        // return response()->json($id);
    }

    public function deleteall(Request $request)
    {
        
        
        if($request->ids){
            foreach($request->ids as $id){
                $id = Country::find($id);
            }
            $ids = Country::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
    }
}
