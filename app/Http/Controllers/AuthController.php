<?php

namespace App\Http\Controllers;

use App\DTO\UsersDTO;
use App\Exceptions\BadCredentialsException;
use App\Exceptions\ExistsObjectException;
use App\Exceptions\NotFoundException;
use App\Exceptions\NotVerifiedException;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\AuthUsersService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        private AuthUsersService $authUsersService
    )
    {
    }

    /**
     * @throws ExistsObjectException
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $validData = $request->validated();

        $this->authUsersService->register(UsersDTO::fromArray($validData));

        return response()->json([
            'message' =>__('messages.code_send'),
        ]);
    }

    /**
     * @throws BadCredentialsException
     */
    public function confirmationEmail(Request $request): JsonResponse
    {
        $this->authUsersService->confirmationEmail($request);

        return response()->json([
            'message'=>__('messages.email_verified'),
        ]);

    }

    /**
     * @throws BadCredentialsException
     * @throws NotVerifiedException
     * @throws NotFoundException
     */
    public function login(LoginRequest $request): JsonResponse
    {
        /**
         * @var User $user
         */
        $validatedData = $request->validated();

        $userToken = $this->authUsersService->login($validatedData);

        return response()->json([
            'token' => $userToken
        ]);

    }

    public function logout(): JsonResponse
    {

        auth()->user()->tokens()->delete();

        return response()->json([
            "message" => "logged out"
        ]);
    }
}
