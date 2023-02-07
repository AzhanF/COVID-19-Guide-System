<?php

namespace App\Repositories;

use App\Models\Music;
use Illuminate\Support\Facades\Storage;

class MusicRepository {

    public function store($request) {
        $photo = $request['photo'];
        $path = '/';
        $photoPath = Storage::disk('google')->putFile($path, $photo, 'public');
        $url1 = Storage::disk('google')->url($photoPath);
        $audio = $request['audio'];
        $audioPath = Storage::disk('google')->putFile($path, $audio, 'public');
        $url2 = Storage::disk('google')->url($audioPath);
        try{
            Music::create([
                'photo'         => $url1,
                'title'         => $request['title'],
                'artist'        => $request['artist'],
                'genre'         => $request['genre'],
                'audio'         => $url2,
            ]);

        } catch(\Exception $e){
            throw new \Exception('Failed to save Music. '.$e->getMessage());
        }
    }

    public function getAllMusics(){
        try{
            return Music::latest()->get();
        }catch(\Exception $e){
            throw new \Exception('Failed to get all Musics. ' . $e->getMessage());
        }
    }

    public function findMusic($id){
        try{
            return Music::where('id', $id)->first();
        }catch(\Exception $e){
            throw new \Exception('Failed to get Music. ' . $e->getMessage());
        }
    }

    public function updateMusic($request){
        if($request['photo'] == null && $request['audio'] == null){
            try{
                Music::where('id', $request['id'])->update([
                    'title'         => $request['title'],
                    'artist'        => $request['artist'],
                    'genre'         => $request['genre'],
                ]);
            } catch (\Exception $e) {
                throw new \Exception('Failed to update Music. '.$e->getMessage());
            }
        }
        else if ($request['photo'] != null && $request['audio'] == null){
            try{
                $photo = $request['photo'];
                $path = '/';
                $photoPath = Storage::disk('google')->putFile($path, $photo, 'public');
                $url1 = Storage::disk('google')->url($photoPath);
                Music::where('id', $request['id'])->update([
                    'photo'         => $url1,
                    'title'         => $request['title'],
                    'artist'        => $request['artist'],
                    'genre'         => $request['genre'],

                ]);
            } catch (\Exception $e) {
                throw new \Exception('Failed to update Music. '.$e->getMessage());
            }
        }
        else if ($request['photo'] == null && $request['audio'] != null){
            try{
                $photo = $request['photo'];
                $path = '/';
                $photoPath = Storage::disk('google')->putFile($path, $photo, 'public');
                $url1 = Storage::disk('google')->url($photoPath);
                $audio = $request['audio'];
                $audioPath = Storage::disk('google')->putFile($path, $audio, 'public');
                $url2 = Storage::disk('google')->url($audioPath);
                Music::where('id', $request['id'])->update([
                    'title'         => $request['title'],
                    'artist'        => $request['artist'],
                    'audio'         => $url2,
                    'genre'         => $request['genre'],

                ]);
            } catch (\Exception $e) {
                throw new \Exception('Failed to update Music. '.$e->getMessage());
            }
        }
        else{
            try{
                $photo = $request['photo'];
                $path = '/';
                $photoPath = Storage::disk('google')->putFile($path, $photo, 'public');
                $url1 = Storage::disk('google')->url($photoPath);
                $audio = $request['audio'];
                $audioPath = Storage::disk('google')->putFile($path, $audio, 'public');
                $url2 = Storage::disk('google')->url($audioPath);
                Music::where('id', $request['id'])->update([
                    'photo'         => $url1,
                    'title'         => $request['title'],
                    'artist'        => $request['artist'],
                    'audio'         => $url2,
                    'genre'         => $request['genre'],

                ]);
            } catch (\Exception $e) {
                throw new \Exception('Failed to update Music. '.$e->getMessage());
            }
        }
    }

    public function delete($id){
        try{
            Music::destroy($id);
        } catch (\Exception $e) {
            throw new \Exception('Failed to delete selected music. '.$e->getMessage());
        }
    }
}