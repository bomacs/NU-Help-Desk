<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'id' => (string)$this->id,
            'type' => 'Tickets',
            'attributes' => [
                'type_id' => $this->type_id,
                'title' => $this->title,
                'description' => $this->description,
                'priority' => $this->priority,
                'status' => $this->status,
                'acknowledge_by' => $this->acknowledged_by,
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
                'deleted_at' => $this->deleted_at
            ]
        ];
    }
}
