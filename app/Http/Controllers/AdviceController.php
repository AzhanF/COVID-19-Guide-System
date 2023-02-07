<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AdviceRepository;
use App\Repositories\ConsultantRepository;
use App\Http\Requests\AdviceStoreRequest;
use RealRashid\SweetAlert\Facades\Alert;


class AdviceController extends Controller
{
    protected $adviceRepository;

    protected $consultantRepository;

    public function __construct(AdviceRepository $adviceRepository, ConsultantRepository $consultantRepository){
        $this->adviceRepository = $adviceRepository;
        $this->consultantRepository = $consultantRepository;
    }

    public function create()
    {
        $consultants = $this->consultantRepository->getAllConsultants();

        $data = [
            'consultants' => $consultants,
        ];
        return view('advices.create', $data);
    }

    public function store(AdviceStoreRequest $request)
    {
        try{
            $adviceRepository = new AdviceRepository();
            $adviceRepository->store($request->validated());

            Alert::success('Success', 'Advice creation was successful');

            return redirect()->route('advice.list');
        }catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
    }

     public function getAdviceList(){
        $advices = $this->adviceRepository->getAllAdvices();

        $data = [
            'advices' => $advices,
        ];

        return view('advices.list', $data);
    }

     public function showAdvice($id)
     {
         $advice = $this->adviceRepository->findAdvice($id);
         $advice2s = $this->adviceRepository->getAllAdvices();
         $data = [
             'advice' => $advice,
             'advice2s' => $advice2s
         ];
         return view('advices.info', $data);
     }

    public function editAdvice($id)
    {
        $advice = $this->adviceRepository->findAdvice($id);
        $consultants = $this->consultantRepository->getAllConsultants();
        $data = [
            'advice' => $advice,
            'consultants'   => $consultants,
        ];

        return view('advices.edit', $data);
    }

    public function updateAdvice(Request $request)
    {
        try{
            $this->adviceRepository->updateAdvice($request->toArray());

            Alert::success('Success', 'Advice update was successful');

            return redirect()->route('advice.list');
        }catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
    }

     public function destroy(Request $request)
     {
         try{
             $adviceRepository = new AdviceRepository();
             $adviceRepository->delete($request->id);
 
             return response()->json(['status' => 'Advice was deleted successfully!']);
         } catch (\Exception $e) {
             return back()->withError($e->getMessage());
         }
     }
}
