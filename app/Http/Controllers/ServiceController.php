<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;


class ServiceController extends Controller
{
    public function list()
    {
        $services = Service::all();
        
        $context = [
            'services'=> $services
        ];

        return view('service.all', $context);
    }
    
    public function add()
    {
        $profiles = User::all();

        $context = [
            'profiles' => $profiles
        ];

        return view('service.add', $context);
    }
    
    public function postService()
    {
        $data = request()->validate([
            'nom' => 'required|min:3',
            'acronyme' => 'required',
            'responsable_id'=> 'required',
        ]); 
        
        Service::create($data);

        return redirect()->route('all_services');
    }
}
