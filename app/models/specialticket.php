<?php
namespace App\Models;

class SpecialTicket
{
    public $id;
    public $ticket_price;
    public $ticket_name;
    public $ticket_information;

    public function __construct($id = null, $ticket_price = null, $ticket_name = null, $ticket_information = null)
    {
        $this->id = $id;
        $this->ticket_price = $ticket_price;
        $this->ticket_name = $ticket_name;
        $this->ticket_information = $ticket_information;
    }
}
