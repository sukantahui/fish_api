<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\PersonType;
use App\Model\LedgerGroup;
use App\Model\Ledger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class VendorController extends Controller
{
    public function getIntegrityCount($id){
        $user=User::find($id);
        $purchaseCount=$user->purchases->count();
        return response()->json(['success'=>1,'data'=>$purchaseCount], 200,[],JSON_NUMERIC_CHECK);
    }
    public function isDeletable($id){
        $totalIntegrityCount = 0;
        $user=User::find($id);
        $purchaseCount=$user->purchases->count();
        $totalIntegrityCount = $totalIntegrityCount + $purchaseCount;
        if($totalIntegrityCount == 0){
            return true;
        }else{
            return  false;
        }
    }

    public function index()
    {
        $vendors = LedgerGroup::find(15)->ledgers;

        return response()->json(['success'=>1,'data'=>$vendors], 200,[],JSON_NUMERIC_CHECK);
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
        $vendor=new Ledger();

        $vendor->ledger_name=$request->input('ledger_name');
        $vendor->billing_name=$request->input('billing_name');
        $vendor->ledger_group_id=$request->input('ledger_group_id');
        $vendor->email=$request->input('email');
        $vendor->mobile1=$request->input('mobile1');
        $vendor->mobile2=$request->input('mobile2');
        $vendor->address1=$request->input('address1');
        $vendor->address2=$request->input('address2');
        $vendor->state=$request->input('state');
        $vendor->po=$request->input('po');
        $vendor->area=$request->input('area');
        $vendor->city=$request->input('city');
        $vendor->pin=$request->input('pin');
        $vendor->opening_balance=$request->input('opening_balance');
        $vendor->transaction_type_id=$request->input('transaction_type_id');

        $vendor->save();
        return response()->json(['success'=>1,'data'=>$vendor], 200);
    }

    public function updateVendor(Request $request)
    {
        $vendor=User::find($request->input('id'));
        if($request->input('person_name')){
            $vendor->person_name=$request->input('person_name');
        }
        if($request->input('billing_name')){
            $vendor->billing_name=$request->input('billing_name');
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
        if($request->input('billing_name')){
            $vendor->person_name=$request->input('billing_name');
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
        if(!$this->isDeletable($id)){
            return response()->json(['success'=>0,'data'=>'Not Deletable', 'id'=>$id], 200,[],JSON_NUMERIC_CHECK);
        }


        try {
            //$res = User::destroy($id);
            $note=User::findorfail($id); // fetch the note
            if($note->delete()){
                return response()->json(['success'=>1,'data'=>'Deleted','id'=>$id], 200,[],JSON_NUMERIC_CHECK);
            }

        } catch (Throwable $e) {
            report($e);

            return response()->json(['success'=>0,'data'=>'Not Deleted','id'=>$id], 200,[],JSON_NUMERIC_CHECK);
        }

    }

}
