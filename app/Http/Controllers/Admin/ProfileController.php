<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    protected $repository;

    public function __construct(Profile $profile){
        $this->repository = $profile;
    }

    public function index(){
        $profiles = $this->repository->all();

        return view('admin.pages.profiles.index',compact('profiles'));
    }

    public function show($id){
        $profile = $this->repository->where('id',$id)->first();

        if(!$profile){
            return redirect()->back();
        }else{
            return view('admin.pages.profiles.show',[
                'profile' => $profile
            ]);
        }
    }

    public function create(){
        $profiles = $this->repository->all();

        return view('admin.pages.profiles.create');
    }

    public function store(StoreUpdateProfile $request){
        $this->repository->create($request->all());

        return redirect()->route('profiles.index');
    }

    public function update(StoreUpdateProfile $request, $id){
        $profile = $this->repository->where('id',$id)->first();

        if(!$profile){
            return redirect()->back();
        }else{
            $profile->update($request->all());
            return redirect()->route('profiles.index');
        }
    }

    public function edit($id){
        $profile = $this->repository->where('id',$id)->first();

        if(!$profile){
            return redirect()->back();
        }else{
            return view('admin.pages.profiles.edit',[
                'profile' => $profile
            ]);
        }
    }

    public function destroy($id){
        $profile = $this->repository->where('id',$id)->first();

        if(!$profile){
            return redirect()->back();
        }else{
            $profile->delete();

            return redirect()->route('profiles.index');
        }
    }

}
