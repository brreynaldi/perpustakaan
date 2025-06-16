<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index()
    {
        $monthlyData = Borrowing::selectRaw('MONTH(borrowed_at) as month, COUNT(*) as total')
            ->whereYear('borrowed_at', now()->year)
            ->groupByRaw('MONTH(borrowed_at)')
            ->pluck('total', 'month');

        // Siapkan array 12 bulan
        $months = collect(range(1, 12))->map(function ($month) use ($monthlyData) {
            return $monthlyData[$month] ?? 0;
        });

        return view('home', [
            'labels' => json_encode([
                'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
            ]),
            'data' => json_encode($months->values())
        ]);
    }

}
