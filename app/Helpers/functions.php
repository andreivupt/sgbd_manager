<?php

function processo($id){

    $processo = [
        1 => 'Criando patrimonio',
        2 => 'Editando patrimonio',
        3 => 'Removendo patrimonio'
    ];

    return $processo[$id];
}


function transacao($id){

    $transacao = [
        1 => 'inserção',
        2 => 'edição',
        3 => 'remoção'
    ];

    return $transacao[$id];
}


