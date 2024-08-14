<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Job $job)
    {
        return $user->id === $job->user_id;
    }

    public function delete(User $user, Job $job)
    {
        return $user->id === $job->user_id;
    }
}
