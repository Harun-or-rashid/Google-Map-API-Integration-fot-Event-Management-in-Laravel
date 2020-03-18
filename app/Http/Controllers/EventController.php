<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
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
       return view('vendor.voyager.map.create');
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
            'title'=>'required',
            'lat'=>'required',
            'lng'=>'required',
            'location'=>'required',
            'date'=>'required',
            'category'=>'required',
        ]);
        try {
            $data = [
                'title' => $request->title,
                'category' => $request->category,
                'location' => $request->location,
                'latitude' => $request->lat,
                'longitude' => $request->lng,
                'date' => $request->date,
                'status' => 1,
            ];


//dd($data);
            Event::create($data);

            session()->flash('type', 'success');
            session()->flash('message', 'Event Created Successfully');

            return redirect()->back();

        } catch (\Exception $exception) {

            session()->flash('type', 'danger');
            session()->flash('message', 'Something Went Wrong. '.$exception->getMessage());
            return $exception;
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
