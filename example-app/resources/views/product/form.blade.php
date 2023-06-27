<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $product->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
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

<!-- En el código actualizado, hemos agregado un evento load que se ejecuta cuando la página se carga por completo. Dentro de este evento, comparamos el valor del campo oculto (estadoInput) con la cadena 'Ocupada' para determinar si el estado es "Ocupada" o "Disponible". Luego, ajustamos las clases y el texto del botón en consecuencia.
De esta manera, cuando el formulario se cargue nuevamente, el estado y el color del botón se reflejarán correctamente según el valor almacenado en la base de datos.
Espero que esta solución resuelva el problema. Si tienes alguna otra pregunta, no dudes en hacerla. -->

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

