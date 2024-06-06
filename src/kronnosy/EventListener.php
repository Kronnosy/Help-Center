<?php

/**
 *   oooo    oooo
 *   `888   .8P'
 *    888  d8'    oooo d8b  .ooooo.  ooo. .oo.   ooo. .oo.    .ooooo.   .oooo.o oooo    ooo
 *    88888[      `888""8P d88' `88b `888P"Y88b  `888P"Y88b  d88' `88b d88(  "8  `88.  .8'
 *    888`88b.     888     888   888  888   888   888   888  888   888 `"Y88b.    `88..8'
 *    888  `88b.   888     888   888  888   888   888   888  888   888 o.  )88b    `888'
 *   o888o  o888o d888b    `Y8bod8P' o888o o888o o888o o888o `Y8bod8P' 8""888P'     .8'
 *                                                                              .o..P'
 *                                                                              `Y8P'
 *
 * @name Kronnosy
 * @author Kronnosy
 * @version 0.1-BETA
 */

namespace kronnosy;

use kronnosy\
{
    form\OnJoinPanel,
    handler\ConfigHandler
};

use pocketmine\{entity\Attribute,
    event\Listener,
    event\player\PlayerJoinEvent,
    event\server\DataPacketSendEvent,
    network\mcpe\protocol\ModalFormRequestPacket,
    scheduler\CancelTaskException,
    scheduler\ClosureTask};

class EventListener implements Listener
{
    /**
     * @var Kronnosy $kronnosy
     */
    private Kronnosy $kronnosy;

    /**
     * @param Kronnosy $kronnosy
     */
    public function __construct(Kronnosy $kronnosy)
    {
        $this->kronnosy = $kronnosy;
    }

    /**
     * @param PlayerJoinEvent $joinEvent
     * @return void
     */
    public function onJoinEvent(PlayerJoinEvent $joinEvent): void
    {
        $player = $joinEvent->getPlayer();

        if (ConfigHandler::get("JoinPanelStatus")) OnJoinPanel::JoinPanel($player);
    }

    /**
     * @param DataPacketSendEvent $packetSendEvent
     * @return void
     */
    public function onDataPacketSendEvent(DataPacketSendEvent $packetSendEvent): void
    {
        foreach ($packetSendEvent->getPackets() as $packet) {
            if (!($packet instanceof ModalFormRequestPacket)) continue;

            foreach ($packetSendEvent->getTargets() as $target) {
                $player = $target->getPlayer();
                if ($player === null || !$player->isConnected()) continue;

                $this->kronnosy->getScheduler()->scheduleDelayedTask(new ClosureTask(function () use ($player, $target): void {
                    $times = 5;

                    $this->kronnosy->getScheduler()->scheduleRepeatingTask(new ClosureTask(static function () use ($times, $player, $target): void {
                        if (--$times < 0 || !$target->isConnected()) throw new CancelTaskException("Maximum retries exceeded");

                        $target->getEntityEventBroadcaster()->syncAttributes([$target], $player, [
                            $player->getAttributeMap()->get(Attribute::EXPERIENCE_LEVEL)
                        ]);
                    }), 10);

                }), 1);
            }
        }
    }
}