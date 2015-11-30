<?php

namespace App\Http\Controllers\API\Professor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ProfessorRepository;
use App\Repositories\EndUserRepository;

use App\Http\Requests\API\Professor\GetProfessorsRequest;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct(){
        $this->professor_repository = new ProfessorRepository;
        $this->user_repository      = new EndUserRepository;
    }

    public function index(GetProfessorsRequest $request)
    {
        //
        $preferences = $this->user_repository->getPreferences();

        $filters = [
            'preferences'   => $preferences,
            'search_text'   => $request->input('search_text', '')
        ];

        $page       = $request->input('page', 1);
        $per_page   = $request->input('per_page', config('constants.per_page'));

        $professors = $this->professor_repository->getAllPaginated($filters, $page, $per_page);

        $response = [
            'professors'    => $professors
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
        if(!$this->professor_repository->exists($id)){
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

        $professor = $this->professor_repository->getById($id);

        return response()->json($professor);
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
}
