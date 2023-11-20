<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    
    public function add()
    {
        return view('add-account');
    }

    public function save(Request $request)
    {
        
        if ($request->input("inputType") == "personnel")  {
            return redirect('add-account/add')->withInput();
          } else {
            $b = new Account;
            $b->timestamps = false;
            $b->email = $request->input("email");
            $b->password = $request->input("password");
            $b->tel = $request->input("tel");
            $b->name = $request->input("name");
            $b->firstname = $request->input("firstname");
            $b->date = $request->input("date");
            $b->adress = $request->input("adress");
            
            $b->save();
    
            return redirect('/');
          
          } }
}
