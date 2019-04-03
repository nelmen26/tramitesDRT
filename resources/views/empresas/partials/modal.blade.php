<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-logo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-picture-o"></i> Subir logo de la Empresa</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('empresas.upload',$empresa->id) }}"
              class="dropzone"
              id="mi-dropzone"
              method="POST"
              files="true">
              {{ csrf_field() }}
        </form>
        <br>
        <div class="form-group text-center">
            <button type="button" class="btn btn-primary btn-flat" id="button-upload"><i class="fa fa-upload"></i> Subir Fotos</button>
        </div>
      </div>
    </div>    
  </div>
</div>