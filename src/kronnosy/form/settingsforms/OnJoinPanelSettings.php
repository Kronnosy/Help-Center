<?php

/*
     __  __
    |  |/  |.----.-----.-----.-----.-----.-----.--.--.
    |     < |   _|  _  |     |     |  _  |__ --|  |  |
    |__|\__||__| |_____|__|__|__|__|_____|_____|___  |
                                               |_____|
*/

namespace kronnosy\form\settingsforms;

use formapi\CustomForm;
use kronnosy\handler\ConfigHandler;
use pocketmine\player\Player;
use pocketmine\utils\Config;

class OnJoinPanelSettings
{
    public static function OJPSettingsPanel(Player $player): void
    {
        $form = new CustomForm(function (Player $player, $data)
        {
            if ($data === null) return;
            ConfigHandler::set("JoinPanelStatus", $data[1] === true);
            ConfigHandler::set("JoinPanelMessage", $data[2]);
        });

        // ne eklentisi ki bu

        $form->setTitle(ConfigHandler::get("JoinPaneSettingsTitle"));
        $form->addLabel(ConfigHandler::get("JoinPanelSettingsMessage"));
        $form->addToggle(ConfigHandler::get("JoinPanelSettingsToggle"), true);
        $form->addInput(ConfigHandler::get("JoinPanelSettingsInputMessage"));
        $player->sendForm($form);
    }
}