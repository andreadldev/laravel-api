<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::paginate(4);
        return $projects;
    }

    public function show($slug) {
        try {
            $project = Project::where('slug', $slug)->with('type', 'technologies')->firstOrFail();
            return $project;
        } catch (\Illuminate\Database\Eloquent|ModelNotFoundException $e) {
            return response([
                'error' => '404 not found'
            ], 404);
        }
    }
}
