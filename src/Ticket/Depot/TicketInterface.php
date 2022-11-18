<?php

namespace Domaine\Ticket\Depot;

use Domaine\Ticket\Modele\Ticket as EntiteTicket;

/**
 * Port dépôt Ticket
 */
interface TicketInterface
{
    /**
     * @param EntiteTicket $ticket
     * @return TicketInterface
     */
    public function ajoute(EntiteTicket $ticket): TicketInterface;

    /**
     * @return array
     */
    public function liste(): array;
}