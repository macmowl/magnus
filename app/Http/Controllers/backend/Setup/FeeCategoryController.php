<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function ViewFeeCategory() {
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view', $data);
    }

    public function AddFeeCategory() {
        return view('backend.setup.fee_category.add');
    }

    public function StoreFeeCategory(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories',
        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category successfully added',
            'alert-type' => 'success',
        );

        return redirect()->route('fee.category.view')->with($notification);
    }

    public function EditFeeCategory($id) {
        $editData = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit', compact('editData'));
    }

    public function UpdateFeeCategory(Request $request, $id) {
        $data = FeeCategory::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories',
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category successfully updated',
            'alert-type' => 'success',
        );

        return redirect()->route('fee.category.view')->with($notification);
    }

    public function DeleteFeeCategory($id) {
        FeeCategory::find($id)->delete();

        $notification = array(
            'message' => 'Fee Category successfully deleted',
            'alert-type' => 'info',
        );

        return redirect()->route('fee.category.view')->with($notification);
    }
}
