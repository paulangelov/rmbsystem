<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MdlRMBACCOUNTS_SESS extends Model
{
    //
    const UPDATED_AT = null;
    const CREATED_AT = null;
    
    protected $table = "RMBACCOUNTS_SESS";

    protected $fillable = ['SESS_ACCNTID', 'SESS_IPADD', 'SESS_AGENT'];

}
