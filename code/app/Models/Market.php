<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Market extends Model
{
    use HasFactory;
    public $table_count = 6321204;

    public function deletePercentageData($year, $quarter){

        $count = $this->table_count;
        $percent_count = (int)round($count * 0.1);

        $return = DB::delete("
            delete from market_{$year}_{$quarter} order by MktFare desc limit {$percent_count}
        ");

        $return = DB::delete("
            delete from market_{$year}_{$quarter} order by MktFare asc limit {$percent_count}
        ");

        return $return;
    }

    public function getCount($year, $quarter){

        $count = DB::select("select count(MktID) as count from market_{$year}_{$quarter}");
        $percent_count = (int)round($count * 0.1);
//        dd($percent_count);
        return $count[0]->count;

    }
}
