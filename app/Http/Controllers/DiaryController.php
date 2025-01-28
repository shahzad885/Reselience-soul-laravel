<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    public function index()
    {
        // Retrieve all diaries for the authenticated user
        $diaries = Diary::where('user_id', Auth::id())->get();

        // Pass the diaries to the view
        return view('dairy', ['diaries' => $diaries]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'entry' => 'required|string',
        ]);

        Diary::create([
            'entry' => $request->entry,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('diary')->with('success', 'Diary entry created successfully.');
    }
}
