
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
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Registro de patrimônios</p>
                        <div class="table-responsive">
                            <table id="recent-purchases-listing" class="table">
                                <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th>Número</th>
                                    <th>Tipo de bloqueio</th>
                                    <th>Criado em</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!is_null($data))
                                    @foreach($data as $patrimony)
                                        <tr>
                                            <td>{{ $patrimony[0] }}</td>
                                            <td>{{ $patrimony[1] }}</td>
                                            <td>{{ $patrimony[2] }}</td>
                                            <td>{{ $patrimony[3] }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection