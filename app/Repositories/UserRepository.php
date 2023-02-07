<?php

namespace App\Repositories;

use App\Models\User;
use App\Traits\Base64ToFile;
use App\Interfaces\UserInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface {
    use Base64ToFile;

    public function updateAdmin($request) {
        if($request['photo'] == null){
            try {
                    User::where('id', $request['id'])->update([
                        'first_name'    => $request['first_name'],
                        'last_name'     => $request['last_name'],
                        'email'         => $request['email'],
                        'gender'        => $request['gender'],
                        'nationality'   => $request['nationality'],
                        'phone'         => $request['phone'],
                        'address'       => $request['address'],
                        'birthday'      => $request['birthday'],
                        'religion'      => $request['religion'],
                    ]);
            } catch (\Exception $e) {
                throw new \Exception('Failed to update Admin. '.$e->getMessage());
            }
        }
        else{
            try {
                    User::where('id', $request['id'])->update([
                        'first_name'    => $request['first_name'],
                        'last_name'     => $request['last_name'],
                        'email'         => $request['email'],
                        'gender'        => $request['gender'],
                        'nationality'   => $request['nationality'],
                        'photo'         => (!empty($request['photo']))?$this->convert($request['photo']):null,
                        'phone'         => $request['phone'],
                        'address'       => $request['address'],
                        'birthday'      => $request['birthday'],
                        'religion'      => $request['religion'],
                    ]);
            } catch (\Exception $e) {
                throw new \Exception('Failed to update Admin. '.$e->getMessage());
            }
        }
    }

    public function findAdmin($id) {
        try {
            return User::where('id', $id)->first();
        } catch (\Exception $e) {
            throw new \Exception('Failed to get Admin. '.$e->getMessage());
        }
    }

    public function changePassword($new_password) {
        try {
            return User::where('id', auth()->user()->id)->update([
                'password'  => Hash::make($new_password)
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to change password. '.$e->getMessage());
        }
    }
}