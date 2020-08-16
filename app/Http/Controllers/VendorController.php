<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\PersonType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class VendorController extends Controller
{
    public function index()
    {
//        $customers = PersonType::find(11)->people;
        $query = User::select('id',
            'person_name',
            'person_type_id',
            'email',
            'mobile1',
            'mobile2',
            'customer_category_id',
            'address1',
            'address2',
            'state',
            'city',
            'po',
            'area',
            'pin')->where('person_type_id','=',11);

        //to bind the parameters, the above statement does not bind the parameters so we need to bind them
        // using following statement
        $finalQuery=Str::replaceArray('?', $query->getBindings(), $query->toSql());

        $result=DB::table(DB::raw("($finalQuery) as table1"))->select()->get();

        return response()->json(['success'=>1,'data'=>$result], 200,[],JSON_NUMERIC_CHECK);
    }

    public function getVendorById($id)
    {
//        $customers = PersonType::find(11)->people;
        $result = User::select('id',
            'person_name',
            'person_type_id',
            'email',
            'mobile1',
            'mobile2',
            'customer_category_id',
            'address1',
            'address2',
            'state',
            'city',
            'po',
            'area',
            'pin')->where('id',$id)->where('person_type_id','=',11)->first();

        return response()->json(['success'=>1,'data'=>$result], 200,[],JSON_NUMERIC_CHECK);
    }

    public function saveVendor(Request $request)
    {
        $vendor=new User();

        $vendor->person_name=$request->input('person_name');
        $vendor->email=$request->input('email');
        $vendor->password="81dc9bdb52d04dc20036dbd8313ed055";
        $vendor->person_type_id=11;
        $vendor->customer_category_id=1;
        $vendor->mobile1=$request->input('mobile1');
        $vendor->mobile2=$request->input('mobile2');
        $vendor->address1=$request->input('address1');
        $vendor->address2=$request->input('address2');
        $vendor->state=$request->input('state');
        $vendor->po=$request->input('po');
        $vendor->area=$request->input('area');
        $vendor->city=$request->input('city');
        $vendor->pin=$request->input('pin');

        $vendor->save();
        return response()->json(['success'=>1,'data'=>$vendor], 200);
    }

    public function updateVendor(Request $request)
    {
        $vendor=User::find($request->input('id'));
        if($request->input('person_name')){
            $vendor->person_name=$request->input('person_name');
        }
        if($request->input('email')){
            $vendor->email=$request->input('email');
        }
        if($request->input('password')){
            $vendor->password=$request->input('password');
        }

        if($request->input('person_type_id')){
            $vendor->person_type_id=$request->input('person_type_id');
        }

        if($request->input('customer_category_id')){
            $vendor->customer_category_id=$request->input('customer_category_id');
        }

        if($request->input('mobile1')){
            $vendor->mobile1=$request->input('mobile1');
        }

        if($request->input('mobile2')){
            $vendor->mobile2=$request->input('mobile2');
        }

        if($request->input('address1')){
            $vendor->address1=$request->input('address1');
        }

        if($request->input('address2')){
            $vendor->address2=$request->input('address2');
        }

        if($request->input('state')){
            $vendor->state=$request->input('state');
        }

        if($request->input('po')){
            $vendor->po=$request->input('po');
        }

        if($request->input('area')){
            $vendor->area=$request->input('area');
        }

        if($request->input('city')){
            $vendor->city=$request->input('city');
        }

        if($request->input('pin')){
            $vendor->pin=$request->input('pin');
        }


        $vendor->save();
        return response()->json(['success'=>1,'data'=>$vendor], 200,[],JSON_NUMERIC_CHECK);
    }
    public function updateVendorByID($id,Request $request)
    {
        $vendor=User::find($id);
        if($request->input('person_name')){
            $vendor->person_name=$request->input('person_name');
        }
        if($request->input('email')){
            $vendor->email=$request->input('email');
        }
        if($request->input('password')){
            $vendor->password=$request->input('password');
        }

        if($request->input('person_type_id')){
            $vendor->person_type_id=$request->input('person_type_id');
        }

        if($request->input('customer_category_id')){
            $vendor->customer_category_id=$request->input('customer_category_id');
        }

        if($request->input('mobile1')){
            $vendor->mobile1=$request->input('mobile1');
        }

        if($request->input('mobile2')){
            $vendor->mobile2=$request->input('mobile2');
        }

        if($request->input('address1')){
            $vendor->address1=$request->input('address1');
        }

        if($request->input('address2')){
            $vendor->address2=$request->input('address2');
        }

        if($request->input('state')){
            $vendor->state=$request->input('state');
        }

        if($request->input('po')){
            $vendor->po=$request->input('po');
        }

        if($request->input('area')){
            $vendor->area=$request->input('area');
        }

        if($request->input('city')){
            $vendor->city=$request->input('city');
        }

        if($request->input('pin')){
            $vendor->pin=$request->input('pin');
        }


        $vendor->save();
        return response()->json(['success'=>1,'data'=>$vendor], 200,[],JSON_NUMERIC_CHECK);
    }
    public function deleteVendorByID($id)
    {
        $res = User::destroy($id);
        if ($res) {
            return response()->json(['success'=>1,'message'=>'Deleted'], 200,[],JSON_NUMERIC_CHECK);
        } else {
            return response()->json(['success'=>0,'data'=>'Not Deleted'], 200,[],JSON_NUMERIC_CHECK);
        }
    }
    public function getkarigarhs()
    {
        $result = User::select('id','person_name')->where('person_type_id','=',11)->get();

        return response()->json(['success'=>1,'data'=>$result], 200,[],JSON_NUMERIC_CHECK);

    }
}