<?php

namespace App\Http\Controllers;

use App\Models\LeaveCategory;
use App\Models\LeaveRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function getLeaveType(){
        $leaveType = LeaveCategory::all();
        return response()->json($leaveType, 200);
    }

    public function gethod(){
        $hod = User::all();
        return response()->json($hod, 200);
    }

    public function leaveBalance(){
        $user_id = Auth::id();
        $totalLeave = User::where('id','=',$user_id);
    }
    public function leaveStore(Request $request){

        try{
            $user = auth()->user();

            $request->validate([
                'leave_id' => 'required|exists:leave_categories,id',
                'manager_id' => 'required|exists:users,id',
                'fm_date' => 'required|date',
                'to_date' => 'required|date|after_or_equal:fm_date',
                'reason' => 'required|string|max:255'
            ]);

            $leave_id = LeaveCategory::findOrFail($request->input('leave_id'));

            $availableDays = $user->leaveBalances()->where('leave_id', $leave_id->id)->value('days_available');
            $requestedDays = Carbon::parse($request->input('fm_date'))->diffInDays(Carbon::parse($request->input('to_date'))) + 1;

            if ($requestedDays > $availableDays){
                return redirect()->back()->withErrors(['Leave balance not sufficient for selected category.']);
            }

            LeaveRequest::create([
                'user_id' => $user->id,
                'leave_id' => $leave_id->id,
                'manager_id' => $request->input('manager_id'),
                'fm_date' => $request->input('fm_date'),
                'to_date' => $request->input('to_date'),
                'reason' => $request->input('reason'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Leave application submitted successfully..!'
            ]);
        }
        catch (Exception $e){
            return response()->json([
                'status' => 'fail',
                'message' => 'Application error..!'
            ]);
        }


    }

    public function leaveApplication(){
        return view('user.leaveForm');
    }

    public function appList(){
        $user = auth()->user();
        $user_app_list = LeaveRequest::where('user_id', $user->id)->with('leaveCategory')->get();
        return response()->json($user_app_list, 200);
    }
}
