<?php

namespace App\Http\Controllers;

use App\Models\Warframe;
use Illuminate\Http\Request;

class WarframeController extends Controller
{
    public function index()
    {
        return Warframe::all();
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'firstAbility' => ['required', 'string', 'max:255'],
            'secondAbility' => ['required', 'string', 'max:255'],
            'thirdAbility' => ['required', 'string', 'max:255'],
            'fourthAbility' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:50'],
        ]);

        try {
            $warframe = Warframe::create($request->all());

            $warframe->save();

            return $warframe;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error creating warframe',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function show(Warframe $warframe)
    {
        return $warframe;
    }

    public function update(Request $request, Warframe $warframe)
    {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'firstAbility' => ['required', 'string', 'max:255'],
            'secondAbility' => ['required', 'string', 'max:255'],
            'thirdAbility' => ['required', 'string', 'max:255'],
            'fourthAbility' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:50'],
        ]);

        try {
            $warframe->update($request->all());

            return $warframe;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error creating warframe',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy(Warframe $warframe)
    {
        try {
            $warframe->delete();

            return response()->json([
                'message' => 'Warframe deleted successfully'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error deleting warframe',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
