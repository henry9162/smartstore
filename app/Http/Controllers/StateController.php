<?php

namespace SmartStore\Http\Controllers;

use Illuminate\Http\Request;

use SmartStore\State;

class StateController extends Controller
{
    
    public function index()
    {
        $states = State::orderBy('id', 'desc')->paginate(20);

        return view('states.index')->withStates($states);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $state = new State;

        $state->name = $request->name;

        $state->save();

        return redirect()->route('states.index', $state->id)->with('info', 'Successfully added State');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $state = State::find($id);

        return view('states.show')->withState($state);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = State::find($id);

        return view('states.edit')->withState($state);
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
        $state = State::find($id);

        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $state = State::find($id);

        $state->name = $request->name;

        $state->save();

        return redirect()->back()->with('info', 'Successfully updated state');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $state = State::find($id);

        $state->delete();

        return redirect()->route('states.index')->with('info', 'Successfully deleted state');
    }
}
