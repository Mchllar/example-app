<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportingPeriod;
use Illuminate\Support\Facades\Redirect;

class ReportingPeriodController extends Controller
{
    public function index()
    {
        $reportingPeriods = ReportingPeriod::all();
        return view('reporting-periods.index', compact('reportingPeriods'));
    }

    public function create()
    {
        return view('reporting-periods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'year' => 'required|string|max:4',
            'status' => 'required|string|max:25',
        ]);

        ReportingPeriod::create($request->all());

        return redirect()->route('reporting-periods.index')->with('message', 'Reporting period created successfully.');
    }
    public function destroy($id)
{
    $reportingPeriod = ReportingPeriod::findOrFail($id);
    $reportingPeriod->delete();

    return Redirect::route('reporting-periods.index')->with('message', 'Reporting period deleted successfully.');
}
}
