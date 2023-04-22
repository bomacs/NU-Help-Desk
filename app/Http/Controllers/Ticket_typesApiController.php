<?php

namespace App\Http\Controllers;

use App\Models\Ticket_type;
use App\Http\Requests\StoreTicket_typeRequest;
use App\Http\Requests\UpdateTicket_typeRequest;
use App\Http\Resources\Ticket_typesResource;

class Ticket_typesApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Ticket_typesResource::collection(Ticket_type::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicket_typeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicket_typeRequest $request)
    {
        $request->validated($request->all());
        
        $ticket_type = Ticket_type::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'sla_mins' => $request->input('sla_mins')
        ]);

        return new Ticket_typesResource($ticket_type);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket_type  $ticket_type
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket_type $ticket_type)
    {
        return new Ticket_typesResource($ticket_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicket_typeRequest  $request
     * @param  \App\Models\Ticket_type  $ticket_type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicket_typeRequest $request, Ticket_type $ticket_type)
    {
        $ticket_type->update($request->all());

        return new Ticket_typesResource($ticket_type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket_type  $ticket_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket_type $ticket_type)
    {
        $ticket_type->delete();

        return response(null, 204);
    }
}
