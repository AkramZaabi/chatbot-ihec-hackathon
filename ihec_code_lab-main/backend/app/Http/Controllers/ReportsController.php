<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function ReportsNew(Request $request)
    {
        $check = Reports::where("question", "=", $request->question)->first();
        if ($check) {
            $check->update([
                "Numbers" => $check->Numbers + 1
            ]);
            return response()->json(["data" => "Updated"], 200);
        } else {
            Reports::create([
                "question" => $request->question,
                "Numbers" => 1
            ]);
            return response()->json(["data" => "Created"], 201);
        }
    }

    public function getReports(){
        $reports=Reports::orderByDesc("Numbers")->take(5)->get();
        return response()->json(["data" => $reports], 200);
    }
}
