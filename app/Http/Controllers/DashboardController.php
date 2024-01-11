<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{

    
    public function index(){
        return view('dashboard.index');
    }

    public function dashboardtoday(){
        $data['transactions'] = DB::table('transactions')
        ->whereDate('created_at', Carbon::today())
        ->count();

        $data['orders'] = DB::table('orders')
        ->whereDate('created_at', Carbon::today())
        ->count();
        

        // return $data;
        return response()->json($data);

    }

    public function dashboardweek()
    {
        $startOfWeek = Carbon::now()->startOfWeek(); // Start of the current week
        $endOfWeek = Carbon::now()->endOfWeek();     // End of the current week
    
        $data['transactions'] = DB::table('transactions')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();
    
        $data['orders'] = DB::table('orders')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();
    
        return response()->json($data);
    }

    public function dashboardmonth()
    {
        $startOfMonth = Carbon::now()->startOfMonth(); // Start of the current month
        $endOfMonth = Carbon::now()->endOfMonth();     // End of the current month

        $data['transactions'] = DB::table('transactions')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->count();

        $data['orders'] = DB::table('orders')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->count();

        return response()->json($data);
    }

    public function dashboardquarter()
    {
        $startOfQuarter = Carbon::now()->startOfQuarter(); // Start of the current quarter
        $endOfQuarter = Carbon::now()->endOfQuarter();     // End of the current quarter

        $data['transactions'] = DB::table('transactions')
            ->whereBetween('created_at', [$startOfQuarter, $endOfQuarter])
            ->count();

        $data['orders'] = DB::table('orders')
            ->whereBetween('created_at', [$startOfQuarter, $endOfQuarter])
            ->count();

        return response()->json($data);
    }

    public function dashboardsemester()
    {
        // Define the start and end months of each semester
        $startOfFirstSemester = Carbon::now()->startOfYear();
        $endOfFirstSemester = Carbon::now()->addMonths(5)->endOfMonth();

        $startOfSecondSemester = Carbon::now()->addMonths(6)->startOfMonth();
        $endOfSecondSemester = Carbon::now()->endOfYear();

        // Check which semester we are currently in and set the start and end accordingly
        if (Carbon::now()->month <= 5) {
            $startOfSemester = $startOfFirstSemester;
            $endOfSemester = $endOfFirstSemester;
        } else {
            $startOfSemester = $startOfSecondSemester;
            $endOfSemester = $endOfSecondSemester;
        }

        $data['transactions'] = DB::table('transactions')
            ->whereBetween('created_at', [$startOfSemester, $endOfSemester])
            ->count();

        $data['orders'] = DB::table('orders')
            ->whereBetween('created_at', [$startOfSemester, $endOfSemester])
            ->count();

        return response()->json($data);
    }

    public function dashboardyear()
    {
        $startOfYear = Carbon::now()->startOfYear(); // Start of the current year
        $endOfYear = Carbon::now()->endOfYear();     // End of the current year

        $data['transactions'] = DB::table('transactions')
            ->whereBetween('created_at', [$startOfYear, $endOfYear])
            ->count();

        $data['orders'] = DB::table('orders')
            ->whereBetween('created_at', [$startOfYear, $endOfYear])
            ->count();

        return response()->json($data);
    }

    public function dashboardtransactionperiod(){

        $data['dataToday'] = [];
      
        $data['timePeriod'] = request('timePeriod');
        $data['startDate'] = request('startDate');
        $data['endDate'] = request('endDate');
        switch ($data['timePeriod']) {
            case 'today':
                $data['today'] = DB::table('transactions')
                ->whereDate('created_at', '=', Carbon::today())
                ->sum('total_price');
            
                break;
            case 'week':
                $data['timePeriod'] = now()->startOfWeek();
                break;
            case 'month':
                $data['timePeriod'] = now()->startOfMonth();
                break;
            case 'quarter':
                $data['timePeriod'] = now()->startOfQuarter();
                break;
            case 'semester':
                $data['timePeriod'] = now()->startOfSemester(); // Assuming a custom function for this
                break;
            case 'year':
                $data['timePeriod'] = now()->startOfYear();
                break;
        }

        return response()->json($data);

    }

    public function weeklySalesChangePrecentage(){

        $data =  array('120','200');

        // $data = ($dataThisWeek - $dataLastWeek) / abs($dataLastWeek) * 100;

        return $data;
        
    }

}
