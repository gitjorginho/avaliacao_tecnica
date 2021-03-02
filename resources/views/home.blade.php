@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-outline-secondary" data-route="{{route('table_list')}}" onclick="getForm(this)" >Ver carros</button>
                    <button class="btn btn-outline-secondary" data-route="{{route('capturar_carros')}}" onclick="getForm(this)" >Capturar carros</button>

               </div>
                <div class="card-body" id="table_list" >
                 @include('capturar_carros')


                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal_msg" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mensagem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">ok</button>
            </div>
        </div>
    </div>
</div>
@endsection
