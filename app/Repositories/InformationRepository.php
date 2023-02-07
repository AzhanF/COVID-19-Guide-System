<?php

namespace App\Repositories;

use App\Models\Information;
use Illuminate\Support\Facades\Storage;

class InformationRepository {

    public function store($request) {
        if($request['photo'] == null){
            try{
                Information::create([
                    'title'         => $request['title'],
                    'description'   => $request['description'],
                    'photo'         => $request['photo'],
                ]);
                
            } catch(\Exception $e){
                throw new \Exception('Failed to save Information. '.$e->getMessage());
            }
        }
        else{
            $photo = $request['photo'];
            $path = '/';
            $photoPath = Storage::disk('google')->putFile($path, $photo, 'public');
            $url = Storage::disk('google')->url($photoPath);
            try{
                Information::create([
                    'title'         => $request['title'],
                    'description'   => $request['description'],
                    'photo'         => $url,
                ]);
                
            } catch(\Exception $e){
                throw new \Exception('Failed to save Information. '.$e->getMessage());
            }
        }
    }

    public function getAllInformations(){
        try{
            return Information::get();
        }catch(\Exception $e){
            throw new \Exception('Failed to get all Informations. ' . $e->getMessage());
        }
    }

    public function findInfo($id){
        try{
            return Information::where('id', $id)->first();
        }catch(\Exception $e){
            throw new \Exception('Failed to get Information. ' . $e->getMessage());
        }
    }

    public function updateInfo($request){
        if($request['photo'] == null){
            try{
                Information::where('id', $request['id'])->update([
                    'title'         => $request['title'],
                    'description'   => $request['description'],
                ]);
            } catch (\Exception $e) {
                throw new \Exception('Failed to update Information. '.$e->getMessage());
            }
        }
        else{
            $photo = $request['photo'];
            $path = '/';
            $photoPath = Storage::disk('google')->putFile($path, $photo, 'public');
            $url = Storage::disk('google')->url($photoPath);
            try{
                Information::where('id', $request['id'])->update([
                    'title'         => $request['title'],
                    'description'   => $request['description'],
                    'photo'         => $url,
                ]);
            } catch (\Exception $e) {
                throw new \Exception('Failed to update Information. '.$e->getMessage());
            }
        }
    }

    public function delete($id){
        try{
            Information::destroy($id);
        } catch (\Exception $e) {
            throw new \Exception('Failed to delete selected information. '.$e->getMessage());
        }
    }
}