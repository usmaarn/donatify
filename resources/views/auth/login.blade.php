
<x-slot:title> Login - Donatify</x-slot:title>

<div class="max-w-[400px] mx-auto my-16 shadow p-5 bg-white">
    <h1 class="text-3xl font-bold mb-5">Login</h1>
    <form wire:submit="login" class="space-y-5">
        @error('wrong_details') <span class="text-red-500">{{$message}}</span> @enderror
        <x-form.input label="email address" id="email" wire:model="email" placeholder="email address" />
        <x-form.input type="password" label="password" id="password" wire:model="password" placeholder="password" />
        <x-form.button text="Login" />
    </form>
</div>
