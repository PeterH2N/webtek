<div class="flex flex-col border p-10">
    <form method="post" action="{{route('login.store')}}">
        @csrf
        <div class="flex flex-col space-y-2">
            <div class="flex self-center mb-4">
                <x-bx-paperclip class="size-9 self-center rotate-[135deg]"/>
                <p class="text-4xl">Login</p>
            </div>

                <label>Email</label>
                <input name="email" class="p-1 w-full" type="text" wire:model="username"/>
                <label>Password</label>
                <input name="password" class="p-1 w-full" type="password" wire:model="password"/>


        </div>
        <div class="flex mt-4">
            <a href="/register" class="text-gray-500 hover:underline hover:text-black">Register</a>
            <button type="submit" class="ml-auto border rounded-xl py-1 px-3 hover:underline">Log in</button>
        </div>
    </form>


</div>
