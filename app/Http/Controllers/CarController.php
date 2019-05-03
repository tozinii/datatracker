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
      $car = null;
      $idInt = intval($id);

      if(is_int($idInt)){
        $car = Car::find($idInt);
      }

      if ($car == null){
        return back();
      }

      foreach ($car->kit->sensors as $sensor){
        $a=DB::table('car_sensor')->where('car_id', $car->id)->where('sensor_id', $sensor->id)->orderby('created_at','DESC')->take(1)->first();
        $sensor->valor=$a==null?"":$a->data;
        //dump($sensor);
      }


      return view('users.car')->with(['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $car = null;
      $idInt = intval($id);

      if(is_int($idInt)){
        $car = Car::find($idInt);
      }

      return view('users.edit-car')->with('car',$car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

      if(!$this->validator($request->all())->fails()){
        $car = Car::find($id);

          $foto = $request->file('foto');
          if($foto == ''){
            $car->avatar = 'avatar.png';
          }else{
          // $extension = $foto->getClientOriginalExtension();
          // Storage::disk('public')->put($foto->getFileName().'.'.$extension, File::get($foto));
            $image64 = base64_encode(file_get_contents($foto)); //pasar la foto a base64

            //llamar a la api y subir la imagen
            $curl = curl_init();

            $client_id = "64b806a9b93f90f";

            $token = "e91ea0203e37ebb4a90cf957ea2edee47f3c59cb";

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.imgur.com/3/image",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => false,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => array('image' => $image64),
              CURLOPT_HTTPHEADER => array(
                // "Authorization: Client-ID {{1cb45b7462006f}}",
                "Authorization: Bearer ".$token //nuestro token para acceder a ala api
              ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              $json = json_decode($response);
              $car->avatar = $json->data->link; //pilla link de la api
            }
          }
        $car->code = $request->input('car-code');
        $car->description = $request->input('car-description');

        $car->save();
        return back()->withCookie(cookie('name', 'value', 60));
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
      $car = Car::find($id);
      $car->delete();
      return redirect()->route('cars.index');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'car-code' => ['required', 'string', 'min:1', 'max:50'],
            'car-description' => ['string', 'nullable', 'max:500'],
        ]);
    }
}
