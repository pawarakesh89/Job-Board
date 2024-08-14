<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'job_id' => $this->job_id,
            'user_id' => $this->user_id,
            'cover_letter' => $this->cover_letter,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
