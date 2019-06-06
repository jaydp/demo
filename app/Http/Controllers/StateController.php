<?php

namespace App\Http\Controllers;

use Validator;//, Input, Redirect; 
use Illuminate\Http\Request;
use App\State;

class StateController extends Controller
{
	
	/**
     * Define your validation rules in a property in
     * the controller to reuse the rules.
     */
    protected $validationRules = [
        'name' => 'required|max:100',
        'order' => 'numeric|max:9999',
    ];
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();

		return view('state/index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('state/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
		$validator = Validator::make($request->all(), $this->validationRules);
		
        if ($validator->fails()) {
            return redirect('states/create')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		$request_data = $request->all();		
		unset($request_data['_token']);		
		
		$state = new State;
		foreach($request_data as $input_key => $input_val)
		{
			$state->$input_key = $input_val;
		}
		$state->save();
		
		return redirect('/states')->with('success', 'State is successfully saved');
		
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
        $state = State::findOrFail($id);

		return view('state/edit', compact('state'));
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
       $validator = Validator::make($request->all(), $this->validationRules);
	   
	   if ($validator->fails()) {
            return redirect('states/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		$data_array = array();
		
		$request_data = $request->all();
		
		unset($request_data['_token']);
		unset($request_data['_method']);
		
		foreach($request_data as $input_key => $input_val)
		{
			$request_data[$input_key] = $input_val;
		}
		
        State::whereId($id)->update($request_data);

        return redirect('/states')->with('success', 'State is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = State::findOrFail($id);
        $state->delete();

        return redirect('/states')->with('success', 'State is successfully deleted');
    }
}
