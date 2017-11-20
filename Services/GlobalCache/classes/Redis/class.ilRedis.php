<?php

require_once('./Services/GlobalCache/classes/class.ilGlobalCacheService.php');

/**
 * Class ilRedis
 *
 * @author  Fabian Schmid <fs@studer-raimann.ch>
 * @version 1.0.0
 */
class ilRedis extends ilGlobalCacheService {

	/**
	 * @var Redis
	 */
	protected static $redis_object;


	/**
	 * @param $service_id
	 * @param $component
	 */
	public function __construct($service_id, $component) {
		if (!(self::$redis_object instanceof Redis) AND $this->getInstallable()) {
			/**
			 * @var $ilRedisServer Redis
			 */
			$redis = new Redis();
			$redis->connect('127.0.0.1');

			self::$redis_object = $redis;
		}
		parent::__construct($service_id, $component);
	}


	/**
	 * @return bool
	 */
	public function isActive() {
		return (parent::isActive() && $this->isInstallable());
	}


	public function isInstallable() {
		return parent::isInstallable(); // TODO: Change the autogenerated stub
	}


	/**
	 * @return Redis
	 */
	protected function geRedisObject() {
		return self::$redis_object;
	}


	/**
	 * @param $key
	 *
	 * @return bool
	 */
	public function exists($key) {
		return $this->geRedisObject()->get($this->returnKey($key)) != null;
	}


	/**
	 * @param      $key
	 * @param      $serialized_value
	 * @param null $ttl
	 *
	 * @return bool
	 */
	public function set($key, $serialized_value, $ttl = null) {
		return $this->geRedisObject()->set($this->returnKey($key), $serialized_value, $ttl);
	}


	/**
	 * @param      $key
	 *
	 * @return mixed
	 */
	public function get($key) {
		$b = $this->geRedisObject()->get($this->returnKey($key));

		return $b;
	}


	/**
	 * @param      $key
	 *
	 * @return bool
	 */
	public function delete($key) {
		$this->geRedisObject()->delete($this->returnKey($key));

		return true;
	}


	/**
	 * @return bool
	 */
	public function flush() {
		return $this->geRedisObject()->flushAll();
	}


	/**
	 * @return bool
	 */
	protected function getActive() {
		if ($this->getInstallable() && (self::$redis_object instanceof Redis)) {
			try {
				self::$redis_object->info();
			} catch (RedisException $e) {
				return false;
			}

			return true;
		}

		return false;
	}


	/**
	 * @return bool
	 */
	protected function getInstallable() {
		return class_exists('Redis');
	}


	/**
	 * @return string
	 */
	public function getInstallationFailureReason() {
		if ($this->geRedisObject() instanceof Redis) {
			//
		}

		return parent::getInstallationFailureReason();
	}


	/**
	 * @param $value
	 *
	 * @return mixed
	 */
	public function serialize($value) {
		return serialize($value);
	}


	/**
	 * @param $serialized_value
	 *
	 * @return mixed
	 */
	public function unserialize($serialized_value) {
		return unserialize($serialized_value);
	}


	/**
	 * @return array
	 */
	public function getInfo() {
		if (self::isInstallable()) {
			$return = array();

			return $return;
		}
	}


	/**
	 * @inheritdoc
	 */
	public function isValid($key) {
		return true;
	}
}
