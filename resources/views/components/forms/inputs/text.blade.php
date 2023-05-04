<div {{ $attributes->only('class') }}>
    <label class="form-label" for="{{ $id }}">{{ $label }}</label>
    <input class="form-control" name="{{ $name }}" id="{{ $id }}" type="text" value="{{ $value }}">
    @error($name)<div class="form-text">{{ $message }}</div>@enderror
</div>