<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\SubscriptionHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       
        $transactions = Transaction::find(Auth::id())->get();
        //dd($transactions);
        //dd($transactions);
        //$subscription_id = $transactions->subscription_id;
        // $provider = new PayPalClient;
        // $provider->setApiCredentials(config('paypal'));
        // $token = $provider->getAccessToken()['access_token'];

       // $response = Http::withToken($token)->get('https://api-m.sandbox.paypal.com/v1/billing/subscriptions/'.$subscription_id.'/transactions?start_time=2021-01-01T07:50:20.940Z&end_time=2022-01-01T07:50:20.940Z');

        //dd( $transactions );
        if($transactions->isEmpty()) {
          $transactions = collecT([]);
        }


        //dd($transactions);
        return view('Details.transaction', ['data' => $transactions]);
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
        
        // dd($request->all());

       $transaction = [
        'subscription_id' => $request->subscription_id,
        'order_id' => $request->order_id,
        'number_of_users' => $request->quantity,
        'total_amount' => $request->total_amount,
        'product_id' => $request->product_id,
        'user_id' => Auth::id(),
        'email' => Auth::user()->email,
        'product_name' => $request->product_name,
        'product_description' => $request->product_description
       ];
       Transaction::create($transaction);

       $subscription = [
        'subscription_id' => $request->subscription_id,
        'product_id' => $request->product_id,
        'user_id' => Auth::id(),
        'status' => '0',
        'subscription_date' => Carbon::now(),
        'number_of_users' => $request->quantity,
        'product_name' => $request->product_name,
        'product_description' => $request->product_description
       ];
    
       Subscription::create($subscription);
       

       $subscriptionHistory = [ 
        "subscription_id" => $request->subscription_id,
        "from_product_id" => $request->product_id,
        "from_number_of_users" => $request->quantity,
        "to_product_id" => $request->product_id,
        "to_number_of_users" => $request->quantity,
        "action" => 'subscribed',
        "action_date" => Carbon::now()

       ];

       SubscriptionHistory::create($subscriptionHistory);

       return response()->json(['success' => true]);
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
