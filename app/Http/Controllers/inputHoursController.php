<?php

namespace App\Http\Controllers;

use App\Models\inputHoursModel;
use App\Models\User;
use Carbon\Carbon;
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

    public function storage(Request $request, $userId)
    {
        try {

            $startTime = Carbon::createFromFormat('H:i:s', $request->input('start_time'));
            $endTime = Carbon::createFromFormat('H:i:s', $request->input('end_time'));

            $hours_a_day = $startTime->diffInMinutes($endTime) / 60;



            $inputHours = inputHoursModel::create([
                'user_id' => $userId,
                'start_time' => $startTime->format('H:i:s'),
                'end_time' => $endTime->format('H:i:s'),
                'rest_time' => $request->input('rest_time'),
                'hours_a_day' => $hours_a_day,
                'day' => $request->input('day'),
            ]);


            return response()->json(data: [$inputHours, 'message' => 'Hora registrada com sucesso'], status: 200);

        } catch (Exception $e) {
            return response()->json(data: ['error' => $e->getMessage()], status: 500);
        }
    }
}
