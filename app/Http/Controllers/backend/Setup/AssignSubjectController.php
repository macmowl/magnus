<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubject() {
        $data['allData'] =  AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view', $data);
    }

    public function AddAssignSubject() {
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.add', $data);
    }

    public function StoreAssignSubject(Request $request) {
        $count = count($request->subject_id);

        if ($count != NULL) {
            for ($i=0; $i < $count; $i++) {
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            }
        } //endif

        $notification = array(
            'message' => 'Assign subject successfully added',
            'alert-type' => 'success',
        );

        return redirect()->route('assign.subject.view')->with($notification);
    }

    public function EditAssignSubject($id) {
        $data['editData'] = AssignSubject::where('class_id', $id)->orderBy('subject_id', 'asc')->get();
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.edit', $data);
    }

    public function UpdateAssignSubject(Request $request, $id) {
        if ($request->subject_id == null) {
            $notification = array(
                'message' => 'No subject selected',
                'alert-type' => 'error',
            );

            return redirect()->route('assign.subject.edit', $id)->with($notification);
        } else {
            $count = count($request->subject_id);
            AssignSubject::where('class_id', $id)->delete();
            for ($i=0; $i < $count; $i++) {
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            }

            $notification = array(
                'message' => 'Assign subject successfully updated',
                'alert-type' => 'success',
            );

            return redirect()->route('assign.subject.view')->with($notification);
        }
    }

    public function DetailsAssignSubject($id) {
        $data['detailsData'] = AssignSubject::where('class_id', $id)->orderBy('subject_id', 'asc')->get();

        return view('backend.setup.assign_subject.details', $data);
    }
}
