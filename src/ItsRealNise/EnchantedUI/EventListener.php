<?php

namespace ItsRealNise\EnchantUI;

use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;
use pocketmine\Item;
use pocketmine\block\EnchantingTable;

/**
 * Class EventListener
 * @package UnknownOre\EnchantUI
 */
class EventListener implements Listener{
    
    /** @param EnchantUI $plugin */
    private $plugin;
    
    public function __construct(Main $plugin){
		$this->plugin = $plugin;
	}
    
    /**
    * @param PlayerInteractEvent $ev
    */
    public function onInteract(PlayerInteractEvent $ev){
        if($ev->getAction() !== PlayerInteractEvent::RIGHT_CLICK_BLOCK) return;
        $table = $this->plugin->shop->getNested('enchanting-table');
        if($table and $ev->getBlock() instanceof EnchantingTable){
            $ev->cancel();
            $this->plugin->ListForm($ev->getPlayer());
        }
    }
}