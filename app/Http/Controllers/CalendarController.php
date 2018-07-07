<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index()
    {
    	$user = Auth::user();

    	if(!$user->hasRole('admin')) {
    		return redirect('calendar');
    	}

    	return view('back-end.calendar.index');
    }

    public function todayEvent()
    {
        $event = Event::whereDate('day', now()->format('Y-m-d'))->orderBy('id', 'desc')->first();

        return $event->title;
    }

    public function calendar()
    {
    	$user = Auth::user();

    	if($user->hasRole('admin')) {
    		return redirect('admin/calendar');
    	}

    	return view('front-end.calendar.index');
    }


    public function renderMonth(Request $request)
    {
        Carbon::setLocale(config('app.locale'));
        setlocale(LC_TIME, 'es_ES');

        $date = new Carbon($request->date);
        $calendar = collect();

        $start = new Carbon($date->startOfMonth());
        $end = new Carbon($date->endOfMonth());

        // Relleno los espacios del inicio
        for($i = 0; $i < $start->dayOfWeek; $i++) {
            $calendar->push(collect(
                [
                    'day' => '',
                    'events' => '',
                    'show' => false,
                    'dayOfWeek' => ''
                ]
            ));
        }

        $close = false;

        $count = 1;
        
        // Se creen 
        while(!$close) {

            $events = Event::whereDate('day', $start->format('Y-m-d'))->get();

            $calendar->push(collect(
                [
                    'day' => $start->format('Y-m-d'),
                    'events' => $events,
                    'show' => false,
                    'dayOfWeek' => $start->dayOfWeek,
                    'dayShow' => $count
                ]
            ));

            $close = $start->format('Y-m-d') == $end->format('Y-m-d');

            $start = $start->addDay();
            $count++;
        }

        if($end->dayOfWeek < 6) {
            for($i = $end->dayOfWeek; $i < 6; $i++) {
                $calendar->push(collect(
                    [
                        'day' => '',
                        'events' => '',
                        'show' => false,
                        'dayOfWeek' => ''
                    ]
                ));
            }
        }

        $months = [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
        ];

        $month = (int) $date->format('m');
        $month = $months[$month-1];

        return [
            'month' => $month,
            'calendar' => $calendar
        ];

    }

    public function events(Request $request)
    {
        $date = new Carbon($request->date);

        $moth = $date->format('m');
    	
        $year = $date->format('Y');
        
        $events = Event::whereMonth('day', $moth)
            ->whereYear('day', $year)
            ->orderBy('day', 'ASC')
            ->get();

        $events->load('user');

    	return $events;
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $event = Event::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'day' => $request->day
        ]);

        return $event;
    }

    private function getEvents($moth)
    {
        return Event::whereMonth('day', $moth)->get();
    }
}
