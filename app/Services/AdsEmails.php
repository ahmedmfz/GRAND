<?php 
 
 namespace App\Services;

use App\Jobs\SendAdEmail;
use App\Models\Advertisement;
use Illuminate\Support\Carbon;

class AdsEmails {

    // in case of grow up users in project must use chunk method
    public static function sendDailyEmails(){
       $ads = Advertisement::whereDate('start_date', Carbon::tomorrow())
       ->with('advertiser')
       ->get();
        dispatch(new SendAdEmail($ads));
    }

}