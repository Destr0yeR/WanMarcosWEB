<?php

namespace App\Http\Controllers\API\Faculty;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\FacultyRepository;

use App\Http\Requests\API\Faculty\AutocompleteFacultiesRequest;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(){
        $this->faculty_repository = new FacultyRepository;
    }

    public function index()
    {
        //
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

    public function autocomplete(AutocompleteFacultiesRequest $request){
        $search_text = $request->input('search_text', '');
        $max_items   = $request->input('max_items', config('constants.autocomplete_items'));

        $faculties = $this->faculty_repository->getAutocomplete($search_text, $max_items);

        $response = [
            'faculties'    => $faculties
        ];

        return response()->json($response, 200);
    }
}
