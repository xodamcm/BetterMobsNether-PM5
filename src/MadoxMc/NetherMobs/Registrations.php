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

use pocketmine\data\bedrock\EntityLegacyIds;
use pocketmine\entity\EntityDataHelper;
use pocketmine\entity\EntityFactory;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\world\World;
use MadoxMc\NetherMobs\Entities\Blaze;
use MadoxMc\NetherMobs\Entities\Piglin;
use MadoxMc\NetherMobs\Entities\Strider;
use MadoxMc\NetherMobs\Entities\WitherSkeleton;
use MadoxMc\NetherMobs\Entities\Enderman;
use MadoxMc\NetherMobs\Entities\Ghast;
use MadoxMc\NetherMobs\Entities\MagmaCube;
use MadoxMc\NetherMobs\Entities\MobsEntity;
use MadoxMc\NetherMobs\Entities\Hoglin;
use MadoxMc\NetherMobs\Entities\Skeleton;
use MadoxMc\NetherMobs\Entities\ZombiePigman1;
use MadoxMc\NetherMobs\Entities\ZombiePigman2;
use MadoxMc\NetherMobs\Entities\ZombiePigman3;
use MadoxMc\NetherMobs\Entities\ZombiePigman4;
use MadoxMc\NetherMobs\Entities\ZombiePigman;

class Registrations {
	public function registerEntities() {
		Main::$instance->classes = $this->getClasses();
		$entityFactory = EntityFactory::getInstance();
		foreach (Main::$instance->classes as $entityName => $typeClass) {
			$entityFactory->register($typeClass,
				static function(World $world, CompoundTag $nbt) use($typeClass): MobsEntity {
					return new $typeClass(EntityDataHelper::parseLocation($nbt, $world), $nbt);
				},
			[$entityName], $typeClass::TYPE_ID);
		}
	}

	public function getClasses() : array {
		return [
			"Blaze" => Blaze::class,
		    "ZombiePigman1" => ZombiePigman1::class,
			"Piglin" => Piglin::class,
			"Strider" => Strider::class,
			"Hoglin" => Hoglin::class,
			"ZombiePigman4" => ZombiePigman4::class,
			"Enderman" => Enderman::class,
			"WitherSkeleton" => WitherSkeleton::class,
			"Ghast" => Ghast::class,
			"MagmaCube" => MagmaCube::class,
			"ZombiePigman3" => ZombiePigman3::class,
			"Skeleton" => Skeleton::class,
			"ZombiePigman2" => ZombiePigman2::class,
			"ZombiePigman" => ZombiePigman::class
		];
	}
}
