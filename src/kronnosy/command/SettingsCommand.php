<?php

/*
     __  __
    |  |/  |.----.-----.-----.-----.-----.-----.--.--.
    |     < |   _|  _  |     |     |  _  |__ --|  |  |
    |__|\__||__| |_____|__|__|__|__|_____|_____|___  |
                                               |_____|
*/

namespace kronnosy\command;

use kronnosy\form\SettingsCommandPanel;
use kronnosy\handler\ConfigHandler;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class SettingsCommand extends Command
{

    public function __construct()
    {
        parent::__construct(
            ConfigHandler::get("SettingsCommand"),
            ConfigHandler::get("SettingsCommandDescription"),
            ConfigHandler::get("SettingsCommandUsage")
        );

        $this->setPermission("kronnosy.help.settings");
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     * @return void
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if ($sender instanceof Player) SettingsCommandPanel::SettingsPanel($sender);
    }
}
