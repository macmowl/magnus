<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function ViewDesignation() {
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view', $data);
    }

    public function AddDesignation() {
        return view('backend.setup.designation.add');
    }

    public function StoreDesignation(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:designations',
        ]);

        $data = new Designation();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation successfully added',
            'alert-type' => 'success',
        );

        return redirect()->route('designation.view')->with($notification);
    }

    public function EditDesignation($id) {
        $editData = Designation::find($id);
        return view('backend.setup.designation.edit', compact('editData'));
    }

    public function UpdateDesignation(Request $request, $id) {
        $data = Designation::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:designations',
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation successfully updated',
            'alert-type' => 'success',
        );

        return redirect()->route('designation.view')->with($notification);
    }

    public function DeleteDesignation($id) {
        Designation::find($id)->delete();

        $notification = array(
            'message' => 'Designation successfully deleted',
            'alert-type' => 'info',
        );

        return redirect()->route('designation.view')->with($notification);
    }

}
