<?php


namespace App\Services;

use Illuminate\Support\Facades\Storage;

class StoreDataFile
{

    public function getPatrimonyInformations($request)
    {

        $handle = $this->storeLog($request);

        if ($handle) {

            if ($request->transaction_id == 2 ){

                $db_file = "db_patrimony.txt";

                return $this->editOnFile($db_file, $request);
            }

            if ($request->transaction_id == 1 || $request->transaction_id == 3) {

                $patrimony = [
                    $request->patrimony_name,
                    $request->patrimony_number,
                    'Aguardando commit',
                    now()->format('d/m/Y H:i:s') . PHP_EOL
                ];

                $db_file = "db_patrimony.txt";

                return $this->storeOnFile($db_file, $patrimony);
            }

            if ($request->transaction_id == 4) {
                $patrimony = [
                    $request->patrimony_name,
                    $request->patrimony_number,
                    'Sem bloqueio',
                    now()->format('d/m/Y H:i:s') . PHP_EOL
                ];

                $db_file = "db_patrimony.txt";

                return $this->storeOnFile($db_file, $patrimony);
            }
        }

        return false;

    }

    public function storeLog($request)
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
            $this->transacao($request->transaction_id),
            $this->action($request->transaction_id, $request),
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

    public function editOnFile($dbname, $data)
    {

        if (is_writable($dbname)){

            $count = substr_count(file_get_contents($dbname), "\n");

            if (! $handle = fopen($dbname, 'r'))
                return false;

            $macth_id     = $data->n_patrimony_number;
            $replace_id   = $data->patrimony_number;
            $macth_name   = $data->n_patrimony_name;
            $replace_name = $data->patrimony_name;
            $newContent   = '';

            for ($i = 0 ; $i < $count; $i++){

                $line = fgets($handle, 1024);
                $list = explode(',', $line);

                foreach ($list as $key => $field){

                    if ($list[$key] === $macth_id)
                        $list[$key] = $replace_id;

                    if ($list[$key] === $macth_name)
                        $list[$key] = $replace_name;

                }

                $lines [] = implode(',', $list);
            }

            foreach ($lines as $row){

                $newContent .= $row;
            }

            file_put_contents($dbname, $newContent);

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

    public function action($id, $request){

        $action = [
            1 => 'inseriu ' . $request->patrimony_number . ' - ' . $request->patrimony_name ,
            2 => 'atualiazou' . $request->patrimony_number . ' - ' . $request->patrimony_name . ' para '
                              . $request->n_patrimony_number . ' - ' . $request->n_patrimony_name ,
            3 => 'removeu' . $request->patrimony_number . ' - ' . $request->patrimony_name ,
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