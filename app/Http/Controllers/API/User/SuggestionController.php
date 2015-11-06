<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\API\User\StoreSuggestionRequest;

use App\Services\API\Auth\AuthService;
use App\Services\Notification\SuggestionSuccessNotifier;

use App\Repositories\SuggestionRepository;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(){
        $this->auth_service             = new AuthService;
        $this->notifier                 = new SuggestionSuccessNotifier;
        $this->suggestion_repository    = new SuggestionRepository;
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
    public function store(StoreSuggestionRequest $request)
    {
        //
        $user = $this->auth_service->getUser();

        $data = [
            'message'       => $request->input('message'),
            'enduser_id'    => $user->id
        ];

        $suggestion = $this->suggestion_repository->store($data);
        $this->notifier->notify($user);

        return response()->json($suggestion, 200);
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
}
