<?php

namespace Yaku;

use pocketmine\plugin\PluginBase;
use Yaku\Command\Poubelle;

class Main extends PluginBase{

    public static Main $instance;

    public function onEnable(): void
    {
        self::$instance = $this;
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->getResource("config.yml");

        ##Start plugin

        $this->getLogger()->notice($this->getConfig()->get("enable"));

        ##Command

        $this->getServer()->getCommandMap()->register("", new Poubelle());
    }

    ##Plugin off

    public function onDisable(): void
    {
        $this->getLogger()->notice($this->getConfig()->get("disable"));
    }

    public static function getInstance() : Main{
        return self::$instance;
    }
}