<?php

namespace App\Http\Controllers;

use App\Models\inputHoursModel;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class inputHoursController extends Controller
{
    public function index(Request $request) {

        try{

            $user = $request->query('user_id');
            $userExists = User::find($user);

            if ($user) {
                
                if (!$userExists) {
                    return response()->json(data: ['error' => 'User not found'], status: 404);
                }


                $inputHours = inputHoursModel::where('user_id', $user)->get();
                return response()->json(data: $inputHours, status: 200);
            
            } else {
                return response()->json(data: ['error' => 'user_id is required'], status: 400);
            }

        } catch (Exception $e) {
            return response()->json(data: ['error' => $e->getMessage()], status: 500);
        }

    }
}
