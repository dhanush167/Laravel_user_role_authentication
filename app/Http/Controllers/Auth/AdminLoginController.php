<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;



class AdminLoginController extends Controller

{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/premium';

    /**
     * Create a new controller instance.
     *
     * @return void
     */




    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }



    public function showLoginForm()

    {

        return view('auth.adminLogin');

    }


    public function login(Request $request)

    {

        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return  view('premium');

        }



        return back()->withErrors(['email' => 'Email or password are wrong.']);

    }



}