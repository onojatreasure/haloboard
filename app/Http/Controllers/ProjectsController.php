<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $this->authorize('update', $project);
        return view('projects.show', compact('project'));
    }

    public function create()
    {
        
        return view('projects.create');
    }

    public function store()
    {
        //validate
        $attributes = $this->validateRequest();


        $project = auth()->user()->projects()->create($attributes);


        //redirect
        return redirect($project->path());
    }

    public function update(Project $project)
    {
        $this->authorize('update', $project);

        $attributes = $this->validateRequest();

        $project->update($attributes);

        return redirect($project->path());
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'required', 
            'description' => 'required',
            'notes' => 'min:3'
        ]);
    }
}
