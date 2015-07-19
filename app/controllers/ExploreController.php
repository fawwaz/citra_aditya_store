<?php

class ExploreController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /explore
	 *
	 * @return Response
	 */
	public function index()
	{
		return "test";
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /explore/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /explore
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /explore/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /explore/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /explore/{id}
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
	 * DELETE /explore/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function byCategory($categoryid){
		$books = Book::where('category_id','=',$categoryid)->get();
		return View::make('front.explore.category',compact('books'));
	}


	public function byAuthor($authorid){
		$authors = Author::find($authorid);
		return View::make('front.explore.author',compact('authors'));
	}

	public function bySearch($keyword){
		//Better kalau ada key dan keyword
		return "Search result here";
	}
}