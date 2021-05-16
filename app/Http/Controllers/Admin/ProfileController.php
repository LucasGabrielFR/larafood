<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function update(){

    }

    public function edit(){

    }

    public function destroy(){

    }

    public function store(Request $request){
        $this->repository->create($request->all());

        return redirect()->route('profiles.index');
    }
}
