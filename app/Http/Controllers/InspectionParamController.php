<?php

namespace App\Http\Controllers;

use App\Models\InspectionParameter;
use Illuminate\Http\Request;

class InspectionParamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (isset($_GET['trash'])) {
            $params = InspectionParameter::onlyTrashed()->get();
            return view('Parameters.trash', compact('params'));
        }
        $params = InspectionParameter::get();
        return view('Parameters.index', compact('params'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Parameters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'parameter' => 'required|string|max:100|unique:inspection_parameters'
        ]);
        InspectionParameter::create($validatedData);
        return redirect('param')->with('success', "{$validatedData['parameter']} Added Successfully");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $param = InspectionParameter::find($id);
        return view('Parameters.edit', compact('param'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'parameter' => 'required|string|max:100'
        ]);
        InspectionParameter::find($id)->update($validatedData);
        return redirect('param')->with('success', "{$validatedData['parameter']} Updated Successfully");
    }

    /**
     * Remove the specified resource from storage but still in trash.
     */
    public function destroy(string $id)
    {
        $parameter = InspectionParameter::find($id);
        InspectionParameter::where('id', $id)->delete();
        return redirect('param')->with('success', "{$parameter->parameter} Temporarily Deleted Successfully");
    }

    /**
     * Remove the specified resource from storage and trash.
     */
    public function forceDelete(string $id)
    {
        $parameter = InspectionParameter::onlyTrashed()->where('id', $id)->first();
        InspectionParameter::where('id', $id)->forceDelete();
        if (isset($_GET['trash'])) {
            return redirect("param?trash='true'")->with('success', "{$parameter->parameter} Permanently Deleted Successfully");
        }
        return redirect("param")->with('success', "{$parameter->parameter} Permanently Deleted Successfully");
    }

    /**
     * Restore the specified resource from trash.
     */
    public function restoreData(string $id)
    {
        InspectionParameter::where('id', $id)->restore();
        $parameter = InspectionParameter::find($id);
        return redirect("param?trash='true'")->with('success', "{$parameter->parameter} Restored Successfully");
    }
}
