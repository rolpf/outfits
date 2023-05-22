<label class="w-full h-full p-8" x-data="ImagePreview({{ $attributes->get('image') ?? null }})" for="{{ $attributes->get('name') ?? 'image' }}">
    <input @change="handleFileChange" class="hidden" id="{{ $attributes->get('name') ?? 'image' }}" type="file" name="{{ $attributes->get('name') ?? 'image' }}">
    <div class="w-full max-h-96">
        <template x-if="previewImage">
            <img :src="previewImage" class="w-full h-full object-contain">
        </template>
    </div>
    @error($attributes->get('name') ?? 'image')
        <p class="text-red-500">{{ $message }}</p>
    @enderror
</label>
