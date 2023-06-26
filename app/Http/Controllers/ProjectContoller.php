<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $projects = Project::where('user_id', auth()->id())->get();
        $projects = Project::all();
        return view('dashboard', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
        ]);
        $project = Project::create($request->all());
        $project->user()->attach(auth()->id());
        return redirect('/dashboard')->with('success', "New project saved successfuly");
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
        $project = Project::findOrFail($id);
        if (auth()->id() == $project->user[0]->id) {
            return view('projects.edit', compact('project'));
        } else {
            return redirect()->route('dashboard')->with('error', 'you don\'t have permission to this project');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);
        if (auth()->id() == $project->user_id) {
            $project->update($request->all());
            return redirect()->route('projects.edit', $id);
        } else {
            return redirect()->route('dashboard')->with('error', 'you don\'t have permission to this project');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        if (auth()->id() == $project->user_id) {
            $project->delete($id);
            return redirect()->route('dashboard')->with('error', "$project->name project has beed deleted!");
        } else {
            return redirect()->route('dashboard')->with('error', 'you don\'t have permission to this project');
        }
    }
}
