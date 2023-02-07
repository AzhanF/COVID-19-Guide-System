<?php

namespace App\Repositories;

use App\Models\Activity;
use Illuminate\Support\Facades\Storage;

class ActivityRepository {


    public function store($request) {
        if($request['video'] == null){
            try{
                Activity::create([
                    'video'         => $request['video'],
                    'title'         => $request['title'],
                    'description'   => $request['description'],
                    'tutorial'      => $request['tutorial']
    
                ]);
    
            } catch(\Exception $e){
                throw new \Exception('Failed to save Activity. '.$e->getMessage());
            }
        }
        else{
            try{
                $video = $request['video'];
                $path = '/';
                $videoPath = Storage::disk('google')->putFile($path, $video, 'public');
                $url = Storage::disk('google')->url($videoPath);
                Activity::create([
                    'video'         => $url,
                    'title'         => $request['title'],
                    'description'   => $request['description'],
                    'tutorial'      => $request['tutorial']
    
                ]);
    
            } catch(\Exception $e){
                throw new \Exception('Failed to save Activity. '.$e->getMessage());
            }
        }
    }

    public function getAllActivities(){
        try{
            return Activity::get();
        }catch(\Exception $e){
            throw new \Exception('Failed to get all Activities. ' . $e->getMessage());
        }
    }

    public function findActivity($id){
        try{
            return Activity::where('id', $id)->first();
        }catch(\Exception $e){
            throw new \Exception('Failed to get Activity. ' . $e->getMessage());
        }
    }

    public function updateActivity($request){
        if($request['video'] == null){
            try{
                Activity::where('id', $request['id'])->update([
                    'title'         => $request['title'],
                    'description'   => $request['description'],
                    'tutorial'      => $request['tutorial']
                ]);
            } catch (\Exception $e) {
                throw new \Exception('Failed to update Activity. '.$e->getMessage());
            }
        }
        else{
            try{
                $video = $request['video'];
                $path = '/';
                $videoPath = Storage::disk('google')->putFile($path, $video, 'public');
                $url = Storage::disk('google')->url($videoPath);
                Activity::where('id', $request['id'])->update([
                    'title'         => $request['title'],
                    'description'   => $request['description'],
                    'tutorial'      => $request['tutorial'],
                    'video'         => $url,
                ]);
            } catch (\Exception $e) {
                throw new \Exception('Failed to update Activity. '.$e->getMessage());
            }
        }
    }

    public function delete($id){
        try{
            Activity::destroy($id);
        } catch (\Exception $e) {
            throw new \Exception('Failed to delete selected activity. '.$e->getMessage());
        }
    }
}