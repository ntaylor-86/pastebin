<?php

namespace App\Http\Controllers;

use App\Models\PasteBin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PasteBinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'paste' => 'required',
            'expires' => 'required'
        ]);

        $uuid = (string) Str::orderedUuid();

        $expires = match ($request->expires) {
            "5" => now()->addMinutes(5),
            "10" => now()->addMinutes(10),
            "60" => now()->addMinutes(60),
            "1440" => now()->addMinutes(1440),
            default => null
        };

        PasteBin::create([
            'paste' => $request->paste,
            'postedBy' => $request->posted_by ?? null,
            'title' => $request->title ?? null,
            'expires' => $expires,
            'uuid' => $uuid
        ]);

        return redirect()->route('submit-pastebin.success', [
            'uuid' => $uuid
        ]);
    }
    
    /**
     * Displayed after successfully storing a paste.
     *
     * @param  string $uuid
     * @return \Illuminate\Http\Response
     */
    public function storeSuccess(string $uuid)
    {
        $pasteBin = PasteBin::where('uuid', $uuid)->first();

        if (is_null($pasteBin)) {
            abort(404, "These are not the droids you're looking for...");
        }

        return view('paste_success', [
            'pasteBin' => $pasteBin
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  mixed  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $pasteBin = PasteBin::where('uuid', $uuid)->first();

        if (is_null($pasteBin)) {
            abort(404, "These are not the droids you're looking for...");
        }

        return view('paste_show', [
            'pasteBin' => $pasteBin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
