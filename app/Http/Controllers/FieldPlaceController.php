<?php

namespace App\Http\Controllers;

use App\Models\Field_place;
use Illuminate\Http\Request;

class FieldPlaceController extends Controller
{
    public function index()
    {
        $post_lapangan = Field_place::all();
        return view('ahp.field_place', ['post_lapangan' => $post_lapangan]);
    }

    public function list_lapangan()
    {
        $post_lapangan = Field_place::all();
        return view('layouts.list_lapangan', ['post_lapangan' => $post_lapangan]);
    }


    public function create()
    {
        return view('ahp.tambah_field');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'jarak' => 'required',
            'jenis_lapangan' => 'required',
            'fasilitas_lapangan' => 'required',
            'jumlah_pemain' => 'required',
            'telephone' => 'required'
        ]);

        Field_place::create($request->all());
        return redirect()->route('field_place');
    }

    public function edit($id)
    {
        $field_place = Field_place::find($id);
        return view('ahp.edit_field', compact('field_place'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'jarak' => 'required',
            'jenis_lapangan' => 'required',
            'fasilitas_lapangan' => 'required',
            'jumlah_pemain' => 'required',
            'telephone' => 'required',
        ]);

        $field_place = Field_place::find($id);
        $field_place->update($request->all());

        return redirect()->route('field_place');
    }


    public function destroy($id)
    {
        $field_place = Field_place::find($id);
        $field_place->delete();

        return redirect()->route('field_place');
    }
}
