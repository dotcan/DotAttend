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
        $scanners = RfidScanner::simplePaginate(8);
        return view('admin.rfid-scanner.index', compact('scanners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['esp_id' => ['required', 'integer', 'unique:' . RfidScanner::class . ',esp_id']]);
        return RfidScanner::create($request->only('esp_id'));
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
        return view('admin.rfid-scanner.edit', compact('rfid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RfidScanner $rfid)
    {
        $request->validate(['location' => ['string', 'nullable'], 'is_marking_attendance' => ['boolean', 'nullable']]);
        $rfid->update([
            'location' => $request->string('location'),
            'is_marking_attendance' => $request->boolean('is_marking_attendance'),
        ]);
        return $request->expectsJson() ? $rfid : redirect()->route('admin.rfid.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, RfidScanner $rfid)
    {
        $rfid->delete();
        return $request->expectsJson() ? null : redirect()->route('admin.rfid.index');
    }
}
