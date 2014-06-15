<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class FridgeFood extends Eloquent{

        public $timestamps = false;  //added by Reshma
        protected $fillable = ['Name'];

        // public static $rules = [
        //     'name' => 'required'
        // ];
        
        // public $messages;
       //  public $messages = array(
							//     'required' => 'Your :attribute is required.',
							// );
        /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'FridgeFood';
       protected $primaryKey = 'ID';
        /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
        
        public function setName($name){
       
	    	$this->Name = $name;
			
        }

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getName()
	{
		return $this->Name;
	}
	

    // public function isValid() {
    //     $validation = Validator::make(Input::all(),static::$rules);
    //     if($validation->passes())
    //     {
    //         return true;
    //     }
    //     $this->messages = $validation->messages();

    //     return false;
        
    // }
}
