<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $product->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('docente') }}
            {{ Form::text('docente', $product->docente, ['class' => 'form-control' . ($errors->has('docente') ? ' is-invalid' : ''), 'placeholder' => 'Docente']) }}
            {!! $errors->first('docente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_inicio') }}
            {{ Form::time('hora_inicio', $product->hora_inicio, ['class' => 'form-control' . ($errors->has('hora_inicio') ? ' is-invalid' : '')]) }}
            {!! $errors->first('hora_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_final') }}
            {{ Form::time('hora_final', $product->hora_final, ['class' => 'form-control' . ($errors->has('hora_final') ? ' is-invalid' : '')]) }}
            {!! $errors->first('hora_final', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            <button type="button" class="btn btn-toggle{{ $product->estado == 'Ocupada' ? ' btn-danger active' : ' btn-primary' }}" onclick="toggleEstado(this)">
                {{ $product->estado }}
            </button>
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            {{ Form::hidden('estado', $product->estado, ['id' => 'estadoInput']) }}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

<script>
    function toggleEstado(button) {
        var estado = button.innerText.trim();
        button.innerText = estado === 'Ocupada' ? 'Disponible' : 'Ocupada';
        button.classList.toggle('btn-danger');
        button.classList.toggle('btn-primary');
        button.classList.toggle('active');
        var hiddenInput = document.querySelector('#estadoInput');
        hiddenInput.value = button.innerText.trim();
    }

    // Al cargar la página
    window.addEventListener('load', function() {
        var estadoInput = document.querySelector('#estadoInput');
        var estadoButton = document.querySelector('.btn-toggle');
        if (estadoInput.value === 'Ocupada') {
            estadoButton.classList.add('btn-danger', 'active');
            estadoButton.classList.remove('btn-primary');
            estadoButton.innerText = 'Ocupada';
        } else {
            estadoButton.classList.add('btn-primary', 'active');
            estadoButton.classList.remove('btn-danger');
            estadoButton.innerText = 'Disponible';
        }
    });
</script>
