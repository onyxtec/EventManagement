<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hall;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;


class themesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        
        $id =  Auth::guard('owner')->id();
        $hall_id = Hall::where('owner_id', $id)->pluck('id');
        $themes = Theme::whereIn('hall_id', $hall_id)->get();
        return view('themes.index', compact('themes'));
    }


    public function create()
    {
        $id =  Auth::guard('owner')->id();
        $halls = Hall::where('owner_id', $id)->get();
        return view('themes.create',compact('halls'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
            'name' => ' required',
            'price' => ' required',
            'hall_id' => 'required',
            ]);
            $theme = new Theme();
            $theme->name = $request->input('name');
            $theme->price = $request->input('price');
            $theme->hall_id=$request['hall_id'];
            $theme->save();
            $msg = "New Theme Added! ";
            return redirect('themes')->with('msg', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theme = Theme::find($id);
        return view('themes.edit', compact('theme'));
    }
    public function update(Request $request, $id)
    {
        $themes = Theme::find($id);
        $themeData = [
            "name"=>$request->name,
            "price"=>$request->price,
            "hall_id"=>$request->hall_id,
        ];
        $themes->update($themeData);
        $msg = "Theme Updated successful! ";
        return redirect()->route('themes.index')->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Theme::destroy($id);
        $msg = "Theme Deleted successful! ";
        return redirect('themes')->with('msg', $msg);
    }
}
