<?php

class AuthorsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /authors
	 *
	 * @return Response
	 */
	public function index()
	{
		return "Displaying all authors";
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /authors/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return "Adding author";
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /authors
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /authors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return "Showing author with id : ".$id;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /authors/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return "Editing author with id : ".$id;
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /authors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /authors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}