<?php

namespace App\Http\Controllers;

use App\Events\FeedBackEvent;
use App\Models\FeedBacks;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{

    public function getFeedBacks()
    {
        $feedbacks = FeedBacks::paginate(6);
        return response()->json(["data" => $feedbacks], 200);
    }
    public function AddFeedBack(Request $request)
    {
        $data = FeedBacks::create([
            "message" => $request->message
        ]);
       // broadcast(new FeedBackEvent());
        return response()->json(["data" => $data], 201);
    }

    public function DeleteFeedBack($id)
    {
        $data = FeedBacks::find($id);
        if ($data) {
            $data->delete();
            //broadcast(new FeedBackEvent());
        } else {
            return response()->json(["data" => $data], 201);
        }
    }
}
