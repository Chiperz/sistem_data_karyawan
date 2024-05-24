<?php

namespace App\Http\Controllers;

use App\Datatables\StaffDataTable;

use App\Models\Staff;

use App\Traits\ImageUploadTrait;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(StaffDataTable $dataTable)
    {
        return $dataTable->render('staff.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required | max:200',
            'dob' => 'required | date',
            'address' => 'nullable',
            'marital_status' => 'required | boolean',
            'foto' => 'nullable | image | max:2048'
        ]);

        $staff = new Staff();

        // HANDLING NEW IMAGE
        $fotoPath = $this->uploadImage($request, 'foto', 'uploads', $request->name);

        $staff->name = $request->name;
        $staff->date_of_birth = $request->dob;
        $staff->address = $request->address;
        $staff->marital_status = $request->marital_status;
        $staff->foto = $fotoPath;
        $staff->save();

        toastr()->success('Staff Created Successfully!');

        return redirect()->route('staff.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'name' => 'required | max:200',
            'dob' => 'required | date',
            'address' => 'nullable',
            'marital_status' => 'required | boolean',
            'foto' => 'nullable | image | max:2048'
        ]);

        $staff = Staff::findOrFail($id);

        // HANDLING UPDATE IMAGE
        $fotoPath = $this->updateImage($request, 'foto', 'uploads', $staff->foto, $request->name);

        $staff->name = $request->name;
        $staff->date_of_birth = $request->dob;
        $staff->address = $request->address;
        $staff->marital_status = $request->marital_status;
        $staff->foto = empty(!$fotoPath) ? $fotoPath : $staff->foto;
        $staff->save();

        toastr()->success('Staff Edited Successfully!');

        return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = Staff::findOrFail($id);
        if(!empty($staff->foto)){
            $this->deleteImage($staff->foto);
        }
        $staff->delete();

        return response([
            'status' => 'success',
            'message' => 'Deleted Successfully!'
        ]);
    }
}
