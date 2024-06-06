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

use kronnosy\{command\AnnouncementCommand, command\SettingsCommand, command\SSSCommand, handler\ConfigHandler};

use pocketmine\
{
   plugin\PluginBase
};

class Kronnosy extends PluginBase
{
    /**
     * @return void
     */
    protected function onLoad(): void
    {
        $logger = $this->getLogger();
        $logger->info("oooo    oooo                                                                                 ");
        $logger->info("`888   .8P'                                                                                  ");
        $logger->info(" 888  d8'    oooo d8b  .ooooo.  ooo. .oo.   ooo. .oo.    .ooooo.   .oooo.o oooo    ooo       ");
        $logger->info(" 88888[      `888\"\"8P d88' `88b `888P\"Y88b  `888P\"Y88b  d88' `88b d88(  \"8  `88.  .8'   ");
        $logger->info(" 888`88b.     888     888   888  888   888   888   888  888   888 `\"Y88b.    `88..8'        ");
        $logger->info(" 888  `88b.   888     888   888  888   888   888   888  888   888 o.  )88b    `888'          ");
        $logger->info("o888o  o888o d888b    `Y8bod8P' o888o o888o o888o o888o `Y8bod8P' 8\"\"888P'     .8'         ");
        $logger->info("                                                                            .o..P'           ");
        $logger->info("                                                                           `Y8P'             ");
        parent::onLoad();
    }


    /**
     * @return void
     */
    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        ConfigHandler::init($this);
        $this->registerCommands();
        parent::onEnable();
    }

    /**
     * @return void
     */
    private function registerCommands(): void
    {
        $commandMap = $this->getServer()->getCommandMap();

        $commandMap->registerAll("Kronnosy", [
            new SSSCommand(),
            new SettingsCommand(),
            new AnnouncementCommand()
        ]);
    }

}

