<div class="row">
  <div class="col-md-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      {{ Form::label('name','Nombre del Rol') }}
      {{ Form::text('name',null,['class'=>'form-control','placeholder' => 'NOMBRE DEL ROL']) }}
      @if ($errors->has('name'))
        <span class="help-block">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
      @endif
    </div>
    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
      {{ Form::label('slug','Url amigable') }}
      {{ Form::text('slug',null,['class'=>'form-control','placeholder' => 'URL']) }}
      @if ($errors->has('slug'))
        <span class="help-block">
          <strong>{{ $errors->first('slug') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
      {{ Form::label('description','Descripcion del rol') }}
      {{ Form::textarea('description',null,['class'=>'form-control', 'rows' => '2', 'placeholder' => 'BREVE DESCRIPCION DEL ROL']) }}
    </div>
    <hr>
    <h4 class="text-center">PERMISOS ESPECIALES</h4>
    <div class="form-group text-center">
      <label>
        {{ Form::radio('special','all-access') }} Acceso Total
      </label>
      <label>
        {{ Form::radio('special','no-access') }} Ningun Acceso
      </label>
    </div>
  </div>
  {{-- Lista de Permisos --}}
  <div class="col-md-6">
    <strong><i class="fa fa-bookmark"></i> LISTADO DE PERMISOS DEL SISTEMA</strong>
    <div class="box-group" id="accordion">
      @foreach ($slugs as $slug)
      <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
      <div class="panel box box-primary">
        <div class="box-header with-border">
          <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#{{ $slug }}" aria-expanded="false" class="collapsed">
              <i class="fa fa-caret-square-o-down"></i> {{ strtoupper($slug) }}
            </a>
          </h4>
        </div>
        <div id="{{ $slug }}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
          <div class="box-body">
            @foreach($permissions as $permission)
              <?php $slug2 = explode('.',$permission->slug) ?>
              @if($slug == $slug2[0])
              <div class="checkbox icheck">
                <label>
                  {{ Form::checkbox('permissions[]', $permission->id) }}
                  <strong>{{ $permission->name }}</strong> <em>({{ $permission->description }})</em><br>
                </label>
              </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<div class="form-group text-center">
  {{ Form::submit('GUARDAR', ['class'=>'btn btn-flat btn-primary']) }}
  <a href="{{ route('roles.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>
</div>

@section('css')
  <!-- iCheck -->
  <link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('scripts')
  <!-- iCheck -->
  <script src="{{ asset('plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
  <script>
    $(function(){
      $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
      });
    });
  </script>
@endsection
