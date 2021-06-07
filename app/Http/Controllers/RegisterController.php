<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Register.register');
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
         // $email = 'adriankimdy11@gmail.com';

         // Mail::to($email)->send(new VerifyEmail());

         // dd();

          $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'company' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = $request->all();

        $hashed_password = Hash::make($request->password);

         $user['password'] = $hashed_password;
        //make it to automatically login

        User::create($user);
       
        return redirect('login');
    
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        //     'subject'=>'required',
        //     'message' => 'required'
        //  ]);


     
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
