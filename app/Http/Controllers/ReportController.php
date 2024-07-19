<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Service\ReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->middleware('auth');
        $this->reportService = $reportService;
    }
    public function report()
    {
        return view('backend.report.report',['product' => Inventory::all()]);
    }
    public function reportFilter(Request $request)
    {
        return $this->reportService->reportFilter($request);
    }

}
