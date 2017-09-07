<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Auth;
use DB;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tri = $request->input('tri');
        switch($tri){
            case 'date':
                $images = Image::where('statut', "1")->orderBy('created_at','DESC')->get();
                break;
            case 'NomA':
                $images = Image::where('statut', "1")->orderBy('nom','ASC')->get();
                break;
            case 'NomZ':
                $images = Image::where('statut', "1")->orderBy('nom','DESC')->get();
                break;

            default:
                $images = Image::where('statut', "1")->get();
                break;

        }
        return view('images.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $name_picture = str_slug($request->input('nom')).'.'.$request->file('image')->getClientOriginalExtension();
        try{
            DB::beginTransaction();
            $image = Image::create(array_merge($request->all(), ['user_id'=> Auth::user()->id,'picture'=>$name_picture]));
        } catch (Exception $e) {
            dd($e);
            DB::rollback();
            return redirect(route('images.create'));
        }
        DB::commit();
        $request->file('image')->move('img/'.Auth::user()->id,$name_picture);
        return redirect(route('images.show', $image));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::findOrFail($id);
        return view('images.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('images.edit',compact('image'));
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
        $image = Image::findOrFail($id);
        $image->update($request->all());
        return redirect(route('images.index', $image));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();
        return redirect()->route('private');
    }

    public function privateImage()
    {
        $images = Image::where('user_id', Auth::user()->id)->get();
        return view('images.private',compact('images'));
    }



}
