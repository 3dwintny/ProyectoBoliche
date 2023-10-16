<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoEntreno extends Mailable
{
    use Queueable, SerializesModels;
    public $actividad;
    public $fechaActividad;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($actividad,$fechaActividad)
    {
        $this->actividad = $actividad;
        $this->fechaActividad = $fechaActividad;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $obtenerActividad = $this->actividad;
        $fechaAsignacionActividad = $this->fechaActividad;
        return $this->view('entrenador.construirCorreo',compact('obtenerActividad','fechaAsignacionActividad'))
        ->subject('Equipo Técnico');
    }
}
