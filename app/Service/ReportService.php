<?php

namespace App\Service;

use App\Models\Inventory;
use App\Models\InventoryLog;
use Carbon\Carbon;


class ReportService
{

    public function reportFilter($request)
    {
        $report = "";
        $start_date = $request->start_date;
        $product = Inventory::all();
        $product_id = $request->product_id;
        $end_date = Carbon::parse($request->end_date)->addDays(1);
        if($request->product_id == 'all'){
            $report = InventoryLog::whereBetween('created_at', [$start_date, $end_date])->with('inventory')->paginate(10);
        }else{
            $report = InventoryLog::where('item_id',$request->product_id)->whereBetween('created_at', [$start_date, $end_date])->with('inventory')->paginate(10);
        }
        return view('backend.report.report',compact('report','product','product_id'));
    }

}
