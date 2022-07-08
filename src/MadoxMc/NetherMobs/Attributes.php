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

class Attributes {
	public function isFlying(string $name) : bool {
		return in_array($name, ["Blaze", "Ghast"]);
	}

	public function isJumping(string $name) : bool {
		return in_array($name, ["MagmaCube"]);
	}

	public function isHostile(string $name) : bool {
		return in_array($name, [
			"Blaze", "Ghast", "MagmaCube", "ZombiePigman", "Enderman", "Skeleton", "WitherSkeleton", "Piglin", "Hoglin", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"
		]);
	}

	public function isNetherMob(string $name) : bool {
		return in_array($name, ["Blaze", "Ghast", "Enderman", "Ghast", "MagmaCube", "Skeleton", "WitherSkeleton", "Strider", "Piglin", "Hoglin", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4"]);
	}
	

	public function isFireProof(string $name) : bool {
		return in_array($name, [
			"Blaze", "Ghast", "MagmaCube", "ZombiePigman", "WitherSkeleton", "Piglin", "Hoglin", "ZombiePigman1", "ZombiePigman2", "ZombiePigman3", "ZombiePigman4", "Strider"
		]);
	}

	
	public function getMortalEnemy(string $name) : string {
		$enemies = array();
		foreach ($enemies as $source => $target) {
			if ($source === $name) {
				return $target;
			}
		}
		return "none";
	}
}
