<?php

namespace App\Http\Controllers;
use DB;
use App\orders;
use App\Orders_user;
use Illuminate\Http\Request;

use Response;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Orders_user::latest()->get();
        // $reports_pro = DB::table('order_products')->get();
        $reports_pro = DB::table('order_products')->get();
        
        // dd($reports_pro);
        // $parameters = DB::table('productparameter')->where('product_id', $product->id)->orderBy('parameter_id', 'ASC')->get();
        
        return view('reports.index', compact('reports', 'reports_pro'));
    }

    // public function export2()
    // {
    //     $table = orders::all();
    //     $filename = "test2.csv";
    //     $handle = fopen($filename, 'w+');
    //     fputcsv($handle, array('sep=,'));
    //     fputcsv($handle, array('name', 'description', 'staticprice'));

    //     foreach($table as $row) {
    //         fputcsv($handle, array($row['name'], $row['description'], $row['staticprice']));
    //     }

    //     fclose($handle);

    //     $headers = array(
    //         'Content-Type' => 'text/csv',
    //     );

    //     return Response::download($filename, 'test.csv', $headers);
    // }
    public function export2(Request $request)
    {
        $dateStart = $request->dateStart;
        $dateFinish = $request->dateFinish;
        $table = Orders_user::where('created_at', '>=', date($dateStart))->where('created_at', '<=', date($dateFinish))->get();
        // dd($table);
        $filename = "test2.csv";
        $handle = fopen($filename, 'w+');
        // fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
        fputs($handle, chr(0xEF) . chr(0xBB) . chr(0xBF)); // BOM
        @fputcsv($handle, array('sep=,'));
        fputcsv($handle, array('Imya','Telephone', 'Nomer zayavok', 'Gorod', 'Address', 'Obshaya cena', 'status', 'Vid oplaty', 'shippingttype', 'email'));

        foreach($table as $row) {
            fputcsv($handle, array(iconv('utf-8', 'windows-1251', $row['name']), 
            iconv('utf-8', 'windows-1251', $row['phone']), 
            iconv('utf-8', 'windows-1251', $row['description']), 
            iconv('utf-8', 'windows-1251', $row['city']), 
            iconv('utf-8', 'windows-1251', $row['address']), 
            iconv('utf-8', 'windows-1251', $row['totalprice']), 
            iconv('utf-8', 'windows-1251', $row['status']), 
            iconv('utf-8', 'windows-1251', $row['paymenttype']), 
            iconv('utf-8', 'windows-1251', $row['shippingttype']), 
            iconv('utf-8', 'windows-1251', $row['email'])
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename, 'test.csv', $headers);
    }

    public function export()
    {
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=file.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $reviews = orders::getReviewExport($this->hw->healthwatchID)->get();
        $columns = array('ReviewID', 'Provider', 'Title', 'Review', 'Location', 'Created', 'Anonymous', 'Escalate', 'Rating', 'Name');

        $callback = function() use ($reviews, $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach($reviews as $review) {
                fputcsv($file, array($review->reviewID, $review->provider, $review->title, $review->review, $review->location, $review->review_created, $review->anon, $review->escalate, $review->rating, $review->name));
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function searchdate(Request $request)
    {
        $dateStartSearch = $request->dateStartSearch;
        $dateFinishSearch = $request->dateFinishSearch;
        // $dateFinishSearch = require('dateFinishSearch');
        // $reports = Orders_user::latest()->get();
        // $reports_pro = DB::table('order_products')->get();
        // $reports = Orders_user::where('created_at', '>=', date('Y-m-d', $dateStartSearch))->where('created_at', '<=', date('Y-m-d', $dateFinishSearch))->get();
        $reports = Orders_user::where('created_at', '>=', date($dateStartSearch))->where('created_at', '<=', date($dateFinishSearch))->get();
        $reports_pro = DB::table('order_products')->get();
        
        // dd($reports_pro);
        // $parameters = DB::table('productparameter')->where('product_id', $product->id)->orderBy('parameter_id', 'ASC')->get();
        
        return view('reports.searchdate', compact('reports', 'reports_pro'));
    }
}
