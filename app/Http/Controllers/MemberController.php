<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MemberController extends Controller
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
        $user = User::where('email', $request->email)->get();
        if (count($user) == 0) {
            return redirect()->route('projects.edit', $request->project_id)->with('error', 'user not found!');
        }
        if ($user[0]->id == auth()->id()) {
            return redirect()->route('projects.edit', $request->project_id)->with('error', 'you can\'t add your own email!');
        }
        
        DB::table('project_user')->insert([
            'user_id' => $user[0]->id,
            'project_id' => $request->project_id,
        ]);
        // return dd($request->all());
        return redirect()->route('projects.edit', $request->project_id)->with('success', 'user added successfuly');
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
        DB::table('project_user')->where(
            'user_id', $request->user_id
        )->where('project_id', $id)->delete();
        // return dd($request->all());
        if ($request->user_id == auth()->id()) {
            return redirect()->route('dashboard')->with('success', 'you are leaved one project!');
        } else {
            return redirect()->back()->with('removed', 'member has been removed');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}