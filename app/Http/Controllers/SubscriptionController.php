<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\SubscriptionHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       $subscription = User::find(Auth::id())->subscription->where('status', 0)->first();

       $provider = new PayPalClient;
       $provider->setApiCredentials(config('paypal'));
       $token = $provider->getAccessToken()['access_token'];

       $list_of_subs = Http::withToken($token)->get('https://api-m.sandbox.paypal.com/v1/billing/plans');
       $list_of_subs = collect($list_of_subs->collect()['plans']);
      
       if($subscription == null)
       {
        $subscription = User::find(Auth::id());
       }else{
       
       $s_id = $subscription->subscription_id;
       $p_id = $subscription->product_id;


       //dd(Subscription::find($subscription->subscription_id));

        $response = Http::withToken($token)->get('https://api-m.sandbox.paypal.com/v1/billing/subscriptions/'.$s_id)->collect();

        $list_of_subs = $list_of_subs->where('id','!=',$p_id);

        $subscription['from_paypal'] = $response;
       }        
        
       // dd($subscription);
        //dd($subscription);
        //dd($subscription->from_paypal['quantity']);
       
       return view('Details.subscription', ['data' => $subscription, 'list_of_subs' => $list_of_subs ]);
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
        

       $provider = new PayPalClient;
       $provider->setApiCredentials(config('paypal'));
       $token = $provider->getAccessToken()['access_token'];

       $response = Http::withToken($token)->post('https://api-m.sandbox.paypal.com/v1/billing/subscriptions/'.$id.'/revise',
        [   
            'plan_id' => $request->actual_id,
            'quantity' => $request->qty,
            'shipping_address' => [
                'name' => [
                    'full_name' => 
                    $request->fullname
                ],
                'address' =>  [
                    'address_line_1' => $request->address_line_1,
                    'admin_area_2' => $request->admin_area_2,
                    'admin_area_1' => $request->admin_area_1,
                    'postal_code' => $request->postal_code,
                    'country_code' => $request->country_code
                ]
            ],
            'application_context' => [
                'shipping_address' => 'SET_PROVIDED_ADDRESS'
            ]
        ]

    )->collect();
        
    if($request->type == 'upgrade'){

        $sub_details = Subscription::where(['subscription_id' => $id, 'user_id' => Auth::id()])->update(['product_id' => $request->actual_id, 'product_name' => $request->new_name,'product_description' => $request->new_description]);

        $subscriptionHistory = [ 
            "subscription_id" => $id,
            "from_product_id" => $request->current_prod_id,
            "from_number_of_users" => $request->current_qty,
            "to_product_id" => $request->actual_id,
            "to_number_of_users" => $request->qty,
            "action" => 'upgrade',
            "action_date" => Carbon::now()
        ];

     }else{

        $subscriptionHistory = [ 
            "subscription_id" => $id,
            "from_product_id" => $request->current_prod_id,
            "from_number_of_users" => $request->current_qty,
            "to_product_id" => $request->current_prod_id,
            "to_number_of_users" => $request->qty,
            "action" => 'update',
            "action_date" => Carbon::now()

         ];
     }
    
     

       SubscriptionHistory::create($subscriptionHistory);

       return response()->json(['success' => true]);
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
    
    
       $provider = new PayPalClient;
       $provider->setApiCredentials(config('paypal'));
       $token = $provider->getAccessToken()['access_token'];

       $response = Http::withToken($token)->post('https://api-m.sandbox.paypal.com/v1/billing/subscriptions/'.$id.'/cancel', ['reason' => $request->reason])->collect();
       $sub_details = Subscription::where(['subscription_id' => $id, 'user_id' => Auth::id()])->update(['status' => '1', 'cancelled_date' => Carbon::now()]);
       
        $subscriptionHistory = [ 
            "subscription_id" => $id,
            "from_product_id" => $request->actual_id,
            "from_number_of_users" => $request->current_qty,
            "to_product_id" => $request->actual_id,
            "to_number_of_users" => $request->current_qty,
            "action" => 'cancelled',
            "action_date" => Carbon::now()

         ];

       SubscriptionHistory::create($subscriptionHistory);


       return response()->json(['success' => true]);

    
    }
}
