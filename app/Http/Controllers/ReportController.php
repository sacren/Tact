<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController
{
    public function showYearMonth(Request $request, $year, $month = null)
    {
        $request->validate([
        ]);

        $month = $month ?? 'Not provided';

        return 'Report for year: ' . $year . ' and month: ' . $month;
    }
}
