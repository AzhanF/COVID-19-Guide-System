<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\InformationRepository;
use App\Http\Requests\InformationStoreRequest;
use RealRashid\SweetAlert\Facades\Alert;

class InformationController extends Controller
{
    protected $infoRepository;

    public function __construct(InformationRepository $infoRepository){
        $this->infoRepository = $infoRepository;
    }

    public function create()
    {
        return view('informations.create');
    }

    public function store(InformationStoreRequest $request)
    {
        try{
            $InformationRepository = new InformationRepository();
            $InformationRepository->store($request->validated());

            Alert::success('Success', 'Information creation was successful');

            return redirect()->route('information.list');
        }catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
    }

    public function getInfoList(){
        $informations = $this->infoRepository->getAllInformations();

        $data = [
            'informations' => $informations,
        ];

        return view('informations.list', $data);
    }

    public function showInfo($id)
    {
        $information = $this->infoRepository->findInfo($id);
        $data = [
            'information' => $information,
        ];
        return view('informations.info', $data);
    }

    public function editInfo($id)
    {
        $information = $this->infoRepository->findInfo($id);
        $data = [
            'information' => $information,
        ];

        return view('informations.edit', $data);
    }

    public function updateInfo(Request $request)
    {
        try{
            $this->infoRepository->updateInfo($request->toArray());
            
            Alert::success('Success', 'Information update was successful');

            return redirect()->route('information.list');
        }catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try{
            $infoRepository = new InformationRepository();
            $infoRepository->delete($request->id);

            return response()->json(['status' => 'Information was deleted successfully!']);
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
