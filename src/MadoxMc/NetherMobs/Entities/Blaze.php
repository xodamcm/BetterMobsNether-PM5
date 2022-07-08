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
use pocketmine\item\VanillaItems;
use pocketmine\player\Player;
use pocketmine\item\enchantment\VanillaEnchantments;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\entity\EntitySizeInfo;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use function mt_rand;
use pocketmine\data\bedrock\EntityLegacyIds;

class Blaze extends MobsEntity {
	const TYPE_ID = EntityLegacyIds::BLAZE;
	const HEIGHT = 1.8;

    public function getDrops(): array{
        $lootingL = 1;
        $cause = $this->lastDamageCause;
        if($cause instanceof EntityDamageByEntityEvent){
            $dmg = $cause->getDamager();
            if($dmg instanceof Player){

                // $looting = $dmg->getInventory()->getItemInHand()->getEnchantment(VanillaEnchantments::LOOTING()); // todo
                // if($looting !== null){
                    // $lootingL = $looting->getLevel();
                // }else{
                    $lootingL = 1;
				// }
            }
        }
        return [VanillaItems::BLAZE_ROD()->setCount(mt_rand(0, 1 * $lootingL))];
    }

    public function getXpDropAmount(): int
    {
        return 10;
    }

}
