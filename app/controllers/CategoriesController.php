<?php

class CategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /categories
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::all();
		return View::make('dashboard.categories.index',compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /categories/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('dashboard.categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /categories
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules =array(
			'name' => 'required',
			'desc' => 'required'
		);

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()){
			 return Redirect::to('categories')->withErrors($validator)->withInput();
		}else{
			$category = new Category;
			$category->name = Input::get('name');
			$category->desc = Input::get('desc');
			$category->save();

			Session::flash('message', 'Successfully created category!');
            return Redirect::to('categories');
		}

	}

	/**
	 * Display the specified resource.
	 * GET /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('dashboard.categories.show')->with('id',$id);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /categories/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::find($id);
		return View::make('dashboard.categories.edit')->with('id',$id)->with('category',$category);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules =array(
			'name' => 'required',
			'desc' => 'required'
		);

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()){
			 return Redirect::to('categories')->withErrors($validator)->withInput();
		}else{
			$category 		= Category::find($id);
			$category->name = Input::get('name');
			$category->desc = Input::get('desc');
			$category->save();

			Session::flash('message', 'Successfully <b>updated</b> category!');
            return Redirect::to('categories');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = Category::find($id);
        $category->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the categories!');
        return Redirect::to('categories');
	}

}