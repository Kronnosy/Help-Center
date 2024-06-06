<?php

/*
     __  __
    |  |/  |.----.-----.-----.-----.-----.-----.--.--.
    |     < |   _|  _  |     |     |  _  |__ --|  |  |
    |__|\__||__| |_____|__|__|__|__|_____|_____|___  |
                                               |_____|
*/

namespace kronnosy\form;

use formapi\Form;
use formapi\SimpleForm;
use kronnosy\form\settingsforms\OnJoinPanelSettings;
use kronnosy\form\settingsforms\SSSSettingsPanel;
use kronnosy\handler\ConfigHandler;
use pocketmine\player\Player;

class SettingsCommandPanel
{
    public static function SettingsPanel(Player $player): void
    {
        $form = new SimpleForm(function (Player $player, $data) {
           if ($data === null) return;

           switch ($data)
           {
               case 0:
                   OnJoinPanelSettings::OJPSettingsPanel($player);
                   break;
               case 1:
                    SSSSettingsPanel::SSSSettingsPanel($player);
                   break;
           }

        });

        $form->setTitle(ConfigHandler::get("SettingsPanelTitle"));
        $form->setContent(ConfigHandler::get("SettingsPanelMessage"));
        $form->addButton(ConfigHandler::get("SettingsPanelButton1"), 1, ConfigHandler::get("SettingsPanelButtonTexture"));
        $form->addButton(ConfigHandler::get("SettingsPanelButton2"), 1, ConfigHandler::get("SettingsPanelButtonTexture"));
        $player->sendForm($form);
    }
}