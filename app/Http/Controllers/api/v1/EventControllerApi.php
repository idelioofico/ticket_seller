<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\EventType;
use Illuminate\Http\Request;

class EventControllerApi extends Controller{



        public function categories()
        {
                $vent_types=strtolower(implode(", ",EventType::get()->pluck('name')->toArray()));

                return response()->json(['data'=>$vent_types],200);
        }

}
