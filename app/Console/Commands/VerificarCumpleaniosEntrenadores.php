<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Entrenador;
use Carbon\Carbon;
use App\Events\CumpleaniosEntrenador;

class VerificarCumpleaniosEntrenadores extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cumpleaniosEntrenador:verificar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verificar la fecha de cumpleanios de los entrenadores y actualizar la edad';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $entrenadores = Entrenador::all();
        foreach ($entrenadores as $entrenador) {
            $fechaCumpleanios = Carbon::parse($entrenador->fecha_nacimiento); // Convierte la cadena en un objeto Carbon (DateTime)
            
            if ($this->esSuCumpleanios($fechaCumpleanios)) {
                event(new CumpleaniosEntrenador($entrenador));
            }
        }
    }

    private function esSuCumpleanios($fechaCumpleanios)
    {
        return now()->format('md') === $fechaCumpleanios->format('md');
    }
}
