<?php namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login'); 
    }

    public function auth()
{
    helper(['form']);   // form helper

    $rules = [ // rules for validation
        'username' => 'required',
        'password' => 'required'
    ];

    if (!$this->validate($rules)) {   // validate the form
        return redirect()->to(site_url('Login'))
                         ->with('error', 'All fields are required.'); // redirect to login page with error message
    }

    $model = new UserModel(); // load the UserModel
    $session = session(); // load the session

    $username = $this->request->getPost('username'); // get the username from the form
    $password = $this->request->getPost('password'); // get the password from the form

    $user = $model->where('Username', $username)->first(); // find the user in the database

    if ($user && $user['Password'] === $password) { // check if the user exists and the password is correct
        $session->set('logged_in', true); 
        $session->set('username', $user['Username']); //set the session data 
        return redirect()->to(site_url('StudentRecord'));// redirect to the dashboard
    } else {
        return redirect()->to(site_url('Login'))->with('error', 'Invalid username or password'); // redirect to login page with error message
    }
}


    public function dashboard()
    {
        $session = session();
        if (!$session->get('logged_in')) { // check if the user is logged in
            return redirect()->to(site_url('Login')); // redirect to login page if not logged in
        }

        return view('dashboard'); // your dashboard view file
    }

    public function logout()
    {
        session()->destroy(); // destroy the session
        return redirect()->to(site_url('Login')); // redirect to login page
    }
}
