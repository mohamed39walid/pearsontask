<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Question;
use App\Models\Score;
use App\Models\Tournment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    public function showsituationform($id){
        return view('jointournment')->with('id',$id);
    }
    public function showevents(Request $request,$id){
        $events = Event::all();
        $selectvalue = $request->situationselect;
        return view('showevent')->with('selectvalue',$selectvalue)->with('id',$id)->with('events',$events);
    }
    public function showquestions($id, $selectvalue) {
        $userIds = Score::pluck('user_id')->toArray();
        $score_id = Score::where('user_id', $id)->select('id')->get();
        $sco_id = $score_id[0]->id;
        if (in_array(Auth()->user()->id, $userIds)) {
            $questions = Question::select('id','question', 'answer')->get();
            return view('question')->with('questions', $questions)->with('id',$id)->with('selectvalue',$selectvalue)->with('sco_id',$sco_id); // Corrected with() method call
        } else {
            $score_id = Score::where('user_id', $id)->select('id')->get();
        $sco_id = $score_id[0]->id;

            Score::create([
                'team_id'=> $selectvalue,
                'user_id'=> Auth()->user()->id,
                'score' => 50
            ]);   
            $questions = Question::all();
            return view('question')->with('questions', $questions)->with('id',$id)->with('selectvalue',$selectvalue)->with('sco_id',$sco_id); // Corrected with() method call
        }
    }
    public function showuserscore(){
        $user_id = Auth()->user()->id;
        $oldscore = Score::where('user_id',$user_id)->select('score')->get();
        return view('score')->with('oldscore',$oldscore);
    }
}