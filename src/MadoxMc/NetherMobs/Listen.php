<?php
/*
 *
 *   This program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU Lesser General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   By: MadoxMc
 *   Discord: MadoxMC#3539
 */

declare(strict_types=1);

namespace MadoxMc\NetherMobs;

use pocketmine\entity\Entity;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDespawnEvent;
use pocketmine\event\entity\EntitySpawnEvent;
use pocketmine\player\Player;
use MadoxMc\NetherMobs\Attributes;
use MadoxMc\NetherMobs\Main;
use MadoxMc\NetherMobs\Motion;
use MadoxMc\NetherMobs\Registrations;

class Listen implements Listener {
	public function onEntityDamageByEntityEvent(EntityDamageByEntityEvent $event) {
		$entity = $event->getEntity();
	}
	
	public function getName() : string {
		$data = explode("\\", get_class($this));
		$name = end($data);
		return $name;
	}
	
	public function isFireProof() : bool {
		return (new Attributes)->isFireProof($this->getName());
	}
	
       public function onEntityDamageEvent(EntityDamageEvent $e) : void{
       $en = $e->getEntity();
       if ($en instanceof Player){
       return;
       }
       if ($en->isFireProof() == true){
       if ($e->getCause() === EntityDamageEvent::CAUSE_FIRE){
       $e->cancel();
       } elseif  ($e->getCause() === EntityDamageEvent::CAUSE_LAVA) { 
       $e->cancel();
       } elseif ($e->getCause() === EntityDamageEvent::CAUSE_FIRE_TICK) {
       $e->cancel();
              }
        }
 }
 
	public function onEntityDespawnEvent(EntityDespawnEvent $event) {
		$entity = $event->getEntity();
		if (method_exists($entity, "getName") and $entity instanceof Entity) {
			Main::$instance->toolsobj->spawnMessage($entity, "Despawned");
		}
	}

	public function onEntitySpawnEvent(EntitySpawnEvent $event) {
		$entity = $event->getEntity();
		if ($entity instanceof Entity) {
			Main::$instance->toolsobj->spawnMessage($entity, "Spawned");
		}
	}
}
