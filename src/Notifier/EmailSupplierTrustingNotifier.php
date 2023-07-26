<?php

declare(strict_types=1);

namespace App\Notifier;

use App\Entity\SupplierInterface;
use Sylius\Component\Mailer\Sender\SenderInterface;

final class EmailSupplierTrustingNotifier implements SupplierTrustingNotifierInterface
{
    /** @var SenderInterface */
    private $sender;

    public function __construct($sender)
    {
        $this->sender = $sender;
    }

    public function notify(SupplierInterface $supplier): void
    {
        $this->sender->send('app_supplier_trusted', [$supplier->getEmail()], ['supplier' => $supplier]);
    }
}
