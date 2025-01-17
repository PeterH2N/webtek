<?php

namespace App\Livewire;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LoginController;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Url;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    #[Url]
    public bool $remember = false;

    public array $errors = [];


    /**
     * @throws BindingResolutionException
     */

    /**
     * @throws BindingResolutionException
     */
    public function submit(): void
    {
        //$this->validate();

        if (Auth::validate(['email' => $this->email, 'password' => $this->password])) {

            $loginRequest = App::make(LoginRequest::class, ['email' => $this->email, 'password' => $this->password, 'remember' => $this->remember, '_token' => csrf_token()]);

            $loginRequest->authenticate();

            App::make(AuthenticatedSessionController::class)->store($loginRequest);
        } else {
            $this->errors['email'] = 'email or password is incorrect';
        }

    }

    public function render()
    {
        return view('components.login.login');
    }
}
