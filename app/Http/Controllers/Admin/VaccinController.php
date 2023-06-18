<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vaccin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VaccinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vaccins = Vaccin::all();
        return view('admin.vaccin.index',compact('vaccins'));
    }

    public function vaccinStatut(Request $request){
        if($request->mode == 'true'){
            DB::table('vaccins')->where('id', $request->id)->update(['statut'=>'active']);
        }
        else{
            DB::table('vaccins')->where('id', $request->id)->update(['statut'=>'inactive']);
        }
        return response()->json(['msg'=>'Statut mise à jour !', 'statut'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vaccin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nom_vaccin' => 'string|required',
            'description' => 'string|required',
            'dose' => 'required|min:1',
            'interval' => 'nullable|min:0',
        ]);
        $data = $request->all();
        $statut = Vaccin::create($data);
        if($statut){
            return redirect()->route('vaccin.index')->with('success', 'vaccin créé avec succès');
        }else{
            return back()->with('error', 'Quelque chose a mal tourné !');
        }
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
        $vaccin = Vaccin::find($id);
        if($vaccin){
            return view('admin.vaccin.edit', compact('vaccin'));
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vaccin = Vaccin::find($id);
        if($vaccin){
            $this->validate($request,[
                'nom_vaccin' => 'string|required',
                'description' => 'string|required',
                'dose' => 'required|min:1',
                'interval' => 'nullable|min:0',
            ]);
            $data = $request->all();
            
            $statut = $vaccin->fill($data)->save();
            if($statut){
                return redirect()->route('vaccin.index')->with('success', 'Vaccin modifié avec succès');
            }else{
                return back()->with('error', 'Quelque chose a mal tourné !');
            }
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vaccin = Vaccin::find($id);
        if($vaccin){
            $statut = $vaccin->delete();
            if($statut){
                return redirect()->route('vaccin.index')->with('success', 'Vaccin supprimé avec succès');
            }
            else{
                return back()->with('error', 'Quelque chose a mal tourné !');
            }
        }else{
            return back()->with('error', 'Données non trouvées');
        }
    }
}
