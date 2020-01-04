<div class="form-group {!! $errors->has('nama') ? 'has-error' : ''
!!}">
{!! Form::label('nama', 'Nama Mahasiswa') !!}
{!! Form::text('nama', null, ['class'=>'form-control']) !!}
{!! $errors->first('nama', '<p class="help-block" style="color: red">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('nrp') ? 'has-error' : ''
!!}">
{!! Form::label('nrp', 'NRP') !!}
{!! Form::text('nrp', null, ['class'=>'form-control']) !!}
{!! $errors->first('nrp', '<p class="help-block" style="color: red">:message</p>')
!!}
</div>

<div class="form-group {!! $errors->has('tugas1') ? 'has-error' : ''
!!}">
{!! Form::label('tugas1', 'Tugas 1') !!}
</br>
{!! Form::text('tugas1', null, ['size'=>5, 'maxlength'=>3]) !!}
{!! $errors->first('tugas1', '<p class="help-block" style="color: red">:message</p>')!!}
</div>

<div class="form-group {!! $errors->has('tugas2') ? 'has-error' : ''
!!}">
{!! Form::label('tugas2', 'Tugas 2') !!}
</br>
{!! Form::text('tugas2', null, ['size'=>5, 'maxlength'=>3]) !!}
{!! $errors->first('tugas2', '<p class="help-block" style="color: red">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('tugas3') ? 'has-error' : ''
!!}">
{!! Form::label('tugas3', 'Tugas 3') !!}
</br>
{!! Form::text('tugas3', null, ['size'=>5, 'maxlength'=>3]) !!}
{!! $errors->first('tugas3', '<p class="help-block" style="color: red">:message</p>') !!}
</div>

<div>
{!! Form::label('keterangan', 'Keterangan') !!}
{!! Form::textarea('keterangan', null, ['class'=>'form-control']) !!}
</div>
</br>

<div>
{!! Form::label('foto', 'Foto Mahasiswa (jpeg, png)') !!}
{!! Form::file('foto') !!}
    @if (isset($model) && $model->foto !== '')
    <div class="row">
        <div class="col-md-6">
        <p>Current photo:</p>
        <div class="thumbnail">
            <img src="{{ url('/img/' . $model->foto) }}" class="img- rounded">
        </div>
        </div>
    </div>
    @endif
</div>

</br>
{!! Form::submit(isset($model) ? 'Update' : 'Simpan', ['class'=>'btn btn-primary']) !!}