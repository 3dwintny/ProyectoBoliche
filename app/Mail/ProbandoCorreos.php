<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProbandoCorreos extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $tarea;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$tarea)
    {
        $this->data = $data;
        $this->tarea = $tarea;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $tareaAsignada = $this->tarea;
        return $this->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'))
        ->view('emails.contacto',compact('tareaAsignada'))
        ->subject('Departamento de Psicología')
        ->with($this->data);
    }
}
