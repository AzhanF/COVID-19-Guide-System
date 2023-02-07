<?php

namespace App\Repositories;

use App\Models\Consultant;
use Illuminate\Support\Facades\Storage;

class ConsultantRepository {

    public function store($request) {
        if([$request['photo'] != null]){
            try{
                $photo = $request['photo'];
                $path = '/';
                $photoPath = Storage::disk('google')->putFile($path, $photo, 'public');
                $url = Storage::disk('google')->url($photoPath);
                Consultant::create([
                    'firstname'         => $request['firstname'],
                    'lastname'          => $request['lastname'],
                    'email'             => $request['email'],
                    'birthday'          => $request['birthday'],
                    'nationality'       => $request['nationality'],
                    'religion'          => $request['religion'],
                    'gender'            => $request['gender'],
                    'phone'             => $request['phone'],
                    'address'           => $request['address'],
                    'qualification'     => $request['qualification'],
                    'specialization'    => $request['specialization'],
                    'membership'        => $request['membership'],
                    'photo'             => $url,
                ]);
            } catch(\Exception $e){
                throw new \Exception('Failed to save Consultant. '.$e->getMessage());
            }
        }
        else{
            try{
                Consultant::create([
                    'firstname'         => $request['firstname'],
                    'lastname'          => $request['lastname'],
                    'email'             => $request['email'],
                    'birthday'          => $request['birthday'],
                    'nationality'       => $request['nationality'],
                    'religion'          => $request['religion'],
                    'gender'            => $request['gender'],
                    'phone'             => $request['phone'],
                    'address'           => $request['address'],
                    'qualification'     => $request['qualification'],
                    'specialization'    => $request['specialization'],
                    'membership'        => $request['membership'],
                    'photo'             => $request['photo'],
                ]);
            } catch(\Exception $e){
                throw new \Exception('Failed to save Consultant. '.$e->getMessage());
            }
        }
    }

    public function getAllConsultants(){
        try{
            return Consultant::get();
        }catch(\Exception $e){
            throw new \Exception('Failed to get all Consultants. ' . $e->getMessage());
        }
    }

    public function findConsultant($id){
        try{
            return Consultant::where('id', $id)->first();
        }catch(\Exception $e){
            throw new \Exception('Failed to get Consultant. ' . $e->getMessage());
        }
    }

    public function updateConsultant($request){
        if($request['photo'] == null){
            try{
                Consultant::where('id', $request['id'])->update([
                    'firstname'         => $request['firstname'],
                    'lastname'          => $request['lastname'],
                    'email'             => $request['email'],
                    'birthday'          => $request['birthday'],
                    'nationality'       => $request['nationality'],
                    'religion'          => $request['religion'],
                    'gender'            => $request['gender'],
                    'phone'             => $request['phone'],
                    'address'           => $request['address'],
                    'qualification'     => $request['qualification'],
                    'specialization'    => $request['specialization'],
                    'membership'        => $request['membership'],
                ]);
            } catch (\Exception $e) {
                throw new \Exception('Failed to update Consultant. '.$e->getMessage());
            }
        }
        else{
            try{
                $photo = $request['photo'];
                $path = '/';
                $photoPath = Storage::disk('google')->putFile($path, $photo, 'public');
                $url = Storage::disk('google')->url($photoPath);
                
                Consultant::where('id', $request['id'])->update([
                    'firstname'         => $request['firstname'],
                    'lastname'          => $request['lastname'],
                    'email'             => $request['email'],
                    'birthday'          => $request['birthday'],
                    'nationality'       => $request['nationality'],
                    'religion'          => $request['religion'],
                    'gender'            => $request['gender'],
                    'phone'             => $request['phone'],
                    'address'           => $request['address'],
                    'qualification'     => $request['qualification'],
                    'specialization'    => $request['specialization'],
                    'membership'        => $request['membership'],
                    'photo'             => $url,
                ]);
            } catch (\Exception $e) {
                throw new \Exception('Failed to update Consultant. '.$e->getMessage());
            }
        }
    }

    public function delete($id){
        try{
            Consultant::destroy($id);
        } catch (\Exception $e) {
            throw new \Exception('Failed to delete selected consultant. '.$e->getMessage());
        }
    }
}