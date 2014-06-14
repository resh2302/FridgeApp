<?php

class RefrigeratorsController extends \BaseController {

	protected $refrigerator;


    public function __construct(Refrigerator $refrigerator) 
    {
       $this->refrigerator = $refrigerator;

    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($RefrigeratorID)
	{
		$refrigerator = Refrigerator::find($RefrigeratorID);
		$fridgeID = $refrigerator->FridgeID;
		// $fridgeFood = FridgeFood::find($fridgeID);
		$fridgeFood = FridgeFood::where('FridgeID','=', $fridgeID)->get();
		$data = array(
			'refrigerator' => $refrigerator,
			'fridgeFood' => $fridgeFood
			);
        return View::make('refrigerators.show', [ 'data' => $data]);
        // return View::make('refrigerators.show',['refrigerator'=>$refrigerator])->with('fridgeFood',FridgeFood::find($fridgeID));
	}


	/**
	 * Show the form for editing the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
