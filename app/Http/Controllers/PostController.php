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

use App\Post;
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

    	/*Truncate data before */

    	Post::truncate();

    	if ($request->eager_loaded == 'true') {

    		$user = User::with('posts')->find(Auth::id());

    		/*This will fake the number of records requested and returns array of array of objects*/
    		$posts = factory(Post::class, (int)$request->number_of_posts)->make();

    		/*You can see the data structure here with the dd() function*/
    		// dd($posts);

    		$user->posts()->saveMany($posts);

    	} elseif ($request->eager_loaded == 'false') {

    		factory(Post::class, (int)$request->number_of_posts)->create([
    		    'user_id' => Auth::id(),
    		]);

    		/*Equivalence of the above code*/

    		/*
    			for ($i=0; $i < (int)$request->number_of_posts; $i++) { 

	    			Post::create([
	    				'user_id' 		=> Auth::id(),
	    				'title'			=> 'Some title',
	    				'description'	=> 'Some description'
	    			]);

    			}
    		*/

    	}

    	return redirect()
    			->back()
    			->with(
    				'alert-faking-record', 
    				number_format((int)$request->number_of_posts) .' post(s) faked successfully ...'
    			);

    }

    /*Query all logged in user posts*/

    public function queryPosts(Request $request)
    {

    	if ($request->eager_loaded == 'true') {

    		/*Eager load posts relation of user model*/
    		$user = User::with('posts')->find(Auth::id());

    		$posts = $user->posts;

    	} elseif ($request->eager_loaded == 'false') {

    		/*Find user model without eager loading posts relationship*/
    		$user = User::find(Auth::id());

    		$posts = $user->posts;

    	}

    	return redirect()
    			->back()
    			->with(
    				'alert-quering-record', 
    				'Data queried successfully '. ($request->eager_loaded == 'true' ? ' with eager loading ' : ' without eager loading ')
    			)->with('data',$posts);

    }

    /*Delete all logged in user posts*/

    public function deletePosts(Request $request)
    {

    	if ($request->eager_loaded == 'true') {

    		/*Eager load posts relation of user model*/
    		$user = User::with('posts')->find(Auth::id());

    		$user->posts()->delete();

    	} elseif ($request->eager_loaded == 'false') {

    		/*Find user model without eager loading posts relationship*/
    		$user = User::find(Auth::id());

    		$user->posts()->delete();

    	}

    	return redirect()
    			->back()
    			->with(
    				'alert-deleting-record', 
    				'Data deleted successfully '. ($request->eager_loaded == 'true' ? ' with eager loading ' : ' without eager loading ')
    			);

    } 

    /*Update all logged in user posts*/

    public function updatePosts(Request $request)
    {

    	if ($request->eager_loaded == 'true') {

    		/*Eager load posts relation of user model*/
    		$user = User::with('posts')->find(Auth::id());

    		$user->posts()->update([
    			'description'	=> 'Updated with eager loading'
    		]);

    	} elseif ($request->eager_loaded == 'false') {

    		/*Find user model without eager loading posts relationship*/
    		$user = User::find(Auth::id());

    		$user->posts()->update([
    			'description'	=> 'Updated without eager loading'
    		]);

    	}

    	return redirect()
    			->back()
    			->with(
    				'alert-updating-record', 
    				'Data updated successfully '. ($request->eager_loaded == 'true' ? ' with eager loading ' : ' without eager loading ')
    			);

    } 

}
