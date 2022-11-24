<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if ($request->search === "name")
            return School::all();
        return School::with(['school', 'user'])->get();
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
            'school_name' => 'required|max:255',
            'zip_code' => 'required|max:255',
            'address' => 'required|max:255',
        ]);
        return School::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $School = School::where('user_id', $id)->with('school')->get();

        return $School;
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
            'school_name' => 'required|max:255',
            'zip_code' => 'required|max:255',
            'address' => 'required|max:255',
        ]);
        $School = School::find($id);
        $School->update($request->all());
        return $School;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return School::destroy($id) === 0
            ? response(["status" => "failure"], 404)
            : response(["status" => "success"], 200);
    }
}
