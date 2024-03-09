<?php

namespace App\Http\Controllers;

use App\Models\Tournment;
use App\Models\TournmentCategory;
use Illuminate\Http\Request;

class TournmentController extends Controller
{
    public function tournmentCategory()
    {
        return $this->belongsTo(TournmentCategory::class, 'id');
    }
    public function showtournments()
    {  
        $tournments = Tournment::select('id', 'name', 'description', 'events_number', 'category_id')->get();
        return view('Tournment.tournmentdashboard')->with('tournments',$tournments);
    }
    public function showaddform(){
        $categories_name = TournmentCategory::select('id','name')->get();
        return view('Tournment.addtournmentform')->with('categories_name',$categories_name);
    }
    public function addtournment(Request $request){
        $request->validate([
            'tournmentname' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
            'tournmentdescription' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
            'eventsnumber' => 'required|integer|min:5',
        ], [
            'tournmentname.regex' => 'The :attribute field should not contain numeric values.',
            'tournmentdescription.regex' => 'The :attribute field should not contain numeric values.',
        ]);
        Tournment::create([
            'name'=>$request->tournmentname,
            'description'=>$request->tournmentdescription,
            'events_number'=>$request->eventsnumber,
            'category_id'=>$request->categoryid,
        ]);
        return redirect('/tournmentdashboard');
    }
    public function showupdateform($id){
        $tournment = Tournment::find($id);
        $categories_name = TournmentCategory::select('id','name')->get();
        return view('Tournment.updatetournmentform')->with('id',$id)->with('categories_name',$categories_name)->with('tournment',$tournment);
    }
    public function updatetournment(Request $request,$id){
        $request->validate([
            'tournmentname' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
            'tournmentdescription' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
            'eventsnumber' => 'required|integer|min:5',
        ], [
            'tournmentname.regex' => 'The :attribute field should not contain numeric values.',
            'tournmentdescription.regex' => 'The :attribute field should not contain numeric values.',
        ]);
        
        $updatedata = Tournment::findorFail($id);
        $updatedata->update([
            'name'=>$request->tournmentname,
            'description'=>$request->tournmentdescription,
            'events_number'=>$request->eventsnumber,
            'category_id'=>$request->categoryid,
        ]);
        return redirect('/tournmentdashboard');
    }
    public function showconfirmdelete($id){
        return view('Tournment.confirmdelete')->with('id',$id);
    }
    public function deletetournment($id){
        Tournment::findorFail($id)->delete();
        return redirect('/tournmentdashboard');
    }
}
