<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

        public $timestamps = false;  //added by Reshma
        protected $fillable = ['email', 'password', 'password_confirmation', 'remember_token'];

        public static $rules = [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|Between:4,8|confirmed',
            'password_confirmation' => 'required|Between:4,8',
            // 'login_email' => 'required|email',
            // 'login_password' => 'required'
        ];
        
        public $messages;
       //  public $messages = array(
							//     'required' => 'Your :attribute is required.',
							// );
        /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
//        protected $primaryKey = 'id';
        /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        public function setPasswordAttribute($pass){
       
	    	$this->attributes['password'] = Hash::make($pass);
			
        }

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->attributes['remember_token'] = $value; //renamed by me to token
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

    public function isValid() {
        $validation = Validator::make(Input::all(),static::$rules);
        // dd($validation);
        if($validation->passes())
        {
            return true;
        }
        // dd('validation failed');
        $this->messages = $validation->messages();

        return false;
        
    }
}
