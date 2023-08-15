<?php

namespace App\Listeners;

use App\Events\CumpleaniosAtleta;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ActualizarEdadAtleta
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
     * @param  \App\Events\CumpleaniosAtleta  $event
     * @return void
     */
    public function handle(CumpleaniosAtleta $event)
    {
        $alumno = $event->alumno;
        $alumno->edad = now()->diffInYears($alumno->fecha);
        $alumno->save();
    }
}
