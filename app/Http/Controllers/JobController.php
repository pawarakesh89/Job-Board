<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Resources\JobResource;

class JobController extends Controller
{
    public function index()
    {
        return JobResource::collection(Job::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric',
        ]);

        $job = $request->user()->jobs()->create($request->all());

        return new JobResource($job);
    }

    public function show(Job $job)
    {
        return new JobResource($job);
    }

    public function update(Request $request, Job $job)
    {
        $this->authorize('update', $job);

        $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
            'company' => 'string|max:255',
            'location' => 'string|max:255',
            'salary' => 'numeric',
        ]);

        $job->update($request->all());

        return new JobResource($job);
    }

    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);

        $job->delete();

        return response()->json(null, 204);
    }
}
