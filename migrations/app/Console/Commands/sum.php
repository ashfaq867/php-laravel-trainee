<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class sum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    protected $n1,$n2,$sum;
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->n1=$this->ask("enter a num");
        $this->n2=$this->ask("enter a num");
        $this->sum=$this->n1+$this->n2;
        echo $this->sum;

    }
}
