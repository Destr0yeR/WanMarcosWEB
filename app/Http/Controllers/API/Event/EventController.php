<?php

namespace App\Http\Controllers\API\Event;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\EventRepository;
use App\Repositories\EndUserRepository;

use App\Http\Requests\API\Event\GetEventsRequest;
use App\Http\Requests\API\Event\AutocompleteEventsRequest;
use App\Http\Requests\API\Event\StoreEventRequest;

use App\Services\Util\FileService;
use App\Services\API\Auth\AuthService;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct(){
        $this->event_repository = new EventRepository;
        $this->user_repository  = new EndUserRepository;

        $this->file_service = new FileService;
        $this->auth_service = new AuthService;
    }

    public function index(GetEventsRequest $request)
    {
        //
        $preferences = $this->user_repository->getPreferences();

        $filters = [
            'preferences'   => $preferences,
            'search_text'   => $request->input('search_text', '')
        ];

        $page       = $request->input('page', 1);
        $per_page   = $request->input('per_page', config('constants.per_page'));

        $events = $this->event_repository->getAllPaginated($filters, $page, $per_page);

        $response = [
            'events'    => $events
        ];

        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
            'starts_at'     => $request->input('starts_at'),
            'ends_at'       => $request->input('ends_at'),
            'website'       => $request->input('website', ''),
            'image'         => $image,
            'information'   => $information,
            'enduser_id'    => $this->auth_service->getUser()->id
        ];

        if($place)$data['place_id'] = $place;
        if($category)$data['category_id'] = $category;

        $response = $this->event_repository->store($data);

        return response()->json($response);
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
        if(!$this->event_repository->exists($id)){
            return response()->json([
                'error' => [
                    'message' => 'Invalid data',
                    'reason' => [
                        'event_id' => 'Event ID does not exist.'
                    ],
                    'suggestion' => 'Try again with valid data',
                    'code' => 5,
                    'description' => 'error_alert'
                ]
            ], 400);
        }

        $event = $this->event_repository->getById($id);

        return response()->json($event);
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
    }

    public function autocomplete(AutocompleteEventsRequest $request){
        $search_text = $request->input('search_text', '');
        $max_items   = $request->input('max_items', config('constants.autocomplete_items'));

        $events = $this->event_repository->getAutocomplete($search_text, $max_items);

        $response = [
            'events'    => $events
        ];

        return response()->json($response, 200);
    }
}
