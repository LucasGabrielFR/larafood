<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan){
        $this->repository = $plan;
    }

    public function index(){
        $plans = $this->repository->all();

        return view('admin.pages.plans.index',
        [
            'plans'=>$plans
        ]);
    }

    public function create(){
        $plans = $this->repository->all();

        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request){

        $this->repository->create($request->all());

        return redirect()->route('plans.index');
    }

    public function update(StoreUpdatePlan $request, $url){
        $plan = $this->repository->where('url',$url)->first();

        if(!$plan){
            return redirect()->back();
        }else{
            $plan->update($request->all());
            return redirect()->route('plans.index');
        }
    }

    public function show($url){
        $plan = $this->repository->where('url',$url)->first();

        if(!$plan){
            return redirect()->back();
        }else{
            return view('admin.pages.plans.show',[
                'plan' => $plan
            ]);
        }
    }

    public function edit($url){
        $plan = $this->repository->where('url',$url)->first();

        if(!$plan){
            return redirect()->back();
        }else{
            return view('admin.pages.plans.edit',[
                'plan' => $plan
            ]);
        }
    }

    public function destroy($url){
        $plan = $this->repository->where('url',$url)->first();

        if(!$plan){
            return redirect()->back();
        }else{
            $plan->delete();

            return redirect()->route('plans.index');
        }
    }
}
