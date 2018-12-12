<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MdlRMBACCOUNTS; //model-DB
use Session; //session

use App\Http\Requests\LoginRequest; //validator

class LoginCtrl extends Controller
{
    public function login(LoginRequest $request){
        
        $accountid = $request->accountid;
        $password = $request->password;

        $checkuser = MdlRMBACCOUNTS::where('RMBACCNTID', $request->accountid)
                    ->where('RMBACCNTPASSWORD', $request->password)
                    ->count();

        if($checkuser > 0){
            $sess = MdlRMBACCOUNTS::where('RMBACCNTID', $request->accountid)->get();
            $request->session()->put('session', $sess);

            return redirect('/home');
        }
        else{
            return redirect()->back()->withErrors('Account not found! Please try again.');
        }
    }

    public function logout(){
        $request->session()->flush();
        return redirect('/');
    }
}


