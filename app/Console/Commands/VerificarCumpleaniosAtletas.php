<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Alumno;
use App\Events\CumpleaniosAtleta;
use Carbon\Carbon;

class VerificarCumpleaniosAtletas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cumpleaniosAtleta:verificar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verificar la fecha de cumpleanios de los atletas y actualizar la edad';

    public function __construct(){
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $alumnos = Alumno::all();
        foreach ($alumnos as $alumno) {
            $fechaCumpleanios = Carbon::parse($alumno->fecha); // Convierte la cadena en un objeto Carbon (DateTime)
            
            if ($this->esSuCumpleanios($fechaCumpleanios)) {
                event(new CumpleaniosAtleta($alumno));
            }
        }
    }

    private function esSuCumpleanios($fechaCumpleanios)
    {
        return now()->format('md') === $fechaCumpleanios->format('md');
    }
}
