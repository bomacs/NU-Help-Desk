<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UsersResource;
use Ramsey\Uuid\Type\Integer;

class TicketsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => 'Tickets',
            'attributes' => [
                'department_id' => $this->department_id,
                'type_id' => $this->type_id,
                'details_desc' => $this->details_desc,
                'attachments' => $this->attachments,
                'priority' => $this->priority,
                'status' => $this->status,
                'acknowledged_by' => $this->acknowledged_by,
                'acknowledged_at' => $this->acknowledge_at,
                'created_by' => $this->created_by,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'updated_by' => $this->updated_by,
                'resolved_by' => $this->resolved_by,
                'resolved_at' => $this->resolved_at,
                'assigned_to' => $this->assigned_to,
                'assigned_by' => $this->assigned_by,
                'deleted_by' => $this->deleted_by,
                'deleted_at' => $this->deleted_at,
            ],
            'client' => [
                'id' => $this->user->id,
                'lastname' => $this->user->lastname,
                'firstname' => $this->user->firstname,
                'email' => $this->user->email,
            ]
            // 'user' => UsersResource::collection($this->user->id)
        ];
    }
}
