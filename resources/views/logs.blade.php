
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
                                <th>ID</th>
                                <th>Processo</th>
                                <th>Transação</th>
                                <th>Ação</th>
                                <th>Criado em</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(!is_null($data))
                                @foreach($data as $key => $log)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $log[0] }}</td>
                                        <td>{{ $log[1] }}</td>
                                        <td>{{ $log[2] }}</td>
                                        <td>{{ $log[3] }}</td>
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