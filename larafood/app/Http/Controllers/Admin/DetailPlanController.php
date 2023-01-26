<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    /**
     * @param $repository
     */
    public function __construct(DetailPlan $repository, Plan $plan)
    {
        $this->repository = $repository;
        $this->plan = $plan;
    }

    public function index($urlPlan)
    {

    }

}
