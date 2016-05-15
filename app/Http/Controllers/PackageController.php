<?php

namespace App\Http\Controllers;
use App\Domain\Entities\Package;
use App\Domain\Repositories\PackageRepository as Packages;
use Illuminate\Http\Request;

use App\Http\Requests;

class PackageController extends Controller
{
    public function index(Packages $packages){
        $packages = $packages->typeAll('medium');
        return view('packages',[
            'packages'=>$packages
            ]);
    }
    public function low(Packages $packages){
         $packages = $packages->typeAll('low');
        return view('packages',[
            'packages'=>$packages
            ]);
    }
    public function high(Packages $packages){
         $packages = $packages->typeAll('high');
        return view('packages',[
            'packages'=>$packages
            ]);
    }
    public function test(Packages $packages){
         $packages = $packages->typeAll('test');
        return view('packages',[
            'packages'=>$packages
            ]);
    }
}
