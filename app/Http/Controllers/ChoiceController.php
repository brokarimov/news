<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Choice;
use Illuminate\Http\Request;

class ChoiceController extends Controller
{


    public function create($poll)
    {
        if (auth()->user()->role == 'admin') {
            return view('pages.create.choice-create', ['poll' => $poll]);
        } else {
            return redirect('/login');
        }
    }
    public function store(Request $request)
    {
        if (auth()->user()->role == 'admin') {
            $request->validate([
                'title' => 'required|max:255',
            ]);
            $data = $request->all();
            // dd($data);
            Choice::create($data);
            return redirect('/poll')->with('success', 'Ma\'lumot qo\'shildi!');
        } else {
            return redirect('/login');
        }

    }

    public function answer(Request $request)
    {
        $poll_id = $request->input('poll_id');
        $choice_id = $request->input('choice_id');
        $user_ip = $request->ip();

        $existAnswer = Answer::where('poll_id', $poll_id)
            ->where('choice_id', $choice_id)
            ->where('user_ip', $user_ip)
            ->first();

        if (!$existAnswer) {
            $data = [
                'poll_id' => $poll_id,
                'choice_id' => $choice_id,
                'user_ip' => $user_ip
            ];

            Answer::create($data);
        }

        return redirect('/poll_Index');
    }

    public function deleteAnswer(Request $request)
    {
        $choice_id = $request->choice_id;
        $user_ip = $request->ip();
        $poll_id = $request->poll_id;
        
        $answer = Answer::where('poll_id', $poll_id)
            ->where('user_ip', $user_ip)
            ->first();
        if ($answer) {
            if ($answer->user_ip === $user_ip) {
                $answer->delete();
                return redirect('/poll_Index');
            } else {
                return redirect('/poll_Index');
            }
        } else {
            return redirect('/poll_Index');
        }
    }
}
