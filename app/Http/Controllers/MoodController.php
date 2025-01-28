<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoodController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['mood' => 'required|string']);

        Mood::create([
            'user_id' => Auth::id(),
            'mood' => $request->mood,
        ]);

        return redirect()->route('mood')->with('success', 'Mood logged successfully!');
    }

    public function history()
    {
        $moods = Mood::where('user_id', Auth::id())->get();
        $moodData = $moods->groupBy('mood')->map->count();

        return view('mood', compact('moodData'));
    }
}
