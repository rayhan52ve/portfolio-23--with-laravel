<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;


class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::all();
        return view('Admin.education.education_list',compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.education.add_education');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            $this->validate($request,[
            'title'=>'required|max:20|min:2|string',
            'sector'=>'required|string',
            'description'=>'required|max:500|min:10|string',
            'time'=>'required',
            
            ],
            $message=[
                'title.required' => 'Please enter degree.',
                'sector.required' => 'Please enter your institute.',
                'time.required' => 'Please enter education year.',
            ]
            );

            if($request->isMethod('post')){
                $education  = new Education;
                $education->title = $request->title;
                $education->sector = $request->sector;
                $education->description = $request->description;
                $education->time = $request->time;
                $education->save();
                
            }

        session()->flash('msg','Education info added successfully.');
        session()->flash('cls','success');
        return redirect()->route('educations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $education = Education::find($id);
        return view('Admin.education.edit_education',compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $request->validate([
            'title'=>'required|max:20|min:2|string',
            'sector'=>'required|string',
            'description'=>'required|max:500|min:10|string',
            'time'=>'required',
        ],

        $message=[
            'title.required' => 'Please enter degree.',
            'sector.required' => 'Please enter your institute.',
            'time.required' => 'Please enter education year.',
        ]
    
    );


        if($request->isMethod('PUT')){
            $education  = Education::find($id);
            $education->title = $request->title;
            $education->sector = $request->sector;
            $education->description = $request->description;
            $education->time = $request->time;
            $education->update();
        }

        session()->flash('msg','Education info updated.');
        session()->flash('cls','warning');
        return redirect()->route('educations.index');
    
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = Education::find($id);
        $education->delete();
        session()->flash('msg','Education info deleted successfully.');
        session()->flash('cls','danger');
        return redirect()->back();
    }
}
