<?php

namespace App\Http\Controllers;

use App\Models\cultures; // Ensure your models are properly imported
use App\Models\Signaler;
use App\Models\User;
use Illuminate\Support\Facades\DB; // For DB operations

class StatisticsController extends Controller
{
    public function statistics()
    {
        // Calendar Statistics
        $totalCalendars = cultures::count();
        
        $calendarsByType = cultures::select('etapes', DB::raw('COUNT(*) as count'))
            ->groupBy('etapes')
            ->get()
            ->pluck('count', 'etapes');
        
        $calendarsPerFarmer = User::select('users.id', 'users.name', DB::raw('COUNT(cultures.id) as calendar_count'))
            ->join('cultures', 'users.id', '=', 'cultures.id_agriculteur')
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('calendar_count')
            ->take(5)
            ->get();
    
        // Signal Statistics
        $totalSignals = Signaler::count();
        
        $signalsPerCalendar = cultures::select('cultures.id', 'cultures.name', 'cultures.etapes', DB::raw('COUNT(signalers.id) as signal_count'))
            ->leftJoin('signalers', 'cultures.id', '=', 'signalers.id_culture')
            ->groupBy('cultures.id', 'cultures.name', 'cultures.etapes')
            ->orderByDesc('signal_count')
            ->take(5)
            ->get();
    
        // Monthly Data (last 6 months)
        $calendarMonthlyData = cultures::selectRaw('COUNT(*) as count, YEAR(created_at) year, MONTH(created_at) month')
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
    
        $signalMonthlyData = Signaler::selectRaw('COUNT(*) as count, YEAR(created_at) year, MONTH(created_at) month')
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
    
        $monthlyLabels = [];
        $calendarMonthlyCounts = [];
        $signalMonthlyCounts = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthlyLabels[] = $date->format('M Y');
            
            $calendarMatch = $calendarMonthlyData->firstWhere(function($item) use ($date) {
                return $item->year == $date->year && $item->month == $date->month;
            });
            
            $signalMatch = $signalMonthlyData->firstWhere(function($item) use ($date) {
                return $item->year == $date->year && $item->month == $date->month;
            });
            
            $calendarMonthlyCounts[] = $calendarMatch ? $calendarMatch->count : 0;
            $signalMonthlyCounts[] = $signalMatch ? $signalMatch->count : 0;
        }
    
        return view('admin.index', compact(
            'totalCalendars',
            'calendarsByType',
            'calendarsPerFarmer',
            'totalSignals',
            'signalsPerCalendar',
            'monthlyLabels',
            'calendarMonthlyCounts',
            'signalMonthlyCounts'
        ));
    }

}