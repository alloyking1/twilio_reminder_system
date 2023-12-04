<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function __invoke(Request $request)
    {
        dd($request->all());
        $validated = $request->validate([
            'mobile_no' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'message' => 'required',
        ]);

        Reminder::create([
            'mobile_no' => $request->mobile_no,
            'date' => $request->date,
            'time' => $request->time,
            'message' => $request->message,
        ]);
        return to_route('home');
    }
}
