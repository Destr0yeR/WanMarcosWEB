<?php

namespace App\Http\Controllers\API\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\EventRepository;
use App\Repositories\ProfessorRepository;
use App\Repositories\PlaceRepository;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->event_repository     = new EventRepository;
        $this->professor_repository = new ProfessorRepository;
        $this->place_repository     = new PlaceRepository;
    }

    public function index(Request $request)
    {
        //
        $page       = $request->input('page', 1);
        $per_page   = $request->input('per_page', config('constants.per_page_home'));

        $filters = [
            'preferences'   => [],
            'search_text'   => $request->input('search_text', '')
        ];

        $events      = $this->event_repository->getAllPaginated($filters, $page, $per_page);
        $professors  = $this->professor_repository->getAllPaginated($filters, $page, $per_page);
        $places      = $this->place_repository->getAllPaginated($filters, $page, $per_page);

        $response = [
            'events'     => $events,
            'professors' => $professors,
            'places'     => $places
        ];

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
