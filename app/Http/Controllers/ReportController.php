<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        if ($sort != 'asc' && $sort != 'desc') {
            $sort = 'desc';
        }

        $status = $request->input('status');
        $validate = $request->validate([
            'status' => "exists:statuses,id"
        ]);

        if ($validate) {
            $reports = Report::where('status_id', $status)
                ->where('user_id', Auth::user()->id)
                ->orderBy('created_at', $sort)
                ->paginate(8);
        } else {
            $reports = Report::where('user_id', Auth::user()->id)
                ->orderBy('created_at', $sort)
                ->paginate(3);
        }
        $statuses = Status::all();

        return view('report.index', compact('reports', 'statuses', 'sort', 'status'));
    }

    public function create()
    {
        return view('report.create');
    }

    public function store(Request $request, Report $report)
    {
        $data = $request->validate([
            'number' => 'string',
            'description' => 'string',
            'path_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $imageName = Storage::disk('public')->put('reports', $request->file('path_img'));
        

        Report::create([
            'number' => $request->number,
            'description' => $request->description,
            'status_id' => 1,
            'path_img' => $imageName,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back()->with('success', 'Заявление отправлено!');
    }

    public function show(Report $report)
    {
        return view('report.show', compact('report'));
    }

    public function edit(Report $report)
    {
        if (Auth::user()->id === $report->user_id) {
            return view('report.edit', compact('report'));
        } else {
            abort(403, 'У вас нет прав на редактирование этой записи.');
        }
    }

    public function update(Request $request, Report $report)
    {
        if (Auth::user()->id === $report->user_id) {
            $validated = $request->validate([
                'number' => 'string',
                'description' => 'string',

            ]);
        } else {
            abort(403, 'У вас нет прав.');
        }


        $report->update($validated);
        return redirect()->back();
    }

    public function destroy(Report $report)
    {
        if (Auth::user()->id === $report->user_id) {
            $report->delete();
        } else {
            abort(403, 'У вас нет прав.');
        }
        return redirect()->route('reports.index');
    }


    public function statusUpdate(Request $request, Report $report)
    {
        $request->validate([
            'status_id' => 'required|exists:statuses,id',
        ]);

        $report->update($request->only(['status_id']));

        return redirect()->back();
    }
}
