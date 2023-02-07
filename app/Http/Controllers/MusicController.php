<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MusicRepository;
use App\Http\Requests\MusicStoreRequest;
use RealRashid\SweetAlert\Facades\Alert;


class MusicController extends Controller
{
    protected $musicRepository;

    public function __construct(MusicRepository $musicRepository){
        $this->musicRepository = $musicRepository;
    }
    public function create()
    {
        return view('music.create');
    }

    public function store(MusicStoreRequest $request)
    {
        try{
            $musicRepository = new MusicRepository();
            $musicRepository->store($request->validated());

            Alert::success('Success', 'Music creation was successful');

            return redirect()->route('music.list');
        }catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
    }

    public function getMusicList(){
        $musics = $this->musicRepository->getAllMusics();

        $data = [
            'musics' => $musics,
        ];

        return view('music.list', $data);
    }
    public function editMusic($id)
    {
        $music = $this->musicRepository->findMusic($id);
        $data = [
            'music' => $music,
        ];

        return view('music.edit', $data);
    }
    public function updateMusic(Request $request)
    {
        try{
            $this->musicRepository->updateMusic($request->toArray());

            Alert::success('Success', 'Music update was successful');

            return redirect()->route('music.list');
        }catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
    }

     public function destroy(Request $request)
     {
         try{
             $musicRepository = new MusicRepository();
             $musicRepository->delete($request->id);
 
             return response()->json(['status' => 'Selected song was deleted successfully!']);
         } catch (\Exception $e) {
             return back()->withError($e->getMessage());
         }
     }
}
