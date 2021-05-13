<?php

/**
 * ProfileController
 *
 * @author      Obua Emmanuel <eobua6882@gmail.com>
 * @copyright   2021 Obua Emmanuel
 * @link        http://www.emmanuelobua.me
 * @version     1.0.0
 *
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Auth;

class ProfileController extends Controller
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

    public function index()
    {

    	$user = User::find(Auth::id());

    	/*
    		Eager load profile relationship using tht with() function for faster loading
    		$user = User::with('profile')->find(Auth::id());
    	*/

    	return view('profile', compact('user'));

    }   

}
