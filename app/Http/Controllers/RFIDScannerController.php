<?php

namespace App\Http\Controllers;

use App\Models\RfidScanner;
use Illuminate\Http\Request;

class RFIDScannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return RfidScanner::create();
    }

    /**
     * Display the specified resource.
     */
    public function show(RfidScanner $rfid)
    {
        return $rfid;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RfidScanner $rfid)
    {
        return view('admin.rfid-scanner.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RfidScanner $rfid)
    {
        $rfid->update($request->validate(['location' => ['string', 'nullable']]));
        return $request->expectsJson() ? $rfid : redirect()->route('rfid.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RfidScanner $rFIDScanner)
    {
        //
    }
}
