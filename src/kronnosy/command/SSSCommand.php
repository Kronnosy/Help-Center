<?php

namespace kronnosy\command;

use kronnosy\form\SSSCommandPanel;
use kronnosy\handler\ConfigHandler;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class SSSCommand extends Command
{

    public function __construct()
    {
        parent::__construct(
            ConfigHandler::get("SSSCommand"),
            ConfigHandler::get("SSSCommandDescription"),
            ConfigHandler::get("SSSCommandUsage")
        );

        $this->setPermission("kronnosy.sss");
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     * @return void
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if ($sender instanceof Player) SSSCommandPanel::SSSPanel($sender);
    }
}
