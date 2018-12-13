<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//DBModels
use App\Models\MdlRMBACCOUNTS; 
use App\Models\MdlRMBACCOUNTS_SESS; 

//Validator
use App\Http\Requests\LoginRequest;

//Session
use Session;
//Date--Carbon
use Carbon;

class LoginCtrl extends Controller
{
    public function login(LoginRequest $request){
        
        $accountid = $request->accountid;
        $password = $request->password;

        $checkuser = MdlRMBACCOUNTS::where('RMBACCNTID', $request->accountid)
                    ->where('RMBACCNTPASSWORD', $request->password)
                    ->count();

        if($checkuser > 0){
            //insert user account info in session
            $sess = MdlRMBACCOUNTS::where('RMBACCNTID', $request->accountid)->get();
            $request->session()->put('session', $sess);

            //session logs
            MdlRMBACCOUNTS_SESS::create([
                'SESS_ACCNTID' => $accountid,
                'SESS_IPADD' => request()->ip(),
                'SESS_AGENT' => $request->server('HTTP_USER_AGENT')
            ]); 
            
            return redirect('/home');
        }
        else{
            return redirect()->back()->withErrors('Account not found! Please try again.');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
}


