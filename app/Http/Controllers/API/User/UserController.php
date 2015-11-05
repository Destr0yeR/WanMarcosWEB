<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\API\User\PostUsersRequest;
use App\Repositories\EndUserRepository;

use App\Services\Notification\VerificationMailNotifier;
use App\Services\API\Auth\AuthService;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(){
        $this->user_repository              = new EndUserRepository;
        $this->verification_mail_notifier   = new VerificationMailNotifier;
        $this->auth_service                 = new AuthService;
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

    public function verify($token = null){
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }
        $message = "Your email was verified!!";
        try {
            $user = JWTAuth::toUser($token);
            JWTAuth::invalidate($token);
        }
        catch(TokenBlacklistedException $e){
            $message = "Token already used";
        }

        return view('API.auth.verify')->with('message', $message);
    }

    public function profile()
    {
        $user = $this->auth_service->getUser();

        return response()->json($user);
    }
}
