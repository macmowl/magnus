<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shift;

class ShiftController extends Controller
{
    public function ViewShift() {
        $data['allData'] = Shift::all();
        return view('backend.setup.shift.view_shift', $data);
    }

    public function AddShift() {
        return view('backend.setup.shift.add_shift');
    }

    public function StoreShift(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:shifts',
        ]);

        $data = new Shift();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Shift successfully added',
            'alert-type' => 'success',
        );

        return redirect()->route('shift.view')->with($notification);
    }

    public function EditShift($id) {
        $editData = Shift::find($id);
        return view('backend.setup.shift.edit_shift', compact('editData'));
    }

    public function UpdateShift(Request $request, $id) {
        $data = Shift::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:shifts',
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Shift successfully updated',
            'alert-type' => 'success',
        );

        return redirect()->route('shift.view')->with($notification);
    }

    public function DeleteShift($id) {
        Shift::find($id)->delete();

        $notification = array(
            'message' => 'Shift successfully deleted',
            'alert-type' => 'info',
        );

        return redirect()->route('shift.view')->with($notification);
    }
}
