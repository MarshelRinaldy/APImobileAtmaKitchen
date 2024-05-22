<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $users;

    public function __construct()
    {
        $this->users = new User();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return User::all();
        // $request-> email = "customer@example.com";

        $user = $this->users->where('email', 'customer1@gmail.com')->first();
        return response()->json($user);
        // return $user::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $login = $request->all();

        $validate = Validator::make($login, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
         if ($validate->fails()) {
            return response(['status' => 404,'message' => $validate->errors()], 404);
        }

        if (!Auth::attempt($login)) {
            return response(['status' => 401, 'message' => 'Invalid Credentials'], 401);
        }

        $user = $this->users::where('email', $request->email)->first();

        if (!$user) {
            return response(['status' => 404, 'message' => 'User not found'], 404);
        }

        if (!$user->email_verified_at) {
            return response(['status' => 401, 'message' => 'Please verify your email'], 401);
        }

        $data = [
            'id' => $user->id,
            'email' => $user->email,
            'role' => $user->role,
            'name' => $user->name,
        ];

        return response(['status' => 200, 'message' => 'Authenticated', 'data' => $data], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
