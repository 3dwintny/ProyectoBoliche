<?php

namespace App\Listeners;

use App\Events\CumpleaniosEntrenador;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class actualizarEdadEntrenador
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CumpleaniosEntrenador  $event
     * @return void
     */
    public function handle(CumpleaniosEntrenador $event)
    {
        $entrenador = $event->entrenador;
        $entrenador->edad=now()->diffInYears($entrenador->fecha_nacimiento);
        $entrenador->save();
    }
}
