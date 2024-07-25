<?php

namespace App\Http\Controllers;

use App\Models\Activitties;
use App\Models\ActivittiesResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivittiesResponsesController extends Controller
{
    public function index (Request $request)
    {
            $user_id = Auth::user()->id;
            $activitties = DB::table('activitties')
                ->selectRaw("activitties.*,
                    diciplines.name AS disciplina_name,
                    activitties_responses.id AS response_id,
                    (CASE
                        WHEN activitties_responses.id is null THEN false
                        ELSE true
                    END) AS completed
                ")
                ->leftJoin('activitties_responses', function($join) use ($user_id) {
                    $join->on('activitties_responses.activitties_id', '=', 'activitties.id')
                         ->where('activitties_responses.user_id', '=', $user_id);
                })
                ->join('diciplines', 'activitties.dicipline_id', '=', 'diciplines.id')
                ->get();

            return view('activittiesresponses', compact('activitties'));

    }

        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'activity_id' => 'integer|exists:activitties,id',
                'filepath' => 'nullable|file|mimes:jpg,png,jpeg,gif|max:2048',
                'description' => 'nullable|string|max:1000',
            ]);

            if($request->hasFile('filepath')){
                $image = $request->file('filepath');
                $imageName = time(). '.' .$image->getClientOriginalExtension();
                $filePath = public_path('public/images');
                $image->move($filePath,$imageName);
                $validatedData['filepath'] = 'images/' . $imageName;
                }
                else{
                    $validatedData['filepath'] = null;
                }

                $activitties = ActivittiesResponses::create([
                        'user_id' => Auth::user()->id,
                        'activitties_id' => $request->activity_id,
                        'filepath' => $validatedData['filepath'],
                        'description' => $validatedData['description'],
                        'check' => false,
                        'note' => 0.0,
        ]);
            return redirect()->route('ActivittiesResponses')->with('success', 'Resposta Enviada!');
        }

        public function edit($id)
    {
        $activity = ActivittiesResponses::where('activitties_id',$id)->first();
        if(!$activity){
            return redirect()->back()->with('fail', 'Resposta não encontrada.');;
        }

        if ($activity->check) {
            return redirect()->back()->with('fail', 'Não é possível editar a atividade após correção.');
        }
        return view('responsesedit', compact('activity'));
    }


    public function update(Request $request, $id)
{
    $activity = ActivittiesResponses::find($id);

    if (!$activity) {
        return redirect()->back()->with('fail', 'Resposta não encontrada.');
    }

    if ($activity->check) {
        return redirect()->route('ActivittiesResponses')->with('fail', 'Não é possível editar a atividade após correção.');
    }

    $validatedData = $request->validate([
        'filepath' => 'nullable|file|mimes:jpg,png,jpeg,gif|max:2048',
        'description' => 'nullable|string|max:1000',
    ]);

    if ($request->hasFile('filepath')) {
        $image = $request->file('filepath');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $filePath = public_path('public/images');
        $image->move($filePath, $imageName);
        $validatedData['filepath'] = 'images/' . $imageName;
    } else {
        $validatedData['filepath'] = $activity->filepath;
    }

    $activity->update($validatedData);

    return redirect()->route('ActivittiesResponses')->with('success', 'Atividade Editada');
}

    public function show($id)
        {
            $activity = Activitties::where('id', $id)->first();
            return view('responsesshow', compact('activity'));
        }

    public function responsesshow($id){
        $activity  = ActivittiesResponses::where('activitties_id', $id)->first();
        if(!$activity){
            return redirect()->back()->with('fail', 'Resposta não encontrada!');
        }
        return view('ver_responsesshow', compact('activity'));
    }

    public function download($id)
    {
    $activity = Activitties::findOrFail($id);
    $filePath = public_path($activity->filepath);

    if (file_exists($filePath)) {
        return response()->download($filePath);
    } else {
        return redirect()->back()->with('error', 'Arquivo não encontrado.');
    }
    }


}
