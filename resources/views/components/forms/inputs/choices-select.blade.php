<div {{ $attributes->only('class') }}>
    <label class="form-label" for="{{ $id }}">{{ $label }}</label>
    <select
        class="form-control choices-init"
        id="{{ $id }}"
        name="{{ $name }}"
    >
        <option value="" @selected($noValueSelected)>{{ $placeholderLabel }}</option>
        @foreach($models as $model)
            <option value="{{ $getModelValue($model) }}" @selected($isSelectedModel($model))>{{ $getModelLabel($model) }}</option>
        @endforeach
    </select>
    @error($name)<div class="form-text">{{ $message }}</div>@enderror
</div>