<?php

namespace App\Http\Controllers;

use App\Model\Ledger;
use Illuminate\Http\Request;
use App\User;
use App\Model\PersonType;
use App\Model\LedgerGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CustomerController extends Controller
{
    public function index()
    {
		$customers=LedgerGroup::find(16)->ledgers;
		$subset = $customers->map(function ($customer) {
			return $customer->only(['id', 'ledger_name','billing_name','ledger_group_id','customer_category_id','email','mobile1',
				'mobile2','address1','address2','city','state','po','area','pin','opening_balance','transaction_type_id']);
		});

        return response()->json(['success'=>1,'data'=>$subset], 200,[],JSON_NUMERIC_CHECK);
    }

    public function getCustomerById($id)
    {
        $customer = Ledger::find($id)
            ->only(['id', 'ledger_name','billing_name','ledger_group_id','customer_category_id','email','mobile1',
                'mobile2','address1','address2','city','state','po','area','pin','opening_balance','transaction_type_id']);

        return response()->json(['success'=>1,'data'=>$customer], 200,[],JSON_NUMERIC_CHECK);
    }

    public function saveCustomer(Request $request)
    {
        $customer=new Ledger();

        $customer->ledger_name=$request->input('ledger_name');
        $customer->billing_name=$request->input('billing_name');
        $customer->ledger_group_id=$request->input('ledger_group_id');
        $customer->customer_category_id=$request->input('customer_category_id');
        $customer->email=$request->input('email');
        $customer->mobile1=$request->input('mobile1');
        $customer->mobile2=$request->input('mobile2');
        $customer->address1=$request->input('address1');
        $customer->address2=$request->input('address2');
        $customer->state=$request->input('state');
        $customer->po=$request->input('po');
        $customer->area=$request->input('area');
        $customer->city=$request->input('city');
        $customer->pin=$request->input('pin');
        $customer->opening_balance=$request->input('opening_balance');
        $customer->transaction_type_id=$request->input('transaction_type_id');

        $customer->save();
        $subset = $customer->only(['id', 'ledger_name','billing_name','ledger_group_id','customer_category_id','email','mobile1',
            'mobile2','address1','address2','city','state','po','area','pin','opening_balance','transaction_type_id']);
        return response()->json(['success'=>1,'data'=>$subset], 200);
    }

    public function updateCustomer(Request $request)
    {
        $customer=Ledger::find($request->input('id'));
        if($request->input('ledger_name')){
            $customer->ledger_name=$request->input('ledger_name');
        }
        if($request->input('billing_name')){
            $customer->billing_name=$request->input('billing_name');
        }
        if($request->input('customer_category_id')){
            $customer->customer_category_id=$request->input('customer_category_id');
        }
        if($request->input('email')){
            $customer->email=$request->input('email');
        }
        if($request->input('password')){
            $customer->password=$request->input('password');
        }

        if($request->input('mobile1')){
            $customer->mobile1=$request->input('mobile1');
        }

        if($request->input('mobile2')){
            $customer->mobile2=$request->input('mobile2');
        }

        if($request->input('address1')){
            $customer->address1=$request->input('address1');
        }

        if($request->input('address2')){
            $customer->address2=$request->input('address2');
        }

        if($request->input('state')){
            $customer->state=$request->input('state');
        }

        if($request->input('po')){
            $customer->po=$request->input('po');
        }

        if($request->input('area')){
            $customer->area=$request->input('area');
        }

        if($request->input('city')){
            $customer->city=$request->input('city');
        }

        if($request->input('pin')){
            $customer->pin=$request->input('pin');
        }
        if($request->input('opening_balance')){
            $customer->opening_balance=$request->input('opening_balance');
        }
        if($request->input('transaction_type_id')){
            $customer->transaction_type_id=$request->input('transaction_type_id');
        }

        $customer->save();
        return response()->json(['success'=>1,'data'=>$customer], 200,[],JSON_NUMERIC_CHECK);
    }
    public function updateCustomerByID($id,Request $request)
    {
        $customer=User::find($id);
        if($request->input('ledger_name')){
            $customer->ledger_name=$request->input('ledger_name');
        }
        if($request->input('billing_name')){
            $customer->billing_name=$request->input('billing_name');
        }
        if($request->input('customer_category_id')){
            $customer->customer_category_id=$request->input('customer_category_id');
        }
        if($request->input('email')){
            $customer->email=$request->input('email');
        }

        if($request->input('mobile1')){
            $customer->mobile1=$request->input('mobile1');
        }

        if($request->input('mobile2')){
            $customer->mobile2=$request->input('mobile2');
        }

        if($request->input('address1')){
            $customer->address1=$request->input('address1');
        }

        if($request->input('address2')){
            $customer->address2=$request->input('address2');
        }

        if($request->input('state')){
            $customer->state=$request->input('state');
        }

        if($request->input('po')){
            $customer->po=$request->input('po');
        }

        if($request->input('area')){
            $customer->area=$request->input('area');
        }

        if($request->input('city')){
            $customer->city=$request->input('city');
        }

        if($request->input('pin')){
            $customer->pin=$request->input('pin');
        }
        if($request->input('opening_balance')){
            $customer->opening_balance=$request->input('opening_balance');
        }

        if($request->input('transaction_type_id')){
            $customer->transaction_type_id=$request->input('transaction_type_id');
        }

        $customer->save();
        return response()->json(['success'=>1,'data'=>$customer], 200,[],JSON_NUMERIC_CHECK);
    }
    public function deleteCustomerByID($id)
    {
        $res = Ledger::destroy($id);
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
