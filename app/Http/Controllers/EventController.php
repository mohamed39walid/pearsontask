<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tournment;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getdata(){
        $events = Event::all();
        return view('Eventsdashboard.eventsdashboard')->with('events',$events);
    }
    public function getaddform(){
        $tournments = Tournment::select('id','name')->get();
        return view('Eventsdashboard.addeventform')->with('tournments',$tournments);
    }
    public function addevent(Request $request){
        $request->validate([
            'eventname' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
            'eventdescription' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
        ], [
            'eventname.regex' => 'The :attribute field should not contain numeric values.',
            'eventdescription.regex' => 'The :attribute field should not contain numeric values.',
        ]);
        Event::create([
            'event_name'=>$request->eventname,
            'seats_number'=>20,
            'description'=>$request->eventdescription,
            'is_individual'=>$request->isindividual,
            'available_seats'=>20,
            'tournment_id'=>$request->tournmentid,
        ]);
        return redirect('/eventdashboard');
    }
    public function showupdateform($id){
        $event = Event::find($id);
        $tournments = Tournment::select('id','name')->get();
        return view('Eventsdashboard.updateform')->with('id',$id)->with('event',$event)->with('tournments',$tournments);
    }
    public function updateevent(Request $request,$id){
        $request->validate([
            'eventname' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
            'eventdescription' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
        ], [
            'eventname.regex' => 'The :attribute field should not contain numeric values.',
            'eventdescription.regex' => 'The :attribute field should not contain numeric values.',
        ]);
        $updatedevent = Event::findorFail($id);
        $updatedevent->update([
            'event_name'=>$request->eventname,
            'seats_number'=>20,
            'description'=>$request->eventdescription,
            'is_individual'=>$request->isindividual,
            'available_seats'=>20,
            'tournment_id'=>$request->tournmentid,
        ]);
        return redirect('/eventdashboard');
    }
    public function confirmeventdelete($id){
        return view('Eventsdashboard.confirmdeleteevent')->with('id',$id);
    }
    public function deleteevent($id){
        Event::findorFail($id)->delete();
        return redirect('/eventdashboard');
    }
}
