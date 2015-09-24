<?php

class CartsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /cart
	 *
	 * @return Response
	 */
	public function index()
	{
		$cart_contents = Cart::content();
		return View::make('front.cart.index',compact('cart_contents'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /cart/create
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /cart
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules =array(
			'id' => 'required',
			'quantity' => 'required|min:1',
		);

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()){
			 //return Redirect::back()->withErrors($validator)->withInput();
			return "Harusnya redirect back dan kasih tau minimal jumlah order 1, harus positif bukan nol apalagi negatif";
		}else{
			// Bagusnya validasi dulu dsiini
			$book = Book::find(Input::get('id'));
			//return $book->id.' name : '.$book->title.' quantity '.Input::get('quantity').' price : '.$book->price;
			Cart::add($book->id,$book->title,Input::get('quantity'),$book->price);
			// kasih tau bahwa item sudah ditambahkan
		}
	}

	/**
	 * Display the specified resource.
	 * GET /cart/{id}
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
	 * GET /cart/{id}/edit
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
	 * PUT /cart/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{		
		$qty = Input::get('quantity');
		$z = "";
		foreach ($qty as $q=>$v) {
			Cart::update($q,$v);
			//$z .= $q . " : ". $v;
		}

		$cart_contents = Cart::content();

		Session::flash('message', 'Successfully updated books!');
		//return View::make('front.cart.index',compact('cart_contents','z'));
		return Redirect::to('carts');
		//return "Done changed".var_dump(Input::get('quantity'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /cart/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}