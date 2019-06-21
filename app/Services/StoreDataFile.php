<?php


namespace App\Services;

use App\Helpers;
use Illuminate\Support\Facades\Storage;

class StoreDataFile
{

    public function getPatrimonyInformations($session, $request)
    {

        $handle = $this->storeLog($session, $request);

        if ($handle && $session == 4){

            $patrimony = [
                $request->patrimony_name,
                $request->patrimony_number,
                'Sem bloqueio',
                now()->format('d/m/Y H:i:s').PHP_EOL
            ];

            $db_file = "db_patrimony.txt";

            return $this->storeOnFile($db_file, $patrimony);
        }

        return false;

    }

    public function storeLog($session, $request)
    {

        $log_file        = "transaction_log.txt";
        $lastTransaction = $this->lastNumberTransaction($log_file);

        if ($lastTransaction[0] == "")
            $lastTransaction[0]++;
        else {
            if ($lastTransaction[1] == $this->transacao(4) || $lastTransaction[1] == $this->transacao(5))
                $lastTransaction[0]++;
        }

        $data = [
            $lastTransaction[0],
            $this->transacao($session),
            $this->action($session),
            $request->patrimony_name,
            $request->patrimony_number,
            now()->format('d/m/Y H:i:s').PHP_EOL
        ];

        if (is_writable($log_file)){

            if (! $handle = fopen($log_file, 'a'))
                return false;

            fwrite($handle , implode(',', $data));

        } else
            return false;

        return true;
    }

    public function storeOnFile($dbname, $data)
    {

        if (is_writable($dbname)){

            if (! $handle = fopen($dbname, 'a'))
                return false;

            $result = fwrite($handle , implode(',', $data));

            if (!$result)
                return false;

        } else
            return false;

        return true;

    }

    public function transacao($id){

        $transacao = [
            1 => 'inserção',
            2 => 'edição',
            3 => 'remoção',
            4 => 'commit',
            5 => 'rollback',
            6 => 'checkpoint',
        ];

        return $transacao[$id];
    }

    public function action($id){

        $action = [
            1 => 'insert into db_patrimony(patrimony_name, patrimony_number)',
            2 => 'editou',
            3 => 'removeu',
            4 => 'finalizou transação',
            5 => 'finalizou transação'
        ];

        return $action[$id];
    }


    public function lastNumberTransaction($filepath, $lines = 1) {

        $line = trim(implode("", array_slice(file($filepath), -$lines)));

        $explodeLine = explode(',', $line);

        return $explodeLine;

    }

}