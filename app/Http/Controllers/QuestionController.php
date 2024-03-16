<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Score;
use App\Models\Tournment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function submitAnswers(Request $request,$id,$sco_id,$selectvalue)
    {
        // return $request->answers;
        $ans = Question::select('answer')->get();
        $score = Score::select('score')->get();
        $oldscore = $score[0]->score;
        $i = 0;
        foreach ($ans as $answer){
            if ($answer->answer == $request->answers[$i]){
                $oldscore+=10;
            }
            $i++;
            // return $request->answers;
        }
        $updated = Score::findorFail($sco_id);
        $updated->update([
            'team_id'=> $selectvalue,
            "user_id"=>$id,
            "score"=>$oldscore,
        ]);
        return view('score')->with('score',$score);
    }
}
