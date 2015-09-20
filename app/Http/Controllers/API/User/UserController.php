<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\API\User\PostUsersRequest;
use App\Repositories\EndUserRepository;

use App\Services\Notification\VerificationMailNotifier;

use JWTAuth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(){
        $this->user_repository = new EndUserRepository;
        $this->verification_mail_notifier = new VerificationMailNotifier;
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
    public function store(PostUsersRequest $request)
    {
        $data           = $request->only('first_name', 'last_name', 'email', 'password');
        $device_token   = $request->input('device_token');
        $platform       = $request->input('platform');

        $user = $this->user_repository->storeEndUser($data,$device_token, $platform);
        $token = JWTAuth::fromUser($user);
        $this->verification_mail_notifier->notify($user, $token);
        $response = [
            'token' => $token,
            'user'  => $user
        ];

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
