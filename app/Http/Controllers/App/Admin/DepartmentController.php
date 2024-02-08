<?php

namespace App\http\Controllers\App\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $departments = Department::all();

        return view('app.admin.departments.index', ['departments' => $departments]);
    }

    public function create()
    {
        return view('app.admin.departments.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255|unique:departments'
        ]);

        $newDepartment = Department::create($data);

        return redirect(route('app.admin.departments.index'))->with('status', 'Department has been succesfully added!');
    }

    public function destroy(Request $request, Department $department)
    {
        $department->delete();

        return redirect(route('app.admin.departments.index'))->with('status', 'Department has been succesfully deleted!');
    }

    public function modify(Department $department)
    {
        return view('app.admin.departments.modify', ['department' => $department]);
    }

    public function update(Request $request, Department $department)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255|unique:departments,name,' . $department->id,
        ]);

        $department->update($data);

        return redirect(route('app.admin.departments.index'))->with('status', 'Department has been succesfully updated!');
    }
}
