<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerControllerApi extends Controller
{
        /**
     * Display the specified resource.
     *s
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function consult(Request $request)
    {
        $response = array('data' => [], 'status' => $status = 404);
        $customer = Customer::where([['mobile_number', 'like', $request->mobile_number]])->first();
        // dd($customer);
        
        if (!empty($customer)) {

            $response = array('data' => $customer, 'status' => $status = 200);

        } else {

            Customer::create([
                'firstname' => 'Teste',
                'mobile_number' => $request->mobile_number
            ]);

            $response = array('data' => $customer, 'status' => $status = 202);
        }
        
        return response()->json($response, $status);
    }
}
