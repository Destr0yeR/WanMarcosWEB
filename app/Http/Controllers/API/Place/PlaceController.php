<?php

namespace App\Http\Controllers\API\Place;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\PlaceRepository;
use App\Repositories\EndUserRepository;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(){
        $this->place_repository = new PlaceRepository;
        $this->user_repository  = new EndUserRepository;
    }

    public function index(Request $request)
    {
        //
        $preferences = $this->user_repository->getPreferences();

        $filters = [
            'preferences'   => $preferences,
            'search_text'   => $request->input('search_text', '')
        ];

        $page       = $request->input('page', 1);
        $per_page   = $request->input('per_page', config('constants.per_page'));

        $places = $this->place_repository->getAllPaginated($filters, $page, $per_page);

        $response = [
            'places'    => $places
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
    public function store(Request $request)
    {
        //
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

    public function autocomplete(Request $request){
        $search_text = $request->input('search_text', '');
        $max_items   = $request->input('max_items', config('constants.autocomplete_items'));

        $places = $this->place_repository->getAutocomplete($search_text, $max_items);

        $response = [
            'places'    => $places
        ];

        return response()->json($response, 200);
    }
}
