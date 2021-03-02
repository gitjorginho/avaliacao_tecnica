<div class="form-row">
    <div class="col-md-1"> <label class="col-form-label" for="">Marca:</label></div>
    <div class="col-md-8">

        <input type="text"  id="text_capturar" class="form-control">
    </div>
    <div class="col-md-2">
        <button class="btn btn-outline-primary col" data-route="{{route('car_capturar')}}" onclick="capturar(this)">Capturar
            <span class="spinner-border spinner-border-sm" style="display: none" id="btn_loading"  role="status" aria-hidden="true"></span>

        </button>
    </div>
</div>