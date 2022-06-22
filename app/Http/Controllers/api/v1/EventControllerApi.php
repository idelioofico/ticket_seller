<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventTopic;
use App\Models\EventType;
use Illuminate\Http\Request;

class EventControllerApi extends Controller
{


        public function index(Request $request)
        {
                $param = $request->param;
                $categories = EventType::where('name', 'like', $param)->get();
                $topics = EventTopic::where('name', 'like', $param)->get();
                $events = Event::whereIn('event_type_id', $categories)->orWhereIn('topic_id', $topics)->get();

                return response()->json(['data' => $events]);
        }

        public function categories()
        {
                $types=EventType::get()->pluck('name')->toArray();
                $topics=EventTopic::get()->pluck('name')->toArray();
                $categories=array_merge($types,$topics);

                $vent_types = strtolower(implode(",",$categories));

                return response()->json(['data' => $vent_types], 200);
        }
}
