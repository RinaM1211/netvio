<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports= Report::all();
        return view('report.index', ['reports' => $reports]);
    }

    public function create()
    {
        return view('report.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'string',
            'description' => 'string',
        ]);
        
        Report::create($validated);
        return redirect()->back();
    }

     public function show(Report $report)
    {
        return view('report.show', compact('report'));
    }

    public function edit(Report $report)
    {
        return view('report.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'number' => 'string',
            'description' => 'string',
        ]);
        
        $report->update($validated);
        return redirect()->back();
    }

    public function destroy(Report $report)
    {
        $report->delete();
        
        return redirect()->route('reports.index');
    }

}
