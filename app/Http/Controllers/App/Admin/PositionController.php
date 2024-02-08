<?php

namespace App\http\Controllers\App\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $positions = Position::all();

        return view('app.admin.positions.index', ['positions' => $positions]);
    }

    public function create()
    {
        return view('app.admin.positions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255|unique:positions'
        ]);

        $newPosition = Position::create($data);

        return redirect(route('app.admin.positions.index'))->with('status', 'Position has been succesfully added!');
    }

    public function destroy(Request $request, Position $position)
    {
        $position->delete();

        return redirect(route('app.admin.positions.index'))->with('status', 'Position has been succesfully deleted!');
    }

    public function modify(Position $position)
    {
        return view('app.admin.positions.modify', ['position' => $position]);
    }

    public function update(Request $request, Position $position)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255|unique:positions,name,' . $position->id,
        ]);

        $position->update($data);

        return redirect(route('app.admin.positions.index'))->with('status', 'Position has been succesfully updated!');
    }
}
