<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
        
        // dd($response);
        return response()->json($response, $status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
