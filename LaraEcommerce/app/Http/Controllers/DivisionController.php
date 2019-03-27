<?php

namespace App\Http\Controllers;
use App\Divisions;
use App\District;

use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
  {
    $divisions = Divisions::orderBy('priority', 'asc')->get();
    return view('admin.pages.division.index', compact('divisions'));
  }

  public function create()
  {
    return view('admin.pages.division.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name'  => 'required',
      'priority'  => 'required',
    ],
    [
      'name.required'  => 'Please provide a division name',
      'priority.required'  => 'Please provide a division priority',
    ]);

    $division = new Divisions();
    $division->name = $request->name;
    $division->priority = $request->priority;
    $division->save();

    session()->flash('success', 'A new division has added successfully !!');
    return redirect()->route('admin.divisions');

  }

  public function edit($id)
  {
    $division= Divisions::find($id);
    if (!is_null($division)) {
      return view('admin.pages.division.edit', compact('division'));
    }else {
      return resirect()->route('admin.divisions');
    }
  }


    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'name'  => 'required',
        'priority'  => 'required',
      ],
      [
        'name.required'  => 'Please provide a division name',
        'priority.required'  => 'Please provide a division priority',
      ]);

      $division = Divisions::find($id);
      $division->name = $request->name;
      $division->priority = $request->priority;
      $division->save();

      session()->flash('success', 'Division has updated successfully !!');
      return redirect()->route('admin.divisions');

    }

    public function delete($id)
    {
      $division = Divisions::find($id);
      if (!is_null($division)) {
        //Delete all the districts for this division
        $districts = District::where('division_id', $division->id)->get();
        foreach ($districts as $district) {
          $district->delete();
        }
        $division->delete();
      }
      session()->flash('success', 'Division has deleted successfully !!');
      return back();

    }
}
