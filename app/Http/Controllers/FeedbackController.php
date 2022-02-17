<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(){
        $feedbacks = Feedback::all();
        return view('pages.feedbacks.all',[
            'feedbacks' => $feedbacks
        ]);
    }
    public function create(){
        return view('pages.feedbacks.add');
    }
    public function store(Request $request){
        $feedback = Feedback::create([
            'user_id' => $request->user_id,
            'rating' => $request->rate,
            'message' => $request->message
        ]);
        return redirect('thank-you')->with('success','Your feedback has been recorded by the system!');
    }
    public function delete($id){
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return back();
    }
}
