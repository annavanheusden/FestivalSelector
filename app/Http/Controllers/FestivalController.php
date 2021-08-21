<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;
use App\Models\Land;
use App\SOAP\CovidInfo;
use Artisaninweb\SoapWrapper\SoapWrapper;

class FestivalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        return view("FestivalGallery")->with("festivals",Festival::all())
                                      ->with("landen",Land::all());
    }

    public function SoapTest(){
        
        $sw = new SoapWrapper();
        $sw->add("CovidInfoProvider", function ($service) {
            $service
                    ->wsdl("http://localhost:56254/CovidInfoProvider.asmx?WSDL")
                    ->trace(true)
                    ->classmap([
                        CovidInfo::class
                    ]);
        });
        
        $response = $sw->call("CovidInfoProvider.HelloWorld", [new CovidInfo(17)]);
        $value = $response->HelloWorldResult;
        print_r($value);
    }
    
    public function detail($id)
    {
        $festival = Festival::find($id);
        $land = Land::find($festival->land_id);
        
        
        ini_set("soap.wsdl_cache_enabled", "0");
        $sw = new SoapWrapper();
        $sw->add("CovidInfoProvider", function ($service) {
            $service
                    ->wsdl("http://localhost:56254/CovidInfoProvider.asmx?WSDL")
                    ->trace(true)
                    ->classmap([
                        CovidInfo::class
                    ]);
        });
        
        $response_Besmettingen = $sw->call("CovidInfoProvider.CovidBesmettingen", [new CovidInfo($festival->land_id)]);
        $value_Besmettingen = $response_Besmettingen->CovidBesmettingenResult;
        
        $response_Sterftes = $sw->call("CovidInfoProvider.CovidSterftes", [new CovidInfo($festival->land_id)]);
        $value_Sterftes = $response_Sterftes->CovidSterftesResult;
        
        $response_Gevaccineerd = $sw->call("CovidInfoProvider.CovidVaccinatie", [new CovidInfo($festival->land_id)]);
        $value_Gevaccineerd = $response_Gevaccineerd->CovidVaccinatieResult;
        
        return view("FestivalDetail")->with("festival", $festival)
                                     ->with("land",$land)
                                     ->with("besmettingen",$value_Besmettingen)
                                     ->with("sterftes",$value_Sterftes)
                                     ->with("gevaccineerd", $value_Gevaccineerd);
    }
    
    public function festivalsInLand(){
        return Festival::find(1)->land;
    }
    
    public function searchFestivals($minPrijs, $maxPrijs){
        $festivals = Festival::where("prijs",">=",$minPrijs)
                        ->where("prijs","<=",$maxPrijs)->get();
        return view("AlleenFestivals")->with("festivals",$festivals); 
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
}
