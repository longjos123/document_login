<?php

namespace App\Http\Controllers;

use App\Constants\UserConstant;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo, $provider);
        Auth::login($user);

        return redirect()->to('/home');
    }
    protected function createUser($getInfo, $provider)
    {
        $user = $this->userRepository->getDetail([UserConstant::INPUT_PROVIDER_ID => $getInfo->id])->first();

        $input = [
            UserConstant::INPUT_NAME => $getInfo->name,
            UserConstant::INPUT_EMAIL => $getInfo->email,
            UserConstant::INPUT_PROVIDER => $provider,
            UserConstant::INPUT_PROVIDER_ID => $getInfo->id
        ];

        if (!$user) {
            $user = $this->userRepository->create($input);
        }

        return $user;
    }
}
