<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;

class FeeAmountController extends Controller
{
    public function ViewFeeAmount() {
        // $data['allData'] = FeeAmount::all();
        $data['allData'] =  FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view', $data);
    }

    public function AddFeeAmount() {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add', $data);
    }

    public function StoreFeeAmount(Request $request) {
        $count = count($request->class_id);

        if ($count != NULL) {
            for ($i=0; $i < $count; $i++) {
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        } //endif

        $notification = array(
            'message' => 'Fee amounts successfully added',
            'alert-type' => 'success',
        );

        return redirect()->route('fee.amount.view')->with($notification);
    }

    public function EditFeeAmount($id) {
        $data['editData'] = FeeAmount::where('fee_category_id', $id)->orderBy('class_id', 'asc')->get();
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.edit', $data);
    }

    public function UpdateFeeAmount(Request $request, $id) {
        if ($request->class_id == null) {
            $notification = array(
                'message' => 'No class amount selected',
                'alert-type' => 'error',
            );

            return redirect()->route('fee.amount.edit', $id)->with($notification);
        } else {
            $count = count($request->class_id);
            FeeAmount::where('fee_category_id', $id)->delete();
            for ($i=0; $i < $count; $i++) {
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }

            $notification = array(
                'message' => 'Fee Amount successfully updated',
                'alert-type' => 'success',
            );

            return redirect()->route('fee.amount.view')->with($notification);
        }
    }

    public function DetailsFeeAmount($id) {
        $data['detailsData'] = FeeAmount::where('fee_category_id', $id)->orderBy('class_id', 'asc')->get();

        return view('backend.setup.fee_amount.details', $data);
    }
}
