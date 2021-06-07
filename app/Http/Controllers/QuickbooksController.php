<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use QuickBooksOnline\API\Facades\Customer;
use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;

class QuickbooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    

    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $token = $provider->getAccessToken()['access_token'];

    $response = Http::withToken($token)->get('https://api-m.sandbox.paypal.com/v1/billing/plans');
    $status = $response->successful();
    $response = collect($response->collect()['plans']);
    

    $response = $response->map(function($item,$key) use ($token) {
        $item['details'] =  Http::withToken($token)->get('https://api-m.sandbox.paypal.com/v1/billing/plans/'.$item['id'])->collect()['billing_cycles'];
        return $item;
    });
 
    if ($status == true) {
        $allitems = $response->collect();
    } else{
        $allitems = collect([]);
    }
    
    //dd($allitems);
       return view('welcome',["data" => collect($allitems)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo 'hello';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (Auth::id()) {
           $subscription = User::find(Auth::id())->subscription->where('status', 0)->first();
        } else {
           $subscription = collect([]);
        }
       
       
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken()['access_token'];
        $response = Http::withToken($token)->get('https://api-m.sandbox.paypal.com/v1/billing/plans/'.$id)->collect()->except('payment_preferences','usage_type','quantity_supported','create_time','update_time');
   
        $response['price'] = collect($response['billing_cycles'])->pluck('pricing_scheme')->pluck('tiers')[0];
     
        return view('Details.details',["data" => $response, "subscription" => $subscription]);
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
