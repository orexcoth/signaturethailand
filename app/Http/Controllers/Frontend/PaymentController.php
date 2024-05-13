<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\sellsModel;
use App\Models\preordersModel;
use App\Models\customersModel;

class PaymentController extends Controller
{
    public function paymentPage(Request $request, $type, $order)
    {
        // $rr = 'test';

        $orderdata = '';
        if($type=='sell'){
            $orderdata = sellsModel::find($order); 
            $lasttotal = $orderdata->total;
        }elseif($type=='preorder'){
            $orderdata = preordersModel::find($order);
            $lasttotal = $orderdata->total_price;
        }

        if($orderdata['customers_id']){
            $customer = customersModel::find($orderdata['customers_id']);
        }
        // dd($customer);
        $data = new \stdClass(); // Create an empty object
        $data->apikey = env('CHILLPAY_API_KEY');
        $data->merchantid = 'M035329';
        $data->orderno = $orderdata['number'];
        $data->customerid = $orderdata['customers_id'];
        $data->mobileno = $customer->phone;
        $data->clientip = '182.53.98.30';
        $data->routeno = 1;
        $data->currency = "764";
        $data->description = 'test';
        $data->amount = $lasttotal;
        // dd($data);


        // $chillpay = new Client(env('CHILLPAY_API_KEY'), env('CHILLPAY_API_SECRET'));
        // $qrCodeUrl = $chillpay->getQRCodeUrl($amount, $orderId, $callbackUrl);

        return view('frontend/payment', [
            'default_pagename' => 'ชำระเงิน',
            'data' => $data,
            // 'qrCodeUrl' => $qrCodeUrl,
        ]);
    }
    public function paymentcallbackPage(Request $request)
    {
        dd($request);
        return view('frontend/payment', [
            'default_pagename' => 'ชำระเงิน',
        ]);
    }
}
