<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\EventBucket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        // dd($event);
        $data = array(
            'tickets' => $event->tickets,
            'event' => $event,
        );

        return view('ticket.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        $data = array(
            'ticket' => new Ticket(),
            'event' => $event,
        );

        return view('ticket.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request, Event $event)
    {
        $data = array(
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'qnt_by_person' => $request->qnt_by_person,
            'qnt' => $request->qnt,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'company_id'=>auth()->user()->company_id

        );
        // dd($data);
        if ($event->tickets()->create($data)) {
            return redirect()->back()->with('success', "Dados registado com sucesso.");
        } else {
            return redirect()->back()->with('error', "Ocorreu um erro ao tentar registar.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event,Ticket $ticket)
    {
        $data=array(
            'event'=>$event,
            'ticket'=>$ticket
        );
        
// dd($data);

        return view('ticket.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        // dd($request->all());

        $data = array(
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'qnt_by_person' => $request->qnt_by_person,
            'qnt' => $request->qnt,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'company_id'=>auth()->user()->company_id
        );
        // dd($data);
        if ($ticket->update($data)) {
            return redirect()->back()->with('success', "Dados actualizados com sucesso.");
        } else {
            return redirect()->back()->with('error', "Ocorreu um erro ao tentar registar.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
