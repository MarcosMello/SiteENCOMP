<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\LogService;

class LogController extends Controller
{
    private LogService $logService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $logs = $this->logService->index();
        return view('admin.log.index', compact('logs'));
    }
}
