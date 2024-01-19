<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $results = Project::paginate(5);
        return response()->json([
            'success' => true,
            'results' => $results,
        ]);
    }

    public function show($slug){
        $project = Project::where('slug', $slug)->first();
    
        if (!$project) {
            return response()->json(['error' => 'Progetto non trovato'], 404);
        }
    
        return response()->json($project);
    }
}
