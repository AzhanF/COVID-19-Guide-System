<?php

namespace App\Repositories;

use App\Models\Advice;
use Illuminate\Support\Facades\Storage;

class AdviceRepository {

    public function store($request) {
        try{
            $photo = $request['photo'];
            $path = '/';
            $photoPath = Storage::disk('google')->putFile($path, $photo, 'public');
            $url = Storage::disk('google')->url($photoPath);
            Advice::create([
                'photo'         => $url,
                'title'         => $request['title'],
                'consultant_id' => $request['consultant_id'],
                'advice'        => $request['advice']

            ]);

        } catch(\Exception $e){
            throw new \Exception('Failed to save Advice. '.$e->getMessage());
        }
    }

    public function getAllAdvices(){
        try{
            return Advice::latest()->get();
        }catch(\Exception $e){
            throw new \Exception('Failed to get all Advices. ' . $e->getMessage());
        }
    }

    public function findAdvice($id){
        try{
            return Advice::where('id', $id)->first();
        }catch(\Exception $e){
            throw new \Exception('Failed to get Advice. ' . $e->getMessage());
        }
    }

    public function findAllAdvice($id){
        try{
            return Advice::where('consultant_id', $id)->get();
        }catch(\Exception $e){
            throw new \Exception('Failed to get Advice. ' . $e->getMessage());
        }
    }


    public function updateAdvice($request){
        if($request['photo'] == null){
            try{
                Advice::where('id', $request['id'])->update([
                    'title'         => $request['title'],
                    'consultant_id' => $request['consultant_id'],
                    'advice'        => $request['advice']
                ]);
            } catch (\Exception $e) {
                throw new \Exception('Failed to update Advice. '.$e->getMessage());
            }
        }
        else{
            try{
                $photo = $request['photo'];
                $path = '/';
                $photoPath = Storage::disk('google')->putFile($path, $photo, 'public');
                $url = Storage::disk('google')->url($photoPath);
                Advice::where('id', $request['id'])->update([
                    'title'         => $request['title'],
                    'consultant_id' => $request['consultant_id'],
                    'advice'        => $request['advice'],
                    'photo'         => $url,
                ]);
            } catch (\Exception $e) {
                throw new \Exception('Failed to update Advice. '.$e->getMessage());
            }
        }
    }

    public function delete($id){
        try{
            Advice::destroy($id);
        } catch (\Exception $e) {
            throw new \Exception('Failed to delete selected advice. '.$e->getMessage());
        }
    }
}