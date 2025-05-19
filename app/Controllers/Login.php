<?php namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    protected $session; // session variable
    protected $rules; // rules for validation
    protected $userModel; // user model

    public function __construct()
    {
        helper(['form']); // load form helper
        $this->session = session(); // load session
        $this->userModel = new UserModel(); // load the UserModel

        $this->rules = [ // rules for validation
            'username' => 'required',
            'password' => 'required'
        ];
    }

    public function index()
    {
        // check if the user is already logged in
        if ($this->session->get('logged_in')) { 
            // redirect to the student record page
            return redirect()->to(site_url('StudentRecord')); 
        }

        // if not logged in, show the login page
        return view('login'); 
    }

    public function auth()
    {
        // check if the submitted data passes validation
        if (!$this->validate($this->rules)) {   
            // if fails redirect to login page with error message
            return redirect()->to(site_url('Login'))
                ->with('error', 'All fields are required.'); 
        }

        $username = $this->request->getPost('username'); // get the username from the form
        $password = $this->request->getPost('password'); // get the password from the form

        // find the user in the database
        $user = $this->userModel->where('Username', $username)->first(); 
        
        // check if the user exists and the password is correct
        if ($user && $user['Password'] === $password) { 
            // set session data
            $this->session->set('logged_in', true); 
            $this->session->set('username', $user['Username']);

            // redirect to the student record page
            return redirect()->to(site_url('StudentRecord'));
        } else {
            // if the user does not exist or the password is incorrect
            return redirect()->to(site_url('Login'))->with('error', 'Invalid username or password'); // redirect to login page with error message
        }
    }

    public function logout()
    {
        session()->destroy(); // destroy the session
        return redirect()->to(site_url('Login')); // redirect to login page
    }
}
