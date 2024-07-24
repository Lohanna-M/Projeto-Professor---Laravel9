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

        $activitties  = DB::table('activitties')
            ->selectRaw("activitties.*,
                diciplines.name AS disciplina_name,
                (CASE
                    WHEN activitties_responses.id is null THEN false
                    ELSE true
                END) AS completed
            ")
            ->leftJoin('activitties_responses', 'activitties_responses.activitties_id', '=', 'activitties.id')
            ->leftJoin('users', 'users.id', '=', 'activitties_responses.user_id')
            ->leftJoin('users_roles', function($query) {
                $query->on('users_roles.user_id', '=', 'users.id')
                ->where('role_id', 3);
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

        $user_id = Auth::user()->id;
        $activity_id = $request->activity_id;

        $existingResponse = ActivittiesResponses::where('user_id', $user_id)
                                            ->where('activitties_id', $activity_id)
                                            ->first();

             if ($existingResponse) {
            return redirect()->route('EditResponses', $existingResponse->id)
                         ->with('info', 'Você já respondeu a esta atividade. Você pode editar sua resposta.');
            }

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
        return view('responsesedit', compact('activity'));
    }

        public function update(Request $request, $id)
{
    $activity = ActivittiesResponses::find($id);

    if (!$activity) {
        return redirect()->back()->with('fail', 'Resposta não encontrada.');
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
