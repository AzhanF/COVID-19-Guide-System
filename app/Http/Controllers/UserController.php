<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\UserInterface;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    protected $userRepository;


    public function __construct(UserInterface $userRepository)
    {
        $this->middleware(['can:view users']);

        $this->userRepository = $userRepository;
    }

    public function showAdminProfile($id) {
        $admin = $this->userRepository->findAdmin($id);
        $data = [
            'admin'   => $admin,
        ];
        return view('admin.profile', $data);
    }

    //Admin
    public function editAdmin($id) {
        $admin = $this->userRepository->findAdmin($id);

        $data = [
            'admin'   => $admin,
        ];

        return view('admin.edit', $data);
    }
    public function updateAdmin(Request $request) {
        try {
            $this->userRepository->updateAdmin($request->toArray());

            Alert::success('Success', 'Information update was successful');

            return redirect()->back();
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
