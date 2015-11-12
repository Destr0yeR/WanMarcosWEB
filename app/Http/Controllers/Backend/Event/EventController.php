<?php

namespace App\Http\Controllers\Backend\Event;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\EventRepository;
use App\Repositories\PlaceRepository;
use App\Repositories\CategoryRepository;

use App\Services\Util\DateTimeService;

use App\Http\Requests\Backend\Event\StoreEventRequest;

use App\Services\Notification\ContactUserAboutEventNotifier;

use App\Services\Util\FileService;

class EventController extends Controller
{
    public function __construct(){
        $this->event_repository     = new EventRepository;
        $this->place_repository     = new PlaceRepository;
        $this->category_repository  = new CategoryRepository;
        $this->date_time_service    = new DateTimeService;

        $this->contact_notifier     = new ContactUserAboutEventNotifier;
        $this->file_service         = new FileService('backend');
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
        $starts_at  = $this->date_time_service->parse($request->input('starts_at_date').' '.$request->input('starts_at_time'))->timestamp;
        $ends_at    = $this->date_time_service->parse($request->input('ends_at_date').' '.$request->input('ends_at_time'))->timestamp;
        

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
            'starts_at'     => $starts_at,
            'ends_at'       => $ends_at,
            'website'       => $request->input('website', ''),
            'image'         => $image,
            'information'   => $information
        ];

        if($place)$data['place_id'] = $place;
        if($category)$data['category_id'] = $category;

        $event = $this->event_repository->store($data);

        return redirect()->route('events.show', $event->id);
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
            'event'             => $this->event_repository->find($id),
            'date_time_service' => $this->date_time_service
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
            'event'             => $this->event_repository->find($id),
            'date_time_service' => $this->date_time_service,
            'places'        => $this->place_repository->lists(),
            'categories'    => $this->category_repository->lists()
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
        $starts_at  = $this->date_time_service->parse($request->input('starts_at_date').' '.$request->input('starts_at_time'))->timestamp;
        $ends_at    = $this->date_time_service->parse($request->input('ends_at_date').' '.$request->input('ends_at_time'))->timestamp;
        

        $information    = $request->file('information');
        $image          = $request->file('image');

        if($information){
            $information = $this->file_service->upload($information);
        }
        else $information = null;

        if($image){
            $image = $this->file_service->upload($image);
        }
        else $image = null;
        
        $place      = $request->input('place_id', null);
        $category   = $request->input('category_id', null);

        $data = [
            'name'          => $request->input('name'),
            'description'   => $request->input('description'),
            'starts_at'     => $starts_at,
            'ends_at'       => $ends_at,
            'website'       => $request->input('website', ''),
            'image'         => $image,
            'information'   => $information
        ];

        if($place)$data['place_id'] = $place;
        if($category)$data['category_id'] = $category;

        $event = $this->event_repository->update($id, $data);

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

        return redirect()->back();
    }

    public function accept($id){
        $this->event_repository->accept($id);

        return redirect()->back();
    }

    public function contact(Request $request, $id){
        $user = $this->event_repository->getUserFromEvent($id);
        
        if($user){
            $message = $request->input('message');

            $this->contact_notifier->notify($user, $message);
        }

        return redirect()->back();
    }
}
