

<div class="space-y-1">
    <label for="{{ $attributes['id'] }}" class="block uppercase text-[13px] tracking-wider text-zinc-600 font-medium">
        {{ $attributes['label'] }}
    </label>
    <textarea {{ $attributes }} class="w-full border-0 outline outline-zinc-300 py-3 rounded-lg">{{ $attributes['value'] }}</textarea>
    @error($attributes['id'])
    <span class="input-error text-sm text-red-400 font-medium">
            {{ $message }}
        </span>
    @enderror
</div>
