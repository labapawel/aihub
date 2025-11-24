<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class testai extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:testai';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $res = \App\Models\AiModel::first();
        $prompt = "Jak się masz?";
        $log = \App\Models\Aimodelrun::create(['aimodel_id'=>1, 'input_data'=>$prompt, 'status'=>'running']);
        $log->save();
        eval($res->script);
        $log->output_data = $output;
        $log->status = 'completed';
        $log->save();
        $this->info($output);
    }
}
