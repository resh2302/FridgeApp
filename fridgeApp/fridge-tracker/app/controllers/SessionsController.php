<?php


class SessionsController extends \BaseController {

	protected $user;


    public function __construct(User $user) 
    {
       $this->user = $user;
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
            if(Auth::check())
            {
                return Redirect::to('/admin');
            }
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            
                $credentials = array('email' => Input::get('login_email'), 'password' => Input::get('login_password'));
                // validation
				// $input = Input::only('login_email','login_password');

    //             if(! $this->user->fill($input)->isValid())
		  //       {
		  //           return Redirect::back()->withInput()->withErrors($this->user->messages);
		  //       }

                if (Auth::attempt($credentials))       
                {
                    return "Finally!!!";
                }
                else{
                    return "Failed!";
                }
                
           
	}


	/**
	 * Display the specified resource.
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
	public function destroy()
	{
		Auth::logout();
                
        return Redirect::route('login');
	}


}
