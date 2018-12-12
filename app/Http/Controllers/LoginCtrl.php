<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MdlRMBACCOUNTS; //model-DB
use App\Models\MdlRMBACCOUNTS_SESS;

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

            /* MdlRMBACCOUNTS_SESS::create([
                $SESS_ACCNTID => $accountid,
                $SESS_IPADD => request()->ip(),
                $SESS_AGENT => $request->server('HTTP_USER_AGENT'),
                $SESS_LASTACTIVITY => GETDATE()
            ]); */
            
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


