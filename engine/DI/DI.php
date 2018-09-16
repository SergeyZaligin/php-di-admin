<?php declare(strict_types=1);
namespace Engine\DI;

/**
 * Pattern DI contIner
 */
class DI
{
  /**
   * @var array;
   */
  private $container = [];

  /**
   * Set
   * 
   * @param type @string $key
   * @param type @string $value
   * @return \Engine\DI\DI
   */
  public function set(string $key, $value): DI
  {
    $this->container[$key] = $value;
    return $this;
  }
  
  /**
   * Get
   * 
   * @param type @string $key
   * @return @string
   */
  public function get(string $key)
  {
    return $this->hasKey($key);
  }
  
  /**
   * 
   * @param type @string $key
   * @return string
   */
  private function hasKey(string $key)
  {
    return $this->container[$key] ?? null;
  }
}
