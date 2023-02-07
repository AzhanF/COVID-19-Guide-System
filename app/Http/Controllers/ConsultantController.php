<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ConsultantRepository;
use App\Http\Requests\ConsultantStoreRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ConsultantController extends Controller
{
    protected $consultantRepository;

    public function __construct(ConsultantRepository $consultantRepository){
        $this->consultantRepository = $consultantRepository;
    }
    public function create()
    {
        return view('consultants.create');
    }

    public function store(ConsultantStoreRequest $request)
    {
        try{
            $consultantRepository = new ConsultantRepository();
            $consultantRepository ->store($request->validated());

            Alert::success('Success', 'New consultant successfully added');

            return redirect()->route('consultant.list');
        }catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
    }

    public function getConsultantList(){
        $consultants = $this->consultantRepository->getAllConsultants();

        $data = [
            'consultants' => $consultants,
        ];

        return view('consultants.list', $data);
    }

     public function showConsultant($id)
     {
         $consultant = $this->consultantRepository->findConsultant($id);
         $data = [
             'consultant' => $consultant,
         ];
         return view('consultants.info', $data);
     }

    public function editConsultant($id)
    {
        $consultant = $this->consultantRepository->findConsultant($id);
        $data = [
            'consultant' => $consultant,
        ];

        return view('consultants.edit', $data);
    }
    public function updateConsultant(Request $request)
    {
        try{
            $this->consultantRepository->updateConsultant($request->toArray());

            Alert::success('Success', 'Consultant profile was updated');

            return redirect()->route('consultant.list');
        }catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
    }

     public function destroy(Request $request)
     {
         try{
             $consultantRepository = new ConsultantRepository();
             $consultantRepository->delete($request->id);

             return response()->json(['status' => 'Record Deleted Successfully!']);
         } catch (\Exception $e) {
             return back()->withError($e->getMessage());
         }
     }

}