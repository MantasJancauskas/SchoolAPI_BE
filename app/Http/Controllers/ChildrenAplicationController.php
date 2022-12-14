<?php

namespace App\Http\Controllers;

use App\Models\ChildrenAplication;
use Illuminate\Http\Request;

class ChildrenAplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function index(Request $request)
    {
        if ($request->search === "name")
            return ChildrenAplication::all();
        return ChildrenAplication::with(['school', 'user'])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'birth_day' => 'required|max:255',
            'name' => 'required|max:255',
            'class' => 'required|max:255',
            'children_id' => 'required|max:255',
            'grade' => 'required|max:255',
        ]);
        return ChildrenAplication::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ChildrenAplication = ChildrenAplication::where('user_id', $id)->with('school')->get();

        return $ChildrenAplication;
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
        $request->validate([
            'school_id' => 'required|max:255',
            'hotel_id' => 'required|max:255',
            'full_name' => 'required|max:255',
            'id_code' => 'required|max:255',
            'grade' => 'required|max:255',
        ]);
        $ChildrenAplication = ChildrenAplication::find($id);
        $ChildrenAplication->update($request->all());
        return $ChildrenAplication;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return ChildrenAplication::destroy($id) === 0
            ? response(["status" => "failure"], 404)
            : response(["status" => "success"], 200);
    }
}
