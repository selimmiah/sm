<?php

namespace App\Http\Controllers\Admin;

use App\Models\Thana;
use Datatables;
use App\Models\Admin;
use App\Models\District;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;


class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Admin::where('id','!=',1)->where('id','!=',Auth::guard('admin')->user()->id)->orderBy('id')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->addColumn('role', function(Admin $data) {
                                $role = $data->role_id == 0 ? 'No Role' : $data->role->name;
                                return $role;
                            }) 
                            ->addColumn('action', function(Admin $data) {
                                $delete ='<a href="javascript:;" data-href="' . route('admin-staff-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a>';
                                return '<div class="action-list"><a data-href="' . route('admin-staff-show',$data->id) . '" class="view details-width" data-toggle="modal" data-target="#modal1"> <i class="fas fa-eye"></i>Details</a><a data-href="' . route('admin-staff-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a>'.$delete.'</div>';
                            }) 
                            ->rawColumns(['action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
  	public function index()
    {
        return view('admin.staff.index');

    }

    //*** GET Request
    public function create()
    {
        return view('admin.staff.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
               'photo'      => 'required|mimes:jpeg,jpg,png,svg',
                ];

        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Admin();
        $input = $request->all();
        if ($file = $request->file('photo')) 
         {      
            $name = time().$file->getClientOriginalName();
            $file->move('images/admins',$name);
            $input['photo'] = $name;
        }

        $input['role'] = 'Staff';
       $input['region_name'] = $request->region_name;
       $input['territory_name'] = $request->territory_name;
       $input['bd_id'] = $request->bd_id;
       $input['distributor_name'] = $request->distributor_name;
       $input['address'] = $request->address;
       $input['district'] = $request->district;
       $input['thana'] = $request->thana;


        $input['password'] = bcrypt($request['password']);
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section        
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends    
    }


    public function edit($id)
    {
        $data = Admin::findOrFail($id);  
        return view('admin.staff.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        //--- Validation Section
        if($id != Auth::guard('admin')->user()->id)
        {
            $rules =
            [
                'photo' => 'mimes:jpeg,jpg,png,svg',
                'email' => 'unique:admins,email,'.$id
            ];

            $validator = Validator::make(Input::all(), $rules);
            
            if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }
            //--- Validation Section Ends
            $input = $request->all();  
            $data = Admin::findOrFail($id);        
                if ($file = $request->file('photo')) 
                {              
                    $name = time().$file->getClientOriginalName();
                    $file->move('images/admins/',$name);
                    if($data->photo != null)
                    {
                        if (file_exists(public_path().'/images/admins/'.$data->photo)) {
                            unlink(public_path().'/images/admins/'.$data->photo);
                        }
                    }            
                $input['photo'] = $name;
                } 
            if($request->password == ''){
                $input['password'] = $data->password;
            }
            else{
                $input['password'] = Hash::make($request->password);
            }


            $input['region_name'] = $data->region_name;
            $input['territory_name'] = $data->territory_name;
            $input['bd_id'] = $data->bd_id;
            $input['distributor_name'] = $data->distributor_name;
            $input['address'] = $data->address;
            $input['district'] = $data->district;
            $input['thana'] = $data->thana;


            $data->update($input);
            $msg = 'Data Updated Successfully.';
            return response()->json($msg);
        }
        else{
            $msg = 'You can not change your role.';
            return response()->json($msg);            
        }
 
    }

    //*** GET Request
    public function show($id)
    {
        $data = Admin::findOrFail($id);


        $districts = District::pluck('district_name', 'id');
        $thanas = Thana::pluck('thana_name', 'id');

        return view('admin.staff.show',compact('data', 'districts','thanas'));
    }

    //*** GET Request Delete
    public function destroy($id)
    {
    	if($id == 1)
    	{
        return "You don't have access to remove this admin";
    	}
        $data = Admin::findOrFail($id);
        //If Photo Doesn't Exist
        if($data->photo == null){
            $data->delete();
            //--- Redirect Section     
            $msg = 'Data Deleted Successfully.';
            return response()->json($msg);      
            //--- Redirect Section Ends     
        }
        //If Photo Exist
        if (file_exists(public_path().'/images/admins/'.$data->photo)) {
            unlink(public_path().'/images/admins/'.$data->photo);
        }
        $data->delete();
        //--- Redirect Section     
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends    
    }
}
