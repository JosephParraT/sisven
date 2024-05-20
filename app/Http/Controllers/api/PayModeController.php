<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PayMode;
use Illuminate\Http\Request;

class PayModeController extends Controller
{
    public function index()
    {
        $payModes = PayMode::all();
        return response()->json($payModes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mode' => 'required|string|max:255',
        ]);

        $payMode = PayMode::create($request->all());
        return response()->json($payMode, 201);
    }

    public function show($id)
    {
        $payMode = PayMode::find($id);
        if (is_null($payMode)) {
            return response()->json(['message' => 'PayMode not found'], 404);
        }
        return response()->json($payMode);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mode' => 'required|string|max:255',
        ]);

        $payMode = PayMode::find($id);
        if (is_null($payMode)) {
            return response()->json(['message' => 'PayMode not found'], 404);
        }

        $payMode->update($request->all());
        return response()->json($payMode);
    }

    public function destroy($id)
    {
        $payMode = PayMode::find($id);
        if (is_null($payMode)) {
            return response()->json(['message' => 'PayMode not found'], 404);
        }

        $payMode->delete();
        return response()->json(['message' => 'PayMode deleted successfully']);
    }
}
