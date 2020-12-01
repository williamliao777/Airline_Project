<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Form41 extends Model
{
    use HasFactory;

    public function getOpExpenseRevenue($year, $quarter){

        $return = DB::select("select CARRIER, sum(OP_EXPENSES) as expense, sum(OP_REVENUES) as revenues, sum(TRANS_REV_PAX) as passenger_revenue from op_rev_small where YEAR = {$year} and QUARTER = {$quarter} group by CARRIER");

        return $return;

    }


}
