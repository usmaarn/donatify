

<div class="space-y-1">
    <label for="{{ $attributes['id'] }}" class="block uppercase text-[13px] tracking-wider text-zinc-600 font-medium">
        {{ $attributes['label'] }}
    </label>
    <input {{ $attributes }} class="w-full border border-zinc-300 py-2 rounded file:mr-4 file:py-2 file:px-4
      file:rounded-full file:border-0
      file:text-sm file:font-semibold
      file:bg-violet-50 file:text-violet-700
      hover:file:bg-violet-100" />
    @error($attributes['id'])
        <span class="input-error text-sm text-red-400 font-medium">
            {{ $message }}
        </span>
    @enderror
</div>
