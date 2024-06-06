<?php

/*
     __  __
    |  |/  |.----.-----.-----.-----.-----.-----.--.--.
    |     < |   _|  _  |     |     |  _  |__ --|  |  |
    |__|\__||__| |_____|__|__|__|__|_____|_____|___  |
                                               |_____|
*/

namespace kronnosy\command;

use kronnosy\form\OnJoinPanel;
use kronnosy\handler\ConfigHandler;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class AnnouncementCommand extends Command
{

    public function __construct()
    {
        parent::__construct(
            ConfigHandler::get("AnnouncementCommand"),
            ConfigHandler::get("AnnouncementCommandDescription"),
            ConfigHandler::get("AnnouncementCommandUsage")
        );

        $this->setPermission("kronnosy.announcement");
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     * @return void
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if ($sender instanceof Player) OnJoinPanel::JoinPanel($sender);
    }
}
