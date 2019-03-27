<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Divisions;

class DistrictController extends Controller
{
    public function index()
  {
    $districts = District::orderBy('name', 'asc')->get();
    return view('admin.pages.district.index', compact('districts'));
  }

  public function create()
  {
    $divisions = Divisions::orderBy('priority', 'asc')->get();
    return view('admin.pages.district.create', compact('divisions'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name'  => 'required',
      'division_id'  => 'required',
    ],
    [
      'name.required'  => 'Please provide a district name',
      'division_id.required'  => 'Please provide a division for the district',
    ]);

    $district = new District();
    $district->name = $request->name;
    $district->division_id = $request->division_id;
    $district->save();

    session()->flash('success', 'A new district has added successfully !!');
    return redirect()->route('admin.districts');

  }

  public function edit($id)
  {
    $divisions = Divisions::orderBy('priority', 'asc')->get();
    $district= District::find($id);
    if (!is_null($district)) {
      return view('admin.pages.district.edit', compact('district', 'divisions'));
    }else {
      return resirect()->route('admin.districts');
    }
  }


    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'name'  => 'required',
        'division_id'  => 'required',
      ],
      [
        'name.required'  => 'Please provide a district name',
        'division_id.required'  => 'Please provide a division for the district',
      ]);

      $district = District::find($id);
      $district->name = $request->name;
      $district->division_id = $request->division_id;
      $district->save();

      session()->flash('success', 'District has updated successfully !!');
      return redirect()->route('admin.districts');

    }

    public function delete($id)
    {
      $district = District::find($id);
      if (!is_null($district)) {
        $district->delete();
      }
      session()->flash('success', 'District has deleted successfully !!');
      return back();

    }
}
