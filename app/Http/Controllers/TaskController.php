<?php

namespace App\Http\Controllers;

use App\Models\InspectionParameter;
use App\Models\ProductionOrder;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (isset($_GET['trash'])) {
            $orders = ProductionOrder::onlyTrashed()->get();
            return view('Orders.trash', compact('orders'));
        }
        $orders = ProductionOrder::get();
        return view('Orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = ProductionOrder::find($id);
        $params = InspectionParameter::get();
        return view('Orders.show', compact( 'params','order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $params = InspectionParameter::get();
        return view('Orders.create', compact( 'params'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'production_order' => 'required|numeric|unique:production_orders',
            'work_order' => 'required|string|unique:production_orders',
            'date' => 'required|date',
            'customer' => 'required|string',
            'project' => 'required|string',
            'shape' => 'required|string',
            'quality_inspector' => 'required|string',
            'approved_by' => 'string|nullable',
            'parameters' => 'array'
        ]);

        ProductionOrder::create($validatedData);

        return redirect('order')->with('success', "Order was Added Successfully");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = ProductionOrder::find($id);
        $params = InspectionParameter::get();
        return view('Orders.edit', compact('order', 'params'));
    }

    /**
     * Updae the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'customer' => 'required|string',
            'project' => 'required|string',
            'shape' => 'required|string',
            'quality_inspector' => 'required|string',
            'approved_by' => 'string|nullable',
            'parameters' => 'array'
        ]);

        ProductionOrder::find($id)->update($validatedData);

        return redirect('order')->with('success', "Order was Updated Successfully");
    }

    /**
     * Remove the specified resource from storage but still in trash.
     */
    public function destroy(string $id)
    {
        ProductionOrder::where('id', $id)->delete();
        return redirect('order')->with('success', "Order Temporarily Deleted Successfully");
    }

    /**
     * Remove the specified resource from storage and trash.
     */
    public function forceDelete(string $id)
    {
        ProductionOrder::where('id', $id)->forceDelete();
        if (isset($_GET['trash'])) {
            return redirect("order?trash='true'")->with('success', "Order Permanently Deleted Successfully");
        }
        return redirect("order")->with('success', "Order Permanently Deleted Successfully");

    }

    /**
     * Restore the specified resource from trash.
     */
    public function restoreData(string $id)
    {
        ProductionOrder::where('id', $id)->restore();
        return redirect("order?trash='true'")->with('success', "Order Restored Successfully");
    }
}
