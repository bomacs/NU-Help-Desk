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
        $ticket = Ticket::create([
            'type_id' => $request->input('type_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'status' => $request->input('status'),
            'acknowledged_by' => $request->input('acknowledge_by'),
            'acknowledged_at' => $request->input('acknowledge_at'),
            'created_by' => $request->input('created_by'),
            'updated_by' => $request->input('updated_by'),
            'resolved_by' => $request->input('resolved_by'),
            'resolved_at' => $request->input('resolved_at'),
            'assigned_to' => $request->input('assigned_to'),
            'assigned_by' => $request->input('assigned_by'),
            'deleted_by' => $request->input('deleted_by'),
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
        $ticket->update([
            'type_id' => (null !== $request->input('type_id')) ? $request->input('type_id') : $ticket->type_id,
            'title' => (null !== $request->input('title')) ? $request->input('title') : $ticket->title,
            'description' => (null !== $request->input('description')) ? $request->input('description') : $ticket->description,
            'priority' => (null !== $request->input('priority')) ? $request->input('priority') : $ticket->priority,
            'status' => (null !== $request->input('status')) ? $request->input('status') : $ticket->status,
            'acknowledged_by' => (null !== $request->input('acknowledged_by')) ? $request->input('acknowledged_by') : $ticket->acknowledged_by,
            'acknowledged_at' => (null !== $request->input('acknowledged_at')) ? $request->input('acknowledged_at') : $ticket->acknowledged_at,
            'created_by' => (null !== $request->input('created_by')) ? $request->input('created_by') : $ticket->created_by,
            'updated_by' => (null !== $request->input('updated_by')) ? $request->input('updated_by') : $ticket->updated_by,
            'resolved_by' => (null !== $request->input('resolved_by')) ? $request->input('resolved_by') : $ticket->resolved_by,
            'resolved_at' => (null !== $request->input('resolved_at')) ? $request->input('resolved_at') : $ticket->resolved_at,
            'assigned_to' => (null !== $request->input('assigned_to')) ? $request->input('assigned_to') : $ticket->assigned_to,
            'assigned_by' => (null !== $request->input('assigned_by')) ? $request->input('assigned_by') : $ticket->assigned_by,
            'deleted_by' => (null !== $request->input('deleted_by')) ? $request->input('deleted_by') : $ticket->deleted_by,
            'deleted_at' => (null !== $request->input('deleted_at')) ? $request->input('deleted_at') : $ticket->deleted_at,
        ]);

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


        return response()->json(['data'=>'Ticket' . ' ' . $ticket->title . ' ' . 'has been deleted successfully.']);
    }
}
