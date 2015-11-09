<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\EventRepository;
use App\Repositories\PlaceRepository;
use App\Repositories\CategoryRepository;

use App\Services\Util\DateTimeService;

use App\Http\Requests\Backend\Event\StoreEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(){
        $this->event_repository     = new EventRepository;
        $this->place_repository     = new PlaceRepository;
        $this->category_repository  = new CategoryRepository;
        $this->date_time_service    = new DateTimeService;
    }

    public function index(Request $request)
    {
        //

        $events = $this->event_repository->paginated();

        $data = [
            'events'            => $events,
            'date_time_service' => $this->date_time_service
        ];

        return view('events.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $data = [
            'places'        => $this->place_repository->lists(),
            'categories'    => $this->category_repository->lists()
        ];

        return view('events.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(StoreEventRequest $request)
    {
        //
        $information    = $request->file('information');
        $image          = $request->file('image');

        if($information){
            $information = $this->file_service->upload($information);
        }
        else $information = '';

        if($image){
            $image = $this->file_service->upload($image);
        }
        else $image = '';
        $place      = $request->input('place_id', null);
        $category   = $request->input('category_id', null);

        $data = [
            'name'          => $request->input('name'),
            'description'   => $request->input('description'),
            'starts_at'     => $request->input('starts_at'),
            'ends_at'       => $request->input('ends_at'),
            'website'       => $request->input('website', ''),
            'image'         => $image,
            'information'   => $information
        ];

        if($place)$data['place_id'] = $place;
        if($category)$data['category_id'] = $category;

        $response = $this->event_repository->store($data);

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $data = [

        ];

        return view('events.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $data = [

        ];

        return view('events.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        return redirect()->route('events.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $this->event_repository->refuse($id);

        return redirect()->route('events.index');
    }

    public function accept($id){
        $this->event_repository->accept($id);

        return redirect()->back();
    }
}
