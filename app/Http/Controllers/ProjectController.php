<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Resources\Project\ProjectIndexResource;
use App\Http\Resources\Project\ProjectShowResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth:sanctum");
    }

    public function index()
    {
        $projects = Project::all();
        return ProjectIndexResource::collection($projects);
    }


    public function store(StoreProjectRequest $request)
    {
        Project::create($request->all());
        return response([
            "success" => true,
            "message" => "Created Successfully"
        ],Response::HTTP_CREATED);
    }


    public function show(Project $project)
    {
        return new ProjectShowResource($project);
    }


    public function edit($id)
    {
        //
    }


    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());
        return response([
            "success" => true,
            "message" => "Updated Successfully"
        ],Response::HTTP_OK);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response([
            "success" => true,
            "message" => "Deleted Successfully"
        ],Response::HTTP_OK);
    }
}
