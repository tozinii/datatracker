<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Sensor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DateTime;
use Auth;

class CarController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified','user']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cars = Car::where('user_id', Auth::user()->id)->get();


      return view('users.cars')->with('cars',$cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $car = new Car;
      $car->code = $request->carname;
      $car->user_id = Auth::user()->id;
      $car->kit_id = $request->kit;
      $user = Auth::user()->id;

      $car->save();

      return back()->with('confirmation','Enhorabuena!! Has comprado un coche');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $car = Car::find($id);

      /*$carSensorsNames = array();

      //Esta query devuelve un objeto
      $carSensorsId = DB::table('car_sensor')->distinct()->select('sensor_id')->where('car_id', '=', $car->id)->get();

      foreach($carSensorsId as $sensorId){
        $sensor = Sensor::find($sensorId->sensor_id);
        array_push($carSensorsNames, $sensor->name);
      }*/

      $coordenadas = [];

      foreach ($car->sensors as $data){
        if ($data->id == 3 ) {
            array_push($coordenadas, $data->pivot->data);
        }
      }
      return view('users.car')->with(['car' => $car,'coordenadas' => $coordenadas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      if(!$this->validator($request->all())->fails()){
        $car = Car::find($id);

        $car->code = $request->input('car-code');
        $car->description = $request->input('car-description');

        $car->save();
        return back();
      }
      return back()->with('editCarError', 'Error en la solicitud. Por favor, rellena los campos obligatorios. (*)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'car-code' => ['required', 'string', 'min:1', 'max:50'],
            'car-description' => ['string', 'nullable', 'max:50'],
        ]);
    }
}
