<?php

namespace App\Http\Controllers\backend\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\Subject;
use App\Models\Shift;
use App\Models\DiscountStudent;
use DB;
use Image;
use PDF;

class RollController extends Controller
{
    public function ViewRoll() {
        $data['years'] = Studentyear::all();
        $data['classes'] = StudentClass::all();
        return view('backend.student.roll_gen.view', $data);
    }
}
