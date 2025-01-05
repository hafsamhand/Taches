<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TacheController extends Controller
{
    public function index(Request $request)
    {
        $tache = DB::table('taches');

        if ($request->has('cherche') && $request->cherche !== '' && $request->status == null ) {
            $tache->where('nom', 'like', '%' . $request->cherche . '%');
        }

        if ($request->has('status') && $request->status !== '' && $request->cherche == null ) {
            $tache->where('status', $request->status);
        }
        $elements = $tache->get();
        // dd($request->all());
        return view('index', ['elements' => $elements]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|boolean',
        ]);

        DB::table('taches')->insert([
            'nom' => $request->nom,
            'description' => $request->description,
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('taches.index');
    }

    public function show($id)
    {
        $elements = DB::table('taches')->where('id', $id)->first();

        return view('show', ['elements' => $elements]);
    }

    public function edit($id)
    {
        $elements = DB::table('taches')->where('id', $id)->first();

        return view('edit', ['elements' => $elements]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|boolean',
        ]);

        DB::table('taches')->where('id', $id)->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        return redirect()->route('taches.index');
    }

    public function destroy($id)
    {
        DB::table('taches')->where('id', $id)->delete();

        return redirect()->route('taches.index');
    }
    public function complete($id)
    {
        DB::table('taches')->where('id', $id)->update(['status' => 1, 'updated_at' => now()]);

        return redirect()->route('taches.index');
    }
}