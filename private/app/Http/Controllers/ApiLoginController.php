<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ApiLoginController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    protected function sendResult($message, $data, $errors = [], $status = true) {
        $error_code = $status ? 200 : 422;
        $result = [
            "message" => $message,
            "status" => $status,
            "data" => $data,
            "errors" => $errors
        ];
        return response()->json($result, $error_code);
    }
    public function login(Request $request)
    {
        $data = $request->all();
        $errors = [];
        $data = [];
        $message = "Login Successfull";
        $status = true;
        $credentails = $request->only('email', 'password');
        if(!$token = auth('api')->attempt($credentails)){
            $status = false;
            $errors = [
                "login" => "Invalid Username or Password",
            ];
            $message = "Login Failed";
        }else{
            $data = [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60,
            ];
        }
        return $this->sendResult($message, $data, $errors, $status);
    }
    public function getContacts()
    {
        return json_encode(Contact::all());
    }
}
