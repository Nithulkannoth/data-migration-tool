<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::paginate(10); // Paginate with 10 records per page
        return view('designations.index', compact('designations'));
    }
 
    public function create()
    {
        return view('designations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:designations,name|max:255',
        ]);

        Designation::create($request->all());
        return redirect()->route('designations.index')->with('success', 'Designation created successfully.');
    }

    public function edit(Designation $designation)
    {
        return view('designations.edit', compact('designation'));
    }

    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'name' => 'required|unique:designations,name,' . $designation->id . '|max:255',
        ]);

        $designation->update($request->all());
        return redirect()->route('designations.index')->with('success', 'Designation updated successfully.');
    }

    public function destroy(Designation $designation)
    {
        if ($designation->employees()->count() > 0) {
            return redirect()->route('designations.index')->with('error', 'Cannot delete designation as it is associated with employees.');
        }

        $designation->delete();
        return redirect()->route('designations.index')->with('success', 'designation deleted successfully.');
    }
}
