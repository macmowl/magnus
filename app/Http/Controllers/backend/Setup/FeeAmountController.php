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
        $data['allData'] = FeeAmount::all();
        return view('backend.setup.fee_amount.view', $data);
    }

    public function AddFeeAmount() {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add', $data);
    }
}
