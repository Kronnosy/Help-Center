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

class SSSCommandPanel
{
    public static function SSSPanel(Player $player): void
    {
        $form = new SimpleForm(function (Player $player, $data) {
            if ($data === null) return;
        });

        $form->setTitle(ConfigHandler::get("SSSPanelTitle"));
        $form->setContent(ConfigHandler::get("SSSPanelMessage"));
        $player->sendForm($form);

    }
}