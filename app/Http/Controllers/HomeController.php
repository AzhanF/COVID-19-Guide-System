<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\UserInterface;
use App\Repositories\ActivityRepository;
use App\Repositories\ConsultantRepository;
use App\Repositories\InformationRepository;


class HomeController extends Controller
{

    protected $userRepository;
    protected $activityRepository;
    protected $consultantRepository;
    protected $infoRepository;

    public function __construct(UserInterface $userRepository, ActivityRepository $activityRepository, ConsultantRepository $consultantRepository, InformationRepository $infoRepository)
    {
        // $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->activityRepository = $activityRepository;
        $this->consultantRepository = $consultantRepository;
        $this->infoRepository = $infoRepository;
    }

    public function index()
    {
        $activities = $this->activityRepository->getAllActivities();
        $informations = $this->infoRepository->getAllInformations();
        $consultants = $this->consultantRepository->getAllConsultants();

        $data = [
            'activities' => $activities,
            'informations' => $informations,
            'consultants' => $consultants,
        ];
        return view('home', $data);
    }
}
