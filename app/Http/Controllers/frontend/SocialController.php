<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\Models\UserModel;

class SocialController extends Controller
{
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }
    
    public function callback($provider){
            
        $getInfo = Socialite::driver($provider)->user();
        
        $user = $this->createUser($getInfo,$provider);
    
        auth()->login($user);
    
        return redirect('customer/profile')->with('msgSuccess', 'Đăng nhập thành công');
    
    }

    function createUser($getInfo,$provider){
    
    $user = UserModel::where('provider_id', $getInfo->id)->first();
    
        if (!$user) {
            $user = UserModel::create([
                'user_name'     => $getInfo->name,
                'user_email'    => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id,
                'role_id' => 3
            ]);
        }
        return $user;
    }
}
