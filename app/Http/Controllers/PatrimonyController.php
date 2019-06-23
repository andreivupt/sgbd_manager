<?php

namespace App\Http\Controllers;

use App\Services\StoreDataFile;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PatrimonyController extends Controller
{

    /**
     * Pagina inicial do sistema
     *
     */
    public function home()
    {

        $data = null;

        $db_file = "db_patrimony.txt";
        $count = substr_count(file_get_contents($db_file), "\n");
        $open = fopen($db_file, 'r');

        if ($count > 0) {
            for ($i = 0; $i < $count; $i++) {

                $line = fgets($open, 1024);
                $list = explode(',', $line);

                $data [] = $list;
            }
        }

        return view('index', compact('data'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = null;

        $db_file = "db_patrimony.txt";
        $count = substr_count(file_get_contents($db_file), "\n");
        $open = fopen($db_file, 'r');

        if ($count > 0) {
            for ($i = 0; $i < $count; $i++) {

                $line = fgets($open, 1024);
                $list = explode(',', $line);

                $data [] = $list;
            }
        }

        return view('patrimony.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patrimony.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $storeOnFile = new StoreDataFile();

        $result = $storeOnFile->getPatrimonyInformations($request);

        if ($result)
            return redirect()->route('index')->with('success', 'Cadastrado com sucesso!');
        else
            return redirect()->route('index')->with('error', 'Não foi possível realizar a operação!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logs()
    {
        $data = null;

        $db_file = "transaction_log.txt";
        $count = substr_count(file_get_contents($db_file), "\n");
        $open = fopen($db_file, 'r');

        if ($count > 0) {

            for ($i = 1; $i <= $count; $i++) {

                $line = fgets($open, 1024);
                $list = explode(',', $line);

                $data [] = $list;
            }
        }

        return view('logs', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = null;

        $db_file = "db_patrimony.txt";
        $count = substr_count(file_get_contents($db_file), "\n");
        $open = fopen($db_file, 'r');

        if ($count > 0) {
            for ($i = 0; $i < $count; $i++) {

                $line = fgets($open, 1024);
                $list = explode(',', $line);

                $data [] = $list;
            }
        }

        return view('show', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function checkpoint()
    {

        $storeCheckpoint = new StoreDataFile();

        $result = $storeCheckpoint->storeLog(6);

        if ($result)
            return redirect()->route('index')->with('success', 'Checkpoint realizado com sucesso!');
        else
            return redirect()->route('index')->with('error', 'Não foi possível realizar o checkpoint!');

    }

    public function commit()
    {

        $storeOnFile = new StoreDataFile();

        $result = $storeOnFile->storeLog(4);

        if ($result)
            return redirect()->route('index')->with('success', 'As alterações foram comitadas!');
        else
            return redirect()->route('index')->with('error', 'Não foi possível comitar as alterações!');

    }
}
