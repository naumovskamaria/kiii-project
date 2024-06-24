<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;

class RemindersController extends Controller
{
    public function index()
    {
        $reminders = Reminder::all();
        return response()->json($reminders);
    }

    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required',
            'due_date' => 'required',
        ]);

        Reminder::create($request->all());

        return response()->json(['message' => 'Stored.']);
    }

    public function show($reminder)
    {
        return response()->json(Reminder::find($reminder));
    }

    public function update(Request $request, $reminder)
    {
        $request->validate([
            'data' => 'required',
            'due_date' => 'required',
        ]);

        $reminder = Reminder::find($reminder);

        if(is_null($reminder)) {
            return response()->json(['message' => 'Not Found.'], 404);
        }

        $reminder->update($request->all());

        return response()->json(['message' => 'Updated.']);
    }

    public function destroy($reminder)
    {
        $reminder = Reminder::find($reminder);

        if(is_null($reminder)) {
            return response()->json(['message' => 'Not Found.'], 404);
        }

        $reminder->delete();

        return response()->json(['message' => 'Deleted.']);
    }}
