<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\EventType;
use Illuminate\Http\Request;

class EventControllerApi extends Controller{



        public function categories(Request $request)
        {
                $vent_types=implode(",",EventType::get()->pluck('name'));

                return response()->json(['data'=>$vent_types],200);
        }

}
