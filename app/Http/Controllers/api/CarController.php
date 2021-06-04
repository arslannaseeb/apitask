<?php

namespace App\Http\Controllers\api;
use App\User;
use App\Car;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\api\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        $cars = auth()->user()->cars;
        return response()->json($cars);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            // 'user_id'=>'required',
            'name' => 'string|required',
            'color' => 'required|string',
            'cc' => 'required',
            'engine' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 200);
        }

        try{
            $user = auth()->user();
        }catch(ModelNotFoundException $e){
            return response()->json('Login First');
        }

        $input = $validator->validated();
        $car = $user->cars()->create($input);

        return response()->json("Car has been added");

    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'id'=>'required', //id of car to be updated
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 200);
        }
        $user_id = auth()->user();
        $user = User::where('id',$user_id)->first();
        $data = $request->all();
        $car_id = $request->id; 
        $user->cars()->where("id", $car_id)->update($data);

        return response()->json("Car has been updated");
    }

    public function delete(Request $request){
        $validator = Validator::make($request->all(), [
            'id'=>'required',  //id of car
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 200);
        }    
            $user_id = auth()->user();
            $user = User::where('id',$user_id)->first();  
            $car_id = $request->id; 
            $user->cars()->where('id',$car_id)->delete();

            return response()->json("Car has been deleted");

    }

}
