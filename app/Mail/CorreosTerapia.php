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
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tarea)
    {
        $this->tarea = $tarea;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $obtenerTarea = $this->tarea;
        return $this->view('psicologia.terapias.construirCorreo',compact('obtenerTarea'))
        ->subject('Departamento de Psicología');
    }
}
