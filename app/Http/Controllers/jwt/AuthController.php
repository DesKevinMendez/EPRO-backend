<?php
namespace App\Http\Controllers\jwt;

use Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\User;

class AuthController extends Controller
{

    /**
     * Referencias de uso basico
     *
     * @return https://medium.com/@experttyce/c%C3%B3mo-crear-un-api-rest-con-laravel-5-7-y-jwt-token-94b79c533c6d
     */
    

    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['login', 'register']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }


        $credentials = request(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Los datos no coinciden con nuestro registros'], 401);
        }
        return $this->respondWithToken($token);
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    

    //Funcion que se ha utilizado para hacer el registro
    public function register(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'carnet' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' =>'required|string|min:6'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $userQR = [
            'nombre'=>$request->get('nombre'),
            'apellido'=>$request->get('apellido'),
            'carnet'=>$request->get('carnet'),
            'email' => $request->get('email'),
        ];
        
        $image =  QrCode::size(250)->generate(implode(',', $userQR));

        $user = User::create([
            'nombre'=>$request->get('nombre'),
            'apellido'=>$request->get('apellido'),
            'carnet'=>$request->get('carnet'),
            'email' => $request->get('email'),
            'qr'=>$image,
            'password' => $request->get('password'),
        ]);
        

        

        $token = JWTAuth::fromUser($user);

        return $this->respondWithToken($token);
    }


    public function payload()
    {
        return response()->json(auth()->payload());
    }
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }
    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user(),
        ]);
    }
}

