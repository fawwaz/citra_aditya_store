<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::check()) return Redirect::to('user');
		
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{
		$attempt = Auth::attempt(Input::only('email','password'));
		
		if($attempt) {
			return Redirect::to('user');
		} else {
			return Redirect::back()->withInput();
		}
	}


	/**
	 * Remove the specified resource from storage.
	 * DELETE /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		Session::flush();
		return Redirect::to('login');
	}

}