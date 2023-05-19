<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Session;

class SkilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        return view('Admin.skill.show',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.skill.add_skill");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'program' => 'required|max:20|min:3|string',
            'percentage' => 'required|string',
        ],
        $message=[
            'program.required' => 'Please Enter Your Program.',
            'percentage.required' => 'Please Enter Your Percentage.',
        ]
        );

        if($request->isMethod('post')){
            $data = $request->all();
            $skill = new Skill;
            $skill ->program = $data['program'];
            $skill ->percentage = $data['percentage'];
            $skill ->save();
        }
        return redirect()->back()->with('success','Skills Info Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $skill = Skill::find($id);
        return  view("Admin.skill.show",$skill);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $skill = Skill::find($id);
        return  view("Admin.skill.edit_skill",compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->isMethod('PUT')){
            $skill = Skill::find($id);
            $skill ->program =$request->program;
            $skill ->percentage =$request->percentage;
            $skill ->update();
        }
        return redirect()->route('skils.index')->with('update','Skills Info Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return redirect()->back()->with('delete','Skills Info Delete Successfully');
    }
}
