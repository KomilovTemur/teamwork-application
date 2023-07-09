<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;

class AttachementController extends Controller
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
        $request->validate([
            'file' => "required|max:4096",
            'project_id' => 'required',
        ]);
        $attachment = new Attachment;
        $file_name = "file_" . auth()->id() . "+" . $request->project_id . "+" . time() . "." . request()->file->getClientOriginalExtension();
        $file_extension = $request->file->getClientOriginalExtension();
        $attachment->file = $file_name;
        $attachment->name = $request->file->getClientOriginalName();
        $attachment->extension = $file_extension;
        $attachment->project_id = $request->project_id;
        $attachment->user_id = auth()->id();
        // save file to storage
        $request->file->move(public_path('attachments'), $file_name);
        // save data to database
        $attachment->save();
        return redirect()->route('projects.show', $request->project_id)->with('success', 'new attachment saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}