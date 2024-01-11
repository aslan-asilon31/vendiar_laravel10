<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Models\Transaction;

class DashboardController extends Controller
{

    
    public function index(){
        return view('dashboard.index');
    }

    public function dashboardtoday(){
        $data['transactions'] = DB::table('transactions')
        ->whereDate('created_at', Carbon::today())
        ->count();
        $data['transaction_yesterday'] = DB::table('transactions')
        ->whereDate('created_at', Carbon::yesterday())
        ->count();

            // Hitung total_price transaksi hari ini
            $data['totalPriceToday'] = DB::table('transactions')
            ->whereDate('created_at', Carbon::today())
            ->sum('total_price');

            // Hitung total_price transaksi hari kemarin
            $data['totalPriceYesterday'] = DB::table('transactions')
                ->whereDate('created_at', Carbon::yesterday())
                ->sum('total_price');

            // Menghindari pembagian dengan nol
            if ($data['totalPriceYesterday'] != 0) {
                // Hitung persentase perubahan harga
                $data['priceChangePercentage'] = (($data['totalPriceToday'] - $data['totalPriceYesterday']) / $data['totalPriceYesterday']) * 100;
            } else {
                // Atur persentase perubahan harga menjadi null atau nilai default yang sesuai
                $data['priceChangePercentage'] = null;
            }
            $data['transaction_price_change_percentage'] = $data['priceChangePercentage'];

        // ========================================
        $data['orders'] = DB::table('orders')
        ->whereDate('created_at', Carbon::today())
        ->count();

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

    public function datacharttoday()
    {
        $currentDate = Carbon::today();
        $chartData = [];
    
        for ($hour = 0; $hour < 24; $hour++) {
            $startOfDay = $currentDate->copy()->hour($hour)->minute(0)->second(0);
            $endOfDay = $currentDate->copy()->hour($hour)->minute(59)->second(59);
    
            $transactions = Transaction::whereBetween('created_at', [$startOfDay, $endOfDay])
                ->sum('total_price');
    
            $chartData[] = $transactions;
        }
    
        // Log the query results
        \Log::info('Chart Data:', $chartData);
    
        return $chartData;
    }

    public function getChartData(Request $request)
    {
        $currentYear = date('Y');
        $chartData = [];

        // Fetch data for each month of the current year from the transactions table
        for ($month = 1; $month <= 12; $month++) {
            $transactions = Transaction::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $month)
                ->sum('total_price');

            // You might want to adjust the sum() based on your actual column structure
            $chartData[] = $transactions;
        }

        return response()->json(['data' => $chartData]);
    }

}
