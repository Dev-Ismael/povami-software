<?php

namespace App\Http\Controllers;

use App\Models\payment_methods;
use App\Http\Requests\Storepayment_methodsRequest;
use App\Http\Requests\Updatepayment_methodsRequest;

class PaymentMethodsController extends Controller
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
     * @param  \App\Http\Requests\Storepayment_methodsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storepayment_methodsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\payment_methods  $payment_methods
     * @return \Illuminate\Http\Response
     */
    public function show(payment_methods $payment_methods)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\payment_methods  $payment_methods
     * @return \Illuminate\Http\Response
     */
    public function edit(payment_methods $payment_methods)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatepayment_methodsRequest  $request
     * @param  \App\Models\payment_methods  $payment_methods
     * @return \Illuminate\Http\Response
     */
    public function update(Updatepayment_methodsRequest $request, payment_methods $payment_methods)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\payment_methods  $payment_methods
     * @return \Illuminate\Http\Response
     */
    public function destroy(payment_methods $payment_methods)
    {
        //
    }
}
