<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\TicketsResource;

class TicketsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TicketsResource::collection(Ticket::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        $request->validated($request->all());

        $ticket = Ticket::create([
            'department_id' => $request->department_id,
            'type_id' => $request->type_id,
            'details_desc' => $request->details_desc,
            'attachments' => $request->attachments,
            'priority' => ($request->priority) ?? "medium",
            'status' => ($request->status)?? "open",
            'acknowledged_by' => $request->acknowledge_by,
            'acknowledged_at' => $request->acknowledge_at,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by,
            'resolved_by' => $request->resolved_by,
            'resolved_at' => $request->resolved_at,
            'assigned_to' => $request->assigned_to,
            'assigned_by' => $request->assigned_by,
            'deleted_by' => $request->deleted_by,
        ]);

        return new TicketsResource($ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return new TicketsResource($ticket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->all());

        return new TicketsResource($ticket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();


        return response(null, 204);
    }
}
