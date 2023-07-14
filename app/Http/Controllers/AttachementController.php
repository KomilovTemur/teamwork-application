<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $file_extension = $request->file->getClientOriginalExtension();

        $attachment->name = $request->file->getClientOriginalName();
        $attachment->extension = $file_extension;
        $attachment->project_id = $request->project_id;
        $attachment->user_id = auth()->id();
        // save file to storage
        $attachment->file = Storage::put("attachments", $request->file("file"));
        // $request->file->move(public_path('attachments'), $file_name);
        // save data to database
        $attachment->save();
        return redirect()->route('projects.show', $request->project_id)->with('success', 'new attachment saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attachment = Attachment::findOrFail($id);
        if (Storage::exists($attachment->file)) {
            return Storage::download($attachment->file);
        } else {
            return redirect()->route('projects.show', $attachment->project_id)->with('error', "File not found");
        }
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
        $attachment = Attachment::findOrFail($id);
        if ($attachment->user_id != auth()->id()) {
            return redirect()->route('projects.show', $attachment->project_id)->with('error', 'You can\'t delete this attachment!');
        }
        Storage::delete($attachment->file);
        $attachment->delete();
        return redirect()->route('projects.show', $attachment->project_id)->with('success-delete', 'successfully deleted');
    }
}
