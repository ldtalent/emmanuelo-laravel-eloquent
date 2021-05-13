<?php

/**
 * PostController
 *
 * @author      Obua Emmanuel <eobua6882@gmail.com>
 * @copyright   2021 Obua Emmanuel
 * @link        http://www.emmanuelobua.me
 * @version     1.0.0
 *
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

use App\User;

use Auth;

class PostController extends Controller
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

    /*Fake a user's posts with the specified number ... */
    public function fakePosts(Request $request)
    {

    	Artisan::call('fake:records', ['model' => 'Post', 'number' => (int)$request->number_of_posts]);

    	return redirect()->back()->with('alert-faking-record', number_format((int)$request->number_of_posts) .' post(s) faked successfully ...');

    }


}
