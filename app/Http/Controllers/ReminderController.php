<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReminderController extends Controller
{
    public function __invoke(Request $request)
    {
        //check form validation properly
        $validated = $request->validate([
            'phone_num' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'message' => 'required',
        ]);

        // dd($request->time);
        Reminder::create([
            'mobile_no' => $request->phone_num,
            'timezoneoffset' => Carbon::parse("{$request->date} {$request->time}"),
            'message' => $request->message,
        ]);
        return redirect()->back();
    }
}
