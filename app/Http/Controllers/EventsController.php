<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EventsFormRequest;
use App\Rules\TimeValidation;

class EventsController extends Controller
{
    public function Events(){
        $eventsd=Events::all();
        return view('admin.events',compact('eventsd'));
    }
    public function Create(){
        return view('admin.createevents');
    }
    public function Store(EventsFormRequest $request){
   
        $data = $request -> validated();
        
         $events = new Events;
         $events->name = $data['name'];
         $events->type = $data['type'];
         $events->description = $data['description'];
         $events->image_path = $data['image_path'] ?? '';
         $events->event_date = $data['event_date'];
         $events->event_time = $data['event_time'];
         $events->location = $data['location'];
        
         
         $events->save();
     
         return redirect()->route('admin.events')->with('message', 'Post added successfully');
     }
     public function Edit($events_id){
        $eventsd=Events::find($events_id);
        return view('Admin.editevents',compact('eventsd'));
    }
    public function Update(EventsFormRequest $request, $events_id){
        $data = $request -> validated();
   
    $events = Events::find($events_id);
        $events->name = $data['name'];
         $events->type = $data['type'];
         $events->description = $data['description'];
         $events->image_path = $data['image_path'] ?? '';
         $events->event_date = $data['event_date'];
         $events->event_time = $data['event_time'];
         $events->location = $data['location'];
        
    
    $events->update();

    return redirect()->route('admin.events')->with('message', 'Post updated successfully');
    }
    public function Destroy($events_id){
        $eventsd=Events::find($events_id);
        $eventsd->delete();
        return redirect()->route('admin.events')->with('message', 'Post Deleted successfully');
    }
}
