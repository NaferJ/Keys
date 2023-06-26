<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $product->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            <select class="form-select{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado">
                <option selected>Open this select menu</option>
                <option value="Ocupada"{{ $product->estado == 1 ? ' selected' : '' }}>Ocupada</option>
                <option value="Disponible"{{ $product->estado == 2 ? ' selected' : '' }}>Disponible</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>