<?php

/*
     __  __
    |  |/  |.----.-----.-----.-----.-----.-----.--.--.
    |     < |   _|  _  |     |     |  _  |__ --|  |  |
    |__|\__||__| |_____|__|__|__|__|_____|_____|___  |
                                               |_____|
*/

namespace kronnosy\form;

use formapi\SimpleForm;
use kronnosy\handler\ConfigHandler;
use pocketmine\player\Player;

class OnJoinPanel
{
    public static function JoinPanel(Player $player): void
    {
        $form = new SimpleForm(function (Player $player, $data) {
            if ( $data === null ) return;
        });

        $form->setTitle(ConfigHandler::get("JoinPanelTitle"));
        $form->setContent(ConfigHandler::get("JoinPanelMessage"));
        $form->addButton(ConfigHandler::get("JoinPanelButton"), 0, ConfigHandler::get("JoinPanelButtonTexture"));
        $player->sendForm($form);
    }
}
