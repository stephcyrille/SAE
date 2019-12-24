<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fichier;


class FileController extends Controller
{
    public function list()
    {
        $fichiers = Fichier::all();
        
        $context = [
            'fichiers'=> $fichiers
        ];

        return view('files.all', $context);
    }
    
    public function add()
    {

        $context = [
        ];

        return view('files.add', $context);
    }
    
    public function postService(Request $request)
    {
        request()->validate([
            'nom' => 'required|min:3',
            'description' => 'required',
            'type'=> 'required',
            'piece'=> 'required|max:20024',
        ]); 

        
   
        $file = $request->file('piece');

        if($request->get('type')==='Audio'){
            $file_name = 'AUDIO-'.time(); 
            $path = '/medias/audios/'.$file_name.'.'.$request->file('piece')->getClientOriginalExtension();
            $file->move(public_path('medias/audios'), ($file_name.'.'.$request->file('piece')->getClientOriginalExtension()));
            // dd($path);
        }   
        else if($request->get('type')==='Compresse'){
            $file_name = 'COMPRESSE-'.time(); 
            $path = '/medias/compresses/'.$file_name.'.'.$request->file('piece')->getClientOriginalExtension();
            $file->move(public_path('medias/compresses'), ($file_name.'.'.$request->file('piece')->getClientOriginalExtension()));
            // dd($path);
        }   
        else if($request->get('type')==='Document'){
            $file_name = 'DOCUMENT-'.time(); 
            $path = '/medias/documents/'.$file_name.'.'.$request->file('piece')->getClientOriginalExtension();
            $file->move(public_path('medias/documents'), ($file_name.'.'.$request->file('piece')->getClientOriginalExtension()));
            // dd($path);
        }   
        else if($request->get('type')==='Executable'){
            $file_name = 'EXECUTABLE-'.time(); 
            $path = '/medias/executables/'.$file_name.'.'.$request->file('piece')->getClientOriginalExtension();
            $file->move(public_path('medias/executables'), ($file_name.'.'.$request->file('piece')->getClientOriginalExtension()));
            // dd($path);
        }   
        else if($request->get('type')==='Image'){
            $file_name = 'IMAGE-'.time(); 
            $path = '/medias/images/'.$file_name.'.'.$request->file('piece')->getClientOriginalExtension();
            $file->move(public_path('medias/images'), ($file_name.'.'.$request->file('piece')->getClientOriginalExtension()));
            // dd($path);
        }   
        else if($request->get('type')==='Video'){
            $file_name = 'MOVIE-'.time(); 
            $path = '/medias/movies/'.$file_name.'.'.$request->file('piece')->getClientOriginalExtension();
            $file->move(public_path('medias/movies'), ($file_name.'.'.$request->file('piece')->getClientOriginalExtension()));
            // dd($path);
        }   
        $value = [
            'nom' => $request->get('nom'),
            'description' => $request->get('description'),
            'type' => $request->get('type'),
            'format' => $request->file('piece')->getClientOriginalExtension(),
            'localisation' => $path,
        ];
        
        Fichier::create($value);

        return redirect()->route('all_files');
    }
}
