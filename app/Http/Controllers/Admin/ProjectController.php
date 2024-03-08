<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;



//Models 
use App\Models\Project;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project:: all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $projectData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
        ]);

        // dd($request);
        // $projectData = $request->all();
        $slug = Str::slug($projectData['title']);
        $projectData['slug'] =$slug;

        $project = Project::create([
            'title' => $projectData['title'],
            'slug' => $slug,
            'content' => $projectData['content'],
        ]);

        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $projectData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
        ]);

        $projectData = $request->all();
        $slug = Str::slug($projectData['title']);
        

        $project->update($projectData);

        return view('admin.projects.show', compact('project'));
        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        return redirect()->route('admin.projects.index');
    }
}
