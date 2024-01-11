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

    public function dashboardtransaction(){
        // dd($request->timePeriod);
        


        $data['dataToday'] = [];
      
        $data['timePeriod'] = request('timePeriod');
        $data['startDate'] = request('startDate');
        $data['endDate'] = request('endDate');
// dd($data);
        // Set start date based on the selected time period
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

        // dd($data['today']);

    // $dataLastWeek = DB::table('transactions')
    // ->whereBetween('created_at', [$startDate, $endDate])
    // ->sum('total_price');



        // $data_count = ($dataThisWeek - $dataLastWeek)/ $dataLastWeek * 100 ;

        // $data = array($data_this_week, $data_count);
        // return $data;
        return response()->json($data);


    }

    public function weeklySalesChangePrecentage(){

        $data =  array('120','200');

        // $data = ($dataThisWeek - $dataLastWeek) / abs($dataLastWeek) * 100;

        

        return $data;
        
    }

}
