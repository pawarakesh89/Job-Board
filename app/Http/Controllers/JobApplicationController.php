<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Resources\JobApplicationResource;

class JobApplicationController extends Controller
{
    public function store(Request $request, $jobId)
    {
        $request->validate([
            'cover_letter' => 'required|string',
        ]);

        $application = JobApplication::create([
            'job_id' => $jobId,
            'user_id' => $request->user()->id,
            'cover_letter' => $request->cover_letter,
        ]);

        return new JobApplicationResource($application);
    }

    public function index($jobId)
    {
        $applications = JobApplication::where('job_id', $jobId)->get();

        return JobApplicationResource::collection($applications);
    }
}
