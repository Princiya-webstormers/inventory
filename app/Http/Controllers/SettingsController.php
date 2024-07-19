<?php

namespace App\Http\Controllers;

use App\Service\SettingsService;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    private $settingsService;

    public function __construct(SettingsService $settingsService)
    {
        $this->middleware('auth');
        $this->settingsService = $settingsService;
    }
    public function index()
    {
        return view('backend.my_account');
    }
    public function profileUpdate(Request $request)
    {
        return $this->settingsService->profileUpdate($request);
    }
}
