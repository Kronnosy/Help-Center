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

class SSSSettingsPanel
{

    public static function SSSSettingsPanel(Player $player): void
    {
        $form = new CustomForm(function (Player $player, $data)
        {
            if ($data === null) return;
            ConfigHandler::set("SSSPanelMessage", $data[1]);
        });

        $form->setTitle(ConfigHandler::get("SSSSettingsPanelTitle"));
        $form->addLabel(ConfigHandler::get("SSSSettingsPanelMessage"));
        $form->addInput(ConfigHandler::get("SSSSettingsPanelInputMessage"));
        $player->sendForm($form);
    }
}