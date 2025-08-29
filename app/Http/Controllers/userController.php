<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\inputHoursModel;

class userController extends Controller
{
    public function index()
    {

        try {

            $users = User::all();

            return response()->json(data: $users, status: 200);

        } catch (Exception $e) {
            // Lida com a exceção
            return response()->json(data: ['error' => $e->getMessage()], status: 500);
        }

    }

    public function store(Request $request)
    {

        try {

            $user = User::create(([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'total_hours_required' => $request->input('total_hours_required')
            ]));

            return response()->json(data: $user, status: 200);

        } catch (Exception $e) {
            return response()->json(data: ['error' => $e->getMessage()], status: 500);
        }

    }
}
