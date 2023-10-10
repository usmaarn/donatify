
<div class="max-w-3xl w-full mx-auto my-16 p-5 bg-white shadow rounded-lg">
    <h1 class="text-2xl font-medium">Create Donation</h1>

    <form wire:submit="create" class="mt-5 grid grid-cols-1 gap-5">
        @if ($thumbnail)
            <img src="{{ $thumbnail->temporaryUrl() }}">
        @endif
        <x-form.input id="title" wire:model="title" label="campaign title"  />
        <x-form.textarea id="summary" wire:model="summary" label="summary" rows="4" />
        <x-form.textarea id="description" wire:model="description" label="Full Description" rows="10" />
        <x-form.input type="file" label="thumbnail" id="thumbnail" wire:model="thumbnail" />
        <x-form.input label="target" id="target" wire:model="target" />
        <button class="bg-green-500 p-4 rounded-lg text-white uppercase">Create campaign</button>
    </form>
</div>
