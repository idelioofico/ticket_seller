<?php

namespace App\Http\Controllers;

use App\Helpers\FileUploadHelper;
use App\DTO\UploadCareDTO;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\EventTopic;
use App\Models\EventType;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("hellp");
        $data = array(
            'events' => Event::orderBy('start_date', 'asc')->get()
        );

        return view('event.index', $data);
    }
    public function view(Event $event)
    {
        $data = array(
            'event' => $event,
            'provinces' => Province::orderBy('name', 'asc')->get(),
            'event_types' => EventType::orderBy('name', 'asc')->get(),
            'event_topics' => EventTopic::orderBy('name', 'asc')->get(),
        );
        return view('event.view', $data);
    }

    public function guest()
    {
        $data = array(
            'events' => Event::orderBy('start_date', 'asc')->get()
        );

        return view('event.store', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = array(
            'event' => new Event(),
            'provinces' => Province::orderBy('name', 'asc')->get(),
            'event_types' => EventType::orderBy('name', 'asc')->get(),
            'event_topics' => EventTopic::orderBy('name', 'asc')->get(),
        );

        return view('event.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\ProdutoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {

        // dd($request->image);
        $upload = new FileUploadHelper();
        $uploadCare=App::make(UploadCareDTO::class);

        $file="";
        if($request->hasFile('image')){
            $realpath=$upload->Upload($request->image, 'event_path'); 
            // $realpath=$request->file('image')->getRealPath();
            // dd($realpath);
            $file=$uploadCare->upload(asset($realpath))."/-/preview/-/quality/smart/"; 
        }
        $data = array(
            'slug' => Str::slug($request->title),
            'title' => $request->title,
            'description' => $request->description,
            'image' => $file,
            'event_type_id' => $request->event_type_id,
            'topic_id' => $request->topic_id,
            'start_date' => date('Y-m-d', strtotime($request->start_date)),
            'end_date' => date('Y-m-d', strtotime($request->end_date)),
            'start_time' => date('H:i', strtotime($request->start_time)),
            'end_time' => date('H:i', strtotime($request->end_time)),
            'province_id' => $request->province_id,
            'city' => $request->city,
            'address' => $request->address,
            'producer' => $request->producer ?: null,
            'company_id' => auth()->user()->company_id,
        );

        // dd($data);

        if (Event::create($data)) {
            return redirect()->back()->with('success', "Dados registado com sucesso.");
        } else {
            return redirect()->back()->with('error', "Ocorreu um erro ao tentar registar.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $data = array(
            'event' => $event,
            'provinces' => Province::orderBy('name', 'asc')->get(),
            'event_types' => EventType::orderBy('name', 'asc')->get(),
            'event_topics' => EventTopic::orderBy('name', 'asc')->get(),
            'tickets'=>$event->tickets()->with('orders')->get(),
        );

        // dd($data);
        return view('event.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto   $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $data = array(
            'event' => $event,
            'provinces' => Province::orderBy('name', 'asc')->get(),
            'event_types' => EventType::orderBy('name', 'asc')->get(),
            'event_topics' => EventTopic::orderBy('name', 'asc')->get(),
        );

        return view('event.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\ProdutoRequest  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        // dd($event);
        $upload = new FileUploadHelper();
        $file="";
        if($request->hasFile('image')){
            $file=$upload->Upload($request->image, 'event_path'); 
        }else{
            $file=$event->image;
        }

        $data = array(
            'slug' => Str::slug($request->title),
            'title' => $request->title,
            'description' => $request->description,
            'image' =>$file,
            'event_type_id' => $request->event_type_id,
            'topic_id' => $request->topic_id,
            'start_date' => date('Y-m-d', strtotime($request->start_date)),
            'end_date' => date('Y-m-d', strtotime($request->end_date)),
            'start_time' => date('H:i', strtotime($request->start_time)),
            'end_time' => date('H:i', strtotime($request->end_time)),
            'province_id' => $request->province_id,
            'city' => $request->city,
            'address' => $request->address,
            'producer' => $request->producer ?: null,
            'company_id' => auth()->user()->company_id,
        );

        if ($event->update($data)) {
            return redirect(route('events.show', $event->id))->with('success', "Dados actualizados com sucesso.");
        } else {
            return redirect()->back()->with('error', "Ocorreu um erro ao tentar actualizar.");
        }
    }

    /**
     * Consultar dados do produto
     * 
     * @param \App\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function consulta(Event $event, $returnJson = true)
    {
        if ($returnJson) {
            echo json_encode($event);
        } else {
            return $event;
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $json['success'] = false;
        if ($event->update("user_id", Auth::user()->id)) {
            $json['success'] = true;
        }
        echo json_encode($json);
    }
}
