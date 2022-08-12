<?php

namespace App\Http\Controllers;

use App\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Seasons;

class SeasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add.season');
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
        $this->validate($request,[
            'name' => 'required',
            'number' => 'required'
        ]);


        //instantiate new season class
        $season = new Seasons();



        //take inputs
        $series_nam = $request->input('name');
        $number =  $request->input('number');

        //remove empty spaces from string
        $nam=trim($number);

        //change case to lower
        $series_name=Str::lower($series_nam);
        $name=Str::lower($nam);



        $series = Series::where('series_name',$series_name)->get();


        if ($series->count()>0){

            foreach ($series as $serie){
                $serie = $serie;
            }
            $season->series_id =$serie->id;

            //save season name to database
            $season->season_name =$name;

            $season->save();

            return redirect('/seasons')->with('success','Season '.$nam.' Added');
        }else{
            return redirect('/seasons')->with('error',$series_nam.' does not exits');
        }
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
