<div class="modal fade" tabindex="-1" role="dialog" id="edit_patrimony" aria-labelledby="edit_patrimony">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar patrimonio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('patrimony.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label>Nome do patrimonio</label>
                    <input type="hidden" name="n_patrimony_name" id="n_patrimony_name" value="">
                    <input class="form-control patrimony_name" name="patrimony_name" value="">
                    <label>Número do patrimonio</label>
                    <input type="hidden" name="n_patrimony_number" id="n_patrimony_number" value="">
                    <input class="form-control patrimony_number" name="patrimony_number" value="">
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="transaction_id" value="2">
                    <button type="submit" class="btn btn-primary" id="edit_patrimony">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>