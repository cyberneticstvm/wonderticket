<?php

namespace App\Http\Controllers;

use App\Models\Winner;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reportWinner(){
        $winners = collect(); $inputs = [];
        return view('admin.reports.winner', compact('winners', 'inputs'));
    }

    public function reportWinnerFetch(Request $request){
        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required',
        ]);
        $inputs = array($request->from_date, $request->to_date, $request->play_id);
        $winners = Winner::whereBetween('date', [$request->from_date, $request->to_date])->when($request->play_id, function($query) use ($request){
            return $query->where('play_id', $request->play_id);
        })->get();
        return view('admin.reports.winner', compact('winners', 'inputs'));
    }

    public function reportSales(){
        $sales = collect(); $inputs = [];
        return view('admin.reports.sales', compact('sales', 'inputs'));
    }

    public function reportSalesFetch(Request $request){
        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required',
        ]);
        $inputs = array($request->from_date, $request->to_date, $request->play_id);
        $sales = collect();
        return view('admin.reports.sales', compact('sales', 'inputs'));
    }
}
