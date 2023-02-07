<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ActivityRepository;
use App\Http\Requests\ActivityStoreRequest;
use RealRashid\SweetAlert\Facades\Alert;


class ActivityController extends Controller
{
    protected $activityRepository;

    public function __construct(ActivityRepository $activityRepository){
        $this->activityRepository = $activityRepository;
    }

    public function create()
    {
        return view('activities.create');
    }
    
    public function store(ActivityStoreRequest $request)
    {
        try{
            $activityRepository = new ActivityRepository();
            $activityRepository->store($request->validated());

            Alert::success('Success', 'Activity creation was successful');

            return redirect()->route('activity.list');
        }catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
    }

     public function getActivityList(){
        $activities = $this->activityRepository->getAllActivities();

        $data = [
            'activities' => $activities,
        ];

        return view('activities.list', $data);
    }

     public function showActivity($id)
     {
         $activity = $this->activityRepository->findActivity($id);
         $data = [
             'activity' => $activity,
         ];
         return view('activities.info', $data);
     }

    public function editActivity($id)
    {
        $activity = $this->activityRepository->findActivity($id);
        $data = [
            'activity' => $activity,
        ];

        return view('activities.edit', $data);
    }

    public function updateActivity(Request $request)
    {
        try{
            $this->activityRepository->updateActivity($request->toArray());

            Alert::success('Success', 'Activity update was successful');

            return redirect()->route('activity.list');
        }catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
    }

     public function destroy(Request $request)
     {
         try{
             $activityRepository = new ActivityRepository();
             $activityRepository->delete($request->id);
 
             return response()->json(['status' => 'Activity was deleted successfully!']);
         } catch (\Exception $e) {
             return back()->withError($e->getMessage());
         }
     }
}
