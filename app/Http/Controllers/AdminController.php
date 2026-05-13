<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $reports = Report::with('status')->paginate(10);
        $statuses = Status::all();
        return view('admin.index', compact('reports', 'statuses'));
    }
    public function updateStatus(Request $request, Report $report)
    {
        $request->validate([
            'status_id' => 'required|exists:statuses,id',
        ]);
        if ($report->status->name == 'Новое') {

            $report->update([
                'status_id' => $request->status_id
            ]);
        }

        return redirect()->back();
    }
}
