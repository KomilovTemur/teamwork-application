<?php

namespace App\Http\Middleware;

use App\Models\Project;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OwnerProject
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $project = Project::find($projectId);
        // $owners = $project->users;
        $user = User::find(auth()->id());
        $projects = $user->projects;
        // dd($request->input('projects'));
        // if (auth()->id() == $project->user_id) {
        //     $project->delete($id);
        //     return redirect()->route('dashboard')->with('error', "$project->name project has beed deleted!");
        // } else {
        //     return redirect()->route('dashboard')->with('error', 'you don\'t have permission to this project');
        // }
        return $next($request);
    }
}
