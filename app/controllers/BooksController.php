<?php

class BooksController extends \BaseController {


	static $rules = array();
	/**
	 * Display a listing of the resource.
	 * GET /books
	 *
	 * @return Response
	 */
	public function index()
	{
		//$books = Book::all();
		$books = Book::paginate(4);
		return View::make('dashboard.books.index',compact('books'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /books/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$authors = Author::all();
		$categories = Category::all();
		return View::make('dashboard.books.create',compact('authors','categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /books
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules =array(
			'title' 		=> 'required',
			'edition' 		=> 'required',
			'isbn'			=> 'required',
			'total_page'	=> 'required|integer',
			'price'			=> 'required|integer',
			'authors'		=> 'required',
			'category_id'	=> 'required|exists:categories,id',
			'image'			=> 'image',
		);

		$validator = Validator::make(Input::all(),$rules);
		$validator2 = BooksController::validate(Input::all());

		if($validator->fails()){
			 return Redirect::to('books/create')->withErrors($validator)->withInput();
		}else{
			$authors_id		= Input::get('authors');

			// Convert jadi integer
			foreach ($authors_id as $key => $value) {
				$authors_id[$key] = (int) $value;
			}
			//return "TODO : Create books + synchro with authr_book + Upload image";

			// Create book
			$book = Book::firstOrNew(array(
				'title'			=> Input::get('title'),
				'edition'		=> Input::get('edition'),
				'isbn'			=> Input::get('isbn'),
				'total_page'	=> Input::get('total_page'),
				'price'			=> Input::get('price'),
				'category_id'	=> Input::get('category_id'),
				'info'			=> Input::get('info'),
				'toc'			=> Input::get('toc')
			));

			// synchro with author book
			$book->save();
			$book->authors()->sync($authors_id);

			// upload image
			if(Input::hasFile('image')){
				// INI LAGI DICOBA:
				$file 				= Input::file('image');				
				$filename_format	= $book->id.'.'.$file->getClientOriginalExtension();
				$location			= public_path()."/uploads/books";
				$file->move($location,$filename_format);
				Image::make(sprintf($location.'/%s', $filename_format))->fit(600, 800)->save();
			}			


			Session::flash('message', 'Successfully created books!');
            return Redirect::to('books');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /books/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$book = Book::find($id);
		return View::make('dashboard.books.show',compact('book'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /books/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$authors 	= Author::all();
		$categories = Category::all();
		$book 		= Book::find($id);
		return View::make('dashboard.books.edit',compact('authors','categories','book'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /books/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules =array(
			'title' 		=> 'required',
			'edition' 		=> 'required',
			'isbn'			=> 'required',
			'total_page'	=> 'required|integer',
			'price'			=> 'required|integer',
			'authors'		=> 'required',
			'category_id'	=> 'required|exists:categories,id',
			'image'			=> 'image',
		);

		$validator = Validator::make(Input::all(),$rules);
		$validator2 = BooksController::validate(Input::all());

		if($validator->fails()){
			 return Redirect::to('books/create')->withErrors($validator)->withInput();
		}else{
			$authors_id		= Input::get('authors');

			// Convert jadi integer
			foreach ($authors_id as $key => $value) {
				$authors_id[$key] = (int) $value;
			}
			//return "TODO : Create books + synchro with authr_book + Upload image";

			// Create book
			$book = Book::find($id);
			
			$book->title		= Input::get('title');
			$book->edition		= Input::get('edition');
			$book->isbn			= Input::get('isbn');
			$book->total_page	= Input::get('total_page');
			$book->price		= Input::get('price');
			$book->category_id	= Input::get('category_id');
			$book->info			= Input::get('info');
			$book->toc			= Input::get('toc');
			

			// synchro with author book
			$book->save();
			$book->authors()->sync($authors_id);

			// upload image
			if(Input::hasFile('image')){
				// INI LAGI DICOBA:
				$file 				= Input::file('image');				
				$filename_format	= $book->id.'.'.$file->getClientOriginalExtension();
				$location			= public_path()."/uploads/books";
				$file->move($location,$filename_format);
				Image::make(sprintf($location.'/%s', $filename_format))->fit(600, 800)->save();
			}			


			Session::flash('message', 'Successfully edited the books!');
            return Redirect::to('books');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /books/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$book = Book::find($id);
        $book->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the book!');
        return Redirect::to('authors');
	}

	public static function validate($input = null) {
		if (is_null($input)) {
			$input = Input::all();
		}
		// We need to do this to not return an error when no tag is selected
		if (array_key_exists('authors', $input)) {
        	//Rules for multiple tag selection
			for ($i = 0; $i < count($input['authors']); $i++) {
				static::$rules["authors.{$i}"] = 'required|integer|exists:authors,id';
			}
		} else {
			static::$rules["authors"] = 'required|integer|exists:authors,id';
		}

		return Validator::make($input, static::$rules); 
	}

}