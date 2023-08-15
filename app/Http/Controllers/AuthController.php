<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequestForm;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Constants\UserConstant;
use App\Repositories\UserRepository;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * View homepage
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('home');
    }

    /**
     * View login
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function viewLogin()
    {
        return view('login');
    }

    /**
     * Submit login
     *
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request)
    {
        //Get data input client
        $credentials = $request->only(UserConstant::INPUT_EMAIL, UserConstant::INPUT_PASSWORD);

        //Check user and password matches with db
        if (Auth::attempt($credentials)) {
            return redirect(route('homepage'));
        }

        return redirect(route('login'))->withSuccess('Email or password is incorrect!');
    }

    /**
     * Redirect to provider login screen
     *
     * @param $provider
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Get info user provider
     *
     * @param $provider
     * @return RedirectResponse
     */
    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo, $provider);
        Auth::login($user);

        return redirect()->route('homepage');
    }

    /**
     * Create user from provider info
     *
     * @param $getInfo
     * @param $provider
     * @return Builder|Model|mixed|object|null
     */
    protected function createUser($getInfo, $provider)
    {
        //Get user from provider id
        $user = $this->userRepository->getDetail([UserConstant::INPUT_PROVIDER_ID => $getInfo->id])->first();
        try {
            $input = [
                UserConstant::INPUT_NAME => is_null($getInfo->name) ? $getInfo->nickname : '',
                UserConstant::INPUT_EMAIL => $getInfo->email,
                UserConstant::INPUT_PASSWORD => encrypt('gitpwd059'),
                UserConstant::INPUT_PROVIDER => $provider,
                UserConstant::INPUT_PROVIDER_ID => $getInfo->id
            ];

            //If the user does not exist, create new user
            if (!$user) {
                $user = $this->userRepository->create($input);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return $user;
    }

    /**
     * View register
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function viewRegister()
    {
        return view('register');
    }

    /**
     * Post register
     *
     * @param RegisterRequestForm $request
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function register(RegisterRequestForm $request)
    {
        try {
            $input = $request->only(
                UserConstant::INPUT_NAME,
                UserConstant::INPUT_EMAIL,
                UserConstant::INPUT_GENDER,
                UserConstant::INPUT_PHONE
            );

            $input[UserConstant::INPUT_PASSWORD] = Hash::make($request->password);
            $result = $this->userRepository->create($input);
        } catch (\Exception $exception) {
            Log::error('Create user: ' . $exception);
        }

        if ($result) {
            return redirect(route('login'));
        } else {
            return back()->with('Register failed!');
        }
    }

    /**
     * Logout
     *
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function logout()
    {
        Auth::logout();

        return redirect(route('login'));
    }
}
