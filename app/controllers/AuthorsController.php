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
		$authors = Author::all();
		return View::make('dashboard.authors.index',compact('authors'));
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
		$rules =array(
			'name' => 'required'
		);

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()){
			 return Redirect::to('authors')->withErrors($validator)->withInput();
		}else{

			Author::firstOrCreate(array(
				'name' 		=> Input::get('name'),
				'history' 	=> Input::get('history'),
				'contact' 	=> Input::get('contact')
			));

			Session::flash('message', 'Successfully created author!');
            return Redirect::to('authors');
		}
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
		$author = Author::find($id);
		return View::make('dashboard.authors.show',compact('author'));
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
		$author = Author::find($id);
		return View::make('dashboard.authors.edit',compact('author'));
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
		$rules =array(
			'name' => 'required'
		);

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()){
			 return Redirect::to('authors')->withErrors($validator)->withInput();
		}else{

			$author= Author::find($id);
			$author->name 		=Input::get('name');
			$author->history	=Input::get('history');
			$author->contact 	=Input::get('contact');
			$author->save();

			Session::flash('message', 'Successfully updated author!');
            return Redirect::to('authors');
		}
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
		$author = Author::find($id);
        $author->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the author!');
        return Redirect::to('authors');
	}

}