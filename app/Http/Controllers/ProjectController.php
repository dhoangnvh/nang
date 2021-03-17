<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests\CreateProject;
use App\Http\Requests\UpdateProject;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(20);
        return view('project.index', compact('projects'));
    }

    public function add()
    {
        return view('project.add');
    }

    public function store(CreateProject $request)
    {
        $file = $request->image;
        $file->store("public");
        $path = "storage/".$file->hashName();

        $project = new Project();
        $project->name = $request->name;
        $project->image = $path;
        $project->description = $request->description;
        $project->content = $request->content;
        $project->save();

        return redirect()->route('project.index')->with('success', 'Lưu thành công');
    }

    public function uploadImg(Request $request)
    {
        try {
            $file = $request->upload;
            $file->store("public");
            $path = "storage/".$file->hashName();

            $data = [
                "uploaded" => true,
                "url" => $path
            ];
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data = [
                "uploaded" => false,
                "error" => [
                    "message"=> "could not upload this image"
                ]
            ];
            return response()->json($data, 500);
        }
    }

    public function edit(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        return view('project.edit', compact('project'));
    }

    public function update(updateProject $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->name = $request->name;

        if ($request->hasFile('photo')) {
            $file = $request->image;
            $file->store("public");
            $path = "storage/".$file->hashName();
            $project->image = $path;
        }

        $project->description = $request->description;
        $project->content = $request->content;
        $project->save();

        return redirect()->route('project.index')->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('project.index')->with('success', 'Xóa thành công');
    }
}
