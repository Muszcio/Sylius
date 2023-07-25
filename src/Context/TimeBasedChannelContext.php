<?php

declare(strict_types=1);

namespace App\Context;

use Sylius\Component\Channel\Context\ChannelContextInterface as ChannelContextInterfaceAlias;
use Sylius\Component\Channel\Model\ChannelInterface;
use Sylius\Component\Channel\Repository\ChannelRepositoryInterface;

final class TimeBasedChannelContext implements ChannelContextInterfaceAlias
{
    /**@var ChannelRepositoryInterface */
    private $channelRepository;

    public function __construct(ChannelRepositoryInterface $channelRepository)
    {
        $this->channelRepository = $channelRepository;
    }

    public function getChannel(): ChannelInterface
    {
        if ($this->isNight()){
            return $this->channelRepository->findOneByCode("NIGHT");
        }

        return $this->channelRepository->findOneBy([]);
    }

    private function isNight(): bool
    {
        $currentHour = (int) (new \DateTime())->format('H');
        return $currentHour > 19 || $currentHour < 6;
    }
}
