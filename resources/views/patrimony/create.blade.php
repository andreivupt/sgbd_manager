@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>SGBD Manager,</h2>
                        <p class="mb-md-0">O gerenciador de banco de dados.</p>
                    </div>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Início&nbsp;/&nbsp;</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-plus text-muted"></i>
                    </button>
                    <a href="{{ route('patrimony.create') }}">
                        <button class="btn btn-primary mt-2 mt-xl-0">Adicionar patrimônio</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cadastrar novo patrimônio</h4>

                <form action="{{ route('patrimony.store') }}" method="POST">
                    @csrf

                    <div class="form-group col-xl-6 pl-0">
                        <label>Nome do patrimônio *</label>
                        <input type="text" class="form-control form-control-sm" name="patrimony_name" aria-label="patrimony_name">
                    </div>

                    <div class="form-group col-xl-3 pl-0">
                        <label>Número do patrimônio *</label>
                        <input type="text" class="form-control form-control-sm" name="patrimony_number" aria-label="patrimony_number">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Salvar</button>

                </form>

            </div>
        </div>
    </div>
    </div>

@endsection