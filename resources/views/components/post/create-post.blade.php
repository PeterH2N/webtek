<div class="border p-8 space-y-2 flex flex-col">
    <p class="text-2xl self-center">Make new post</p>
    <hr>
    <form wire:submit="save">
        @csrf
        <input class="w-full text-xl border-transparent focus:border-transparent focus:ring-0" required type="text" placeholder="Title..." wire:model="title">
        <textarea class="w-full border-transparent focus:border-transparent focus:ring-0 resize-none" maxlength="256" rows="4" required placeholder="Your thoughts..." wire:model="content"></textarea>
        <div class="flex">
            <button type="button" class="text-gray-500 hover:underline hover:text-black" wire:click="cancel"> Cancel </button>
            <button type="submit" class="ml-auto border rounded-xl py-1 px-3 hover:underline">Post</button>
        </div>
    </form>

</div>
