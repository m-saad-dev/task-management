<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(15);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Project::$createRules, Project::$validationMessages);
        if ($validator->fails()){
            DB::rollBack();
            return redirect()
                ->route('projects.create')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            Project::create($request->all());
            return redirect()->route('projects.index')->with('success', 'The Project is Created.');
        } catch (\Exception $exception) {
            return redirect()->route('projects.create')->with('error', 'There was an issue.');
        }

    }
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $project)
    {
        $validationRules = [
            'name' => Project::$editRules['name'] + [Rule::unique('projects', 'name')->ignore($project)],
        ];
        $validator = Validator::make($request->all(), $validationRules);
        if ($validator->fails()){
            DB::rollBack();
            return redirect()
                ->route('projects.edit', $project)
                ->withErrors($validator)
                ->withInput();
        }
        try {
            Project::whereId($project)->update(['name' => $request->name]);
            return redirect()->route('projects.index')->with('success', 'The Project is Updated.');
        } catch (\Exception $exception) {
            return redirect()->route('projects.edit', $project)->with('error', 'There was an issue.');
        }

    }

    public function destroy(Project $project)
    {
        try {
            $project->delete();
            return redirect()->route('projects.index')->with('success', 'The Project is deleted.');
        } catch (\Exception $exception){
            return redirect()->route('projects.index')->with('error', 'There was an issue.');
        }
    }
}
