<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreosTerapia extends Mailable
{
    use Queueable, SerializesModels;
    public $tarea;
    public $fechaTarea;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tarea,$fechaTarea)
    {
        $this->tarea = $tarea;
        $this->fechaTarea = $fechaTarea;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $obtenerTarea = $this->tarea;
        $fechaAsignacionTarea = $this->fechaTarea;
        return $this->view('psicologia.terapias.construirCorreo',compact('obtenerTarea','fechaAsignacionTarea'))
        ->subject('Departamento de Psicología');
    }
}
