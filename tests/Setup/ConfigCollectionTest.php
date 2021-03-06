<?php

/* Copyright (c) 2019 Richard Klees <richard.klees@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\Tests\Setup;

require_once(__DIR__."/Helper.php");

use ILIAS\Setup;

class ConfigCollectionTest extends \PHPUnit\Framework\TestCase {
	use Helper;

	public function testConstruct() {
		$c1 = $this->newConfig();
		$c2 = $this->newConfig();
		$c3 = $this->newConfig();

		$c = new Setup\ConfigCollection(["c1" => $c1, "c2" => $c2, "c3" => $c3]);

		$this->assertInstanceOf(Setup\Config::class, $c);
	}

	public function testGetConfig() {
		$c1 = $this->newConfig();
		$c2 = $this->newConfig();
		$c3 = $this->newConfig();

		$c = new Setup\ConfigCollection(["c1" => $c1, "c2" => $c2, "c3" => $c3]);

		$this->assertEquals($c1, $c->getConfig("c1"));
		$this->assertEquals($c2, $c->getConfig("c2"));
		$this->assertEquals($c3, $c->getConfig("c3"));
	}

	public function testGetKeys() {
		$c1 = $this->newConfig();
		$c2 = $this->newConfig();
		$c3 = $this->newConfig();

		$c = new Setup\ConfigCollection(["c1" => $c1, "c2" => $c2, "c3" => $c3]);

		$this->assertEquals(["c1", "c2", "c3"], $c->getKeys());
	}
}
