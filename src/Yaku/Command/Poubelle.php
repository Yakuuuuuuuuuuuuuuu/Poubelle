<?php

namespace Yaku\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\ItemFactory;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use Yaku\Main;

class Poubelle extends Command{

    public function __construct(){
        parent::__construct("poubelle", "Permet de enlever un item dans votre inventaire", "/poubelle");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
            if ($sender instanceof Player){
                $sender->getInventory()->removeItem(ItemFactory::getInstance()->get($sender->getInventory()->getItemInHand()->getId(), $sender->getInventory()->getItemInHand()->getMeta(), $sender->getInventory()->getItemInHand()->getCount()));
                $sender->sendPopup($this->getConfig()->get("message"));
            }
    }

    private function getConfig()
    {
        return new Config(Main::getInstance()->getDataFolder() . "config.yml", Config::YAML);
    }
}