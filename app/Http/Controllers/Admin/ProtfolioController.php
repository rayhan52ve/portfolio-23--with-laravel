<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Protfolio;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
// use Image;

class ProtfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Protfolio::all();
        return view('Admin.portfolio.show_portfolio', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.portfolio.add_portfolio");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title'=>'required|min:2|string',
            'project'=>'required',
            ]
            );
        // dd($request->all());
        
        if($request->isMethod('post')){
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');

                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $image_name = $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = $image_name . '-' . rand(111, 99999) . '.' . $extension;
                    $image_path = 'uploads' . '/' . $fileName;

                    Image::make($image_tmp)->resize(150, 150)->save($image_path);

                }
            }

            $portfolio = new Protfolio;
            $portfolio->title = $request->title;
            $portfolio->description = $request->description;
            $portfolio->project = $request->project;
            $portfolio->email = $request->email;
            $portfolio->call = $request->call;
            $portfolio->facebook = $request->facebook;
            $portfolio->twitter = $request->twitter;
            $portfolio->github = $request->github;
            $portfolio->youtube = $request->youtube;
            $portfolio->image = $image_path;
            $portfolio->language = $request->language;
            $portfolio->img_title = $request->img_title;
            $portfolio->save();
        }
        return redirect()->back()->with('success','Portfolio Info Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $portfolio = Protfolio::find($id);
        return view("Admin.portfolio.edit_portfolio",compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {

        if($request->isMethod('PUT')){
            $portfolio  = Protfolio::find($id);
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');

                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $image_name = $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = $image_name . '-' . rand(111, 99999) . '.' . $extension;
                    $image_path = 'uploads' . '/' . $fileName;

                    Image::make($image_tmp)->resize(150, 150)->save($image_path);

                } 
            }elseif($portfolio->image){
                $image_path = $portfolio->image;
            }

            
            $portfolio->title =$request->title;
            $portfolio->description =$request->description;
            $portfolio->project =$request->project;
            $portfolio->email =$request->email;
            $portfolio->call =$request->call;
            $portfolio->facebook =$request->facebook;
            $portfolio->twitter =$request->twitter;
            $portfolio->github =$request->github;
            $portfolio->youtube =$request->youtube;
            $portfolio->img_title =$request->img_title;
            $portfolio->language =$request->language;
            $portfolio->image = $image_path;
            $portfolio->update();
        }
        return redirect()->route('portfolios.index')->with('update','Portfolio Info Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio = Protfolio::find($id);
        $portfolio->delete();
        return redirect()->back()->with('delete','Portfolio Info Delete Successfully');
    }
}
