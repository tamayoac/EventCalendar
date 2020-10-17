<?php

namespace App\Service\Event;

use App\Models\Event;

class StoreEvent extends \App\Service\BaseCommand
{
	public function doCommand($data, $usr)
	{
        $daysOfWeek = $this->implodeDays($data);
        
        $event = Event::find($usr);

        if(!$event) {
            $event = new Event();
        }

        $event->event_name = $data['event_name'];
        $event->event_from = $data['event_from'];
        $event->event_to = $data['event_to'];
        $event->daysOfWeek = $daysOfWeek;
        $event->save();

        return $this->createReturn(200, 'Event Successfully Created', $event);
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