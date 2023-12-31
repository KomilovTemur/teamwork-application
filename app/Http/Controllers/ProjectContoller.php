<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Viewers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(auth()->id());
        $projects = $user->projects;
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
        $project = Project::findOrFail($id);
        $viewer = Viewers::where("user_id", '=', auth()->id())->where('project_id', '=', $id)->get();

        if (count($viewer) == 0) {
            $project::where('id', $id)->update(['viewers' => $project->viewers + 1]);
            $new_viewer = new Viewers;
            $new_viewer->user_id = auth()->id();
            $new_viewer->project_id = $id;
            $new_viewer->save();
            return view('projects.show', ['project' => Project::findOrFail($id)]);
        }

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->all());
        return redirect()->route('projects.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete($id);
        return redirect()->route('dashboard')->with('error', "$project->name project has beed deleted!");
    }
}