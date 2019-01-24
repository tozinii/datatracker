<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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



    public function recorridoMapa($id){


    var carmap = L.map('map').setView([43.326025, -1.968831], 16);

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=sk.eyJ1IjoiY3luZGEiLCJhIjoiY2pyOTM3b2ZmMDB0dDQzcGZ5ajR4aXJyNiJ9.uQDXCNWklDqzIdAHxI0XqA', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets'
        }).addTo(carmap);


        var etapa1 = [
            [43.326353, -1.971578],
            [43.324529, -1.974172]
        ];
        var polyline = L.polyline(etapa1, {color: 'orange'}).addTo(carmap);

        var etapa2 = [
            [43.324529, -1.974172],
            [43.323622, -1.973014]
        ];
        var polyline2 = L.polyline(etapa2, {color: 'red'}).addTo(carmap);

        var etapa3 = [
            [43.323622, -1.973014],
            [43.323419, -1.970289]
        ];
        var polyline3 = L.polyline(etapa3, {color: 'orange'}).addTo(carmap);

        var etapa4 = [
            [43.323419, -1.970289],
            [43.326353, -1.971578]
        ];
        var polyline4 = L.polyline(etapa4, {color: 'yellow'}).addTo(carmap);

        var distancia = distance([43.326353, -1.971578], [43.324529, -1.974172]);
        polyline2.bindPopup('Ha recorrido km');


        }
}
