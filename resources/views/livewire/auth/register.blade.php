<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $phone = '';
    public string $address = '';
    public string $category = 'Student'; // Default category

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:15'],
            'address' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'in:Student,Teacher,Others'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input
            wire:model="name"
            :label="__('Name')"
            type="text"
            required
            autofocus
            autocomplete="name"
            :placeholder="__('Full name')"
        />

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com"
            />
            
            <!-- Password -->
            <flux:input
            wire:model="password"
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Password')"
            viewable
            />
            
        <!-- Confirm Password -->
        <flux:input
        wire:model="password_confirmation"
        :label="__('Confirm password')"
        type="password"
        required
        autocomplete="new-password"
        :placeholder="__('Confirm password')"
        viewable
        />
        
        <!-- Category -->
        <div class="mt-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">{{ __('Category') }}</label>
                    <select id="category" wire:model="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="Student">{{ __('Student') }}</option>
                        <option value="Teacher">{{ __('Teacher') }}</option>
                        <option value="Others">{{ __('Others') }}</option>
                    </select>
                    @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
        
        <!-- Phone -->
        <flux:input
        wire:model="phone"
        :label="__('Phone')"
            type="text"
            required
            autocomplete="tel"
            :placeholder="__('Phone number')"
        />
        @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <!-- Address -->
        <flux:input
            wire:model="address"
            :label="__('Address')"
            type="text"
            required
            autocomplete="street-address"
            :placeholder="__('Your Address')"
        />
        @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        <span>{{ __('Already have an account?') }}</span>
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>
