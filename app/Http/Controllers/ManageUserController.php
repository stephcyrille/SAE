<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Profile;
use App\Service;



class Role{
    public $key;
    public $value;

    public function __construct($key, $val)
    {
        $this->key = $key;
        $this->value = $val;
    }
}

class ManageUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $profiles = Profile::all();

        // dd($profiles);
        $context = [
            'profiles' => $profiles,
        ];
        return view('manage_user.all', $context);
    }

    public function show($profile){
        $profile = Profile::where('id', $profile)->firstOrFail();

        $context = [
            'profile' => $profile,
        ];

        return view('manage_user.single', $context);
    }
    
    public function showSingle($profile){
        $profile = Profile::where('id', $profile)->firstOrFail();
        $services = Service::all();
        
        $archiviste = new Role('ARCHIVISTE', 'Archiviste');
        $chef_service = new Role('CHEF SERVICE', 'Chef Service');
        $employe = new Role('EMPLOYE', 'Employé');
        $admin = new Role('ADMIN', 'Administrateur du système');
        
        $roles = [
            $archiviste, $chef_service, $employe, $admin
        ];

        $context = [
            'profile' => $profile,
            'services' => $services,
            'roles' => $roles,
        ];

        return view('manage_user.show', $context);
    }


    public function edit($profile, Request $request){
        $profile = Profile::where('id', $profile)->firstOrFail();
        $services = Service::all();

        $archiviste = new Role('ARCHIVISTE', 'Archiviste');
        $chef_service = new Role('CHEF SERVICE', 'Chef Service');
        $employe = new Role('EMPLOYE', 'Employé');
        $admin = new Role('ADMIN', 'Administrateur du système');
        
        $roles = [
            $archiviste, $chef_service, $employe, $admin
        ];

        // dd($roles);
        $context = [
            'profile' => $profile,
            'services' => $services,
            'roles' => $roles,
        ];

        return view('manage_user.edit', $context);
    }

    public function update(Request $request, $profile)
    {
        $profile = Profile::where('id', $profile)->firstOrFail();

        if($request->file('visa_path')){
            $files = $request->file('visa_path');
            $file_name = $profile->username.'_'.time();
            $files->move(public_path('visa_path'), ($file_name.'.'.$request->file('visa_path')->getClientOriginalExtension()));
            $visa = '/visa_path/'.$file_name.'.'.$request->file('visa_path')->getClientOriginalExtension();
        } else {
            $visa = '';
        }
        

        $values = [
            'username' => $request->get('username'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'service_id' => $request->get('service_id'),
            'roles' => $request->get('roles'),
            'picture_path' => $visa
        ];

        // dd($values);

        $profile->update($values);
        
        return redirect('/manage/users/'. $profile->id .'/single');
    }

    public function userList($service){
        $user = Auth::user();
        $user_id = $user->id;
        $current_profile = Profile::where('user_id', $user_id)->firstOrFail();
        $profiles = Profile::where('service_id', $service)->get()->except([$current_profile->id]);

        echo json_encode($profiles);  
    }
}
