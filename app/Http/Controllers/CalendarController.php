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
      
        $command = new \App\Service\Event\StoreEvent();

        $event = $command->execute($validated, 1);
    
        return response()->json([
            "message" => "Successfully Saved",
            "data" => $event
        ], Response::HTTP_OK);
    }
}
