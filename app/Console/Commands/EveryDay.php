<?php

namespace App\Console\Commands;

use App\Imports\GlassesImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class EveryDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'upload file csv once per day';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Request $request)
    {
        return Excel::import(new GlassesImport, $request->file);
    }
}
