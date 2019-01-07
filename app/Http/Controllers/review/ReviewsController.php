<?php

namespace App\Http\Controllers\review;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;
use App\Reviewing;
use App\EventTemplateTask;
class ReviewsController extends Controller
{ 
    public static function israted($event_id,$task_id)
    {
        $ett = EventTemplateTask::where('event_id',$event_id)->where('task_id',$task_id)->get();
        $ett = $ett[0];

        if($ett->booking_id)
        {
            if($ett->israted==1) return 1;
            else return 0;
        }
        return 3;
    
    }

    public function getModal($event_id,$task_id)
    {
        $ett = EventTemplateTask::where('event_id',$event_id)->where('task_id',$task_id)->get();

        return view('client.rate')->with('ett',$ett[0]);
    }

    public function save(Request $request)
    {
       $review = new Review();
       $review->description = $request->reviewText;
       $review->numberOfstars = $request->selected_rating;
       $review->save();

       $reviewing = new Reviewing();
       $reviewing->service_provider_id = $request->svp;
       $reviewing->service_id = $request->service;
       $reviewing->customer_id = $request->client;
       $reviewing->review_id = $review->review_id;
       $reviewing->save();

    //    $ett = EventTemplateTask::where('event_id',$request->event)->where('task_id',$request->task)->first()->get();
    //    $ett->israted = 1;
    //    $ett->save();

    DB::table('event_template_tasks')->where('event_id', '=', $request->event)
    ->where('task_id', '=', $request->task)
    ->update(array('israted' => 1));

    }
}