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

namespace MadoxMc\NetherMobs\Entities;
use pocketmine\entity\Living;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use function mt_rand;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\entity\EntitySizeInfo;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;
use pocketmine\data\bedrock\EntityLegacyIds;

class Piglin extends MobsEntity {
	const HEIGHT = 1.95;
    public static function getNetworkTypeId() : string {
        return EntityIds::PIGLIN;
    }
    public function initEntity(CompoundTag $nbt) : void{
        $this->setMaxHealth(20);
	 $this->setMovementSpeed(1.3);
        parent::initEntity($nbt);
    }
    public function getDrops(): array
    {
        $lootingL = 1;
        $cause = $this->lastDamageCause;
        if($cause instanceof EntityDamageByEntityEvent){
            $dmg = $cause->getDamager();
            if($dmg instanceof Player){
               
                // $looting = $dmg->getInventory()->getItemInHand()->getEnchantment(Enchantment::LOOTING);
                // if($looting !== null){
                    // $lootingL = $looting->getLevel();
                // }else{
                    $lootingL = 1;
            // }
            }
        }
        return [VanillaItems::GOLD_INGOT()->setCount(mt_rand(0, 1 * $lootingL))];
    }

    public function getXpDropAmount(): int
    {
        return mt_rand(1, 4);
    }

}
