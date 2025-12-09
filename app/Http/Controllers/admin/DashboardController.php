<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $totalUsers = User::count();
        $totalJobs = Job::count();
        $totalApplicants = JobApplication::count();

        return view('admin.dashboard', compact('totalUsers', 'totalApplicants', 'totalJobs'));
    }
}
