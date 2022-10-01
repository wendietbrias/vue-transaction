<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller {
   public function SignInHandler(Request $request) {
      $findUser = User::where('email' , $request->email)->get();

      if(count($findUser) === 0) {
          return response("Account is not exists", 406)->header("Content-Type" , "application/json");
      }

      if(Hash::check($request->password , $findUser[0]->password)) {
           $credentials = $request->only("email" , "password");
           $token = Auth::attempt($credentials);
              return response()->json([
                'status' => 'success',
                'user' => $findUser,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
      }

      return response("Password is wrong" , 406);

   }

   public function SignUpHandler(Request $request) {
       $findUser = User::where('email' , $request->email)->get();

       if(count($findUser) === 1) {
          return response("Account is already exists", 406)->header('Content-Type' , "application/json");
       }  

       $created = User::create([
          'email'=>$request->email, 
          'name'=>$request->name, 
          'password'=>Hash::make($request->password)
       ]);

       return response($created, 200)->header('Content-Type', 'application/json');
   }

      protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}