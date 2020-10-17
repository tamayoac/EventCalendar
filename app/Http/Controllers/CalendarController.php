<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequestEvent;
use App\Models\Event;

class CalendarController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $event = Event::find(1);

            return response()->json($event);
        }
        return view('calendar.index');
    }
    public function store(StoreRequestEvent $request)
    {
        $validated = $request->validated();
      
        $daysOfWeek = $this->implodeDays($validated);
        
        $event = Event::find(1);

        if(!$event) {
            $event = new Event();
        }

        $event->event_name = $validated['event_name'];
        $event->event_from = $validated['event_from'];
        $event->event_to = $validated['event_to'];
        $event->daysOfWeek = $daysOfWeek;
        $event->save();
     

        return response()->json([
            "message" => "Successfully Saved",
            "data" => $event
        ], Response::HTTP_OK);
    }
    public function implodeDays($data)
    {
        
        $daysOfWeek = array();
        
        if(isset($data['monday']))
        {
            array_push($daysOfWeek, $data['monday']);
        }
        if (isset($data['tuesday']))
        {
            array_push($daysOfWeek, $data['tuesday']);
        }
        if (isset($data['wednesday']))
        {
            array_push($daysOfWeek, $data['wednesday']);
        }
        if (isset($data['thursday']))
        {
            array_push($daysOfWeek, $data['thursday']);
        }
        if (isset($data['friday']))
        {
            array_push($daysOfWeek, $data['friday']);
        }
        if (isset($data['saturday']))
        {
            array_push($daysOfWeek, $data['saturday']);
        }
        if (isset($data['sunday']))
        {
            array_push($daysOfWeek, $data['sunday']);
        }

        $converted = implode(",", $daysOfWeek);

        return $converted;
    }
}
