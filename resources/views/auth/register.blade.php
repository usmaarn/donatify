
<x-slot:title> Register - Donatify</x-slot:title>

<div class="max-w-[400px] mx-auto my-16 shadow p-5 bg-white">
    <h1 class="text-3xl font-bold mb-5">Register</h1>
    <form wire:submit="submit" class="space-y-5">

        <x-form.input label="full name" id="name" wire:model="name" placeholder="full name" />
        <x-form.input label="email address" id="email" wire:model="email" placeholder="email address" />
        <x-form.input type="password" label="password" id="password" wire:model="password" placeholder="password" />
        <x-form.input label="confirm password" id="password_confirmation"
                      wire:model="password_confirmation" placeholder="confirm password" />

        <x-form.button text="Register" />
    </form>
</div>
