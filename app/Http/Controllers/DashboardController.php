<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
class DashboardController extends Controller
{
    public function index()
    {
    	$siswa = Siswa::all();
    	$siswa->map(function($s){
    		$s->test = $s->test();
    		return $s;
    	});
    	$siswa =$siswa->sortByDesc('test')->take(5);
    return view('dashboards.index',['siswa' => $siswa]);
}

}
