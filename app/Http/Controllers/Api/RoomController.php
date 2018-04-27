<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;
use App\Http\Resources\RoomResource;
use JWTAuth;
use JWTFactory;
use Illuminate\Support\Facades\Auth;


class RoomController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }
     public function login()
     {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
     }

  
    public function logoutforapi()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

      public function index(){
        
        $room=Room::paginate(3);
        return RoomResource::collection($room);
 
     }

   

  
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

}
