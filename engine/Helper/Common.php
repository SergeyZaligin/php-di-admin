<?php declare(strict_types=1);

namespace Engine\Helper;

/**
 * Class Common
 *
 * @author SuslikEst
 */
class Common 
{
    /**
     * Method is Post
     * 
     * @return boolean
     */
    public static function isPost(): bool
    {
        if ('POST' == $_SERVER['REQUEST_METHOD'])
        {
                return true;
        }
        return false;
    }
    
    /**
     * Get request method
     * 
     * @return string
     */
    public static function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
	
    /**
     * Get path url
     * 
     * @return string
     */
    public static function getPathUrl(): string
    {
        $pathUrl = $_SERVER['REQUEST_URI'];
        
        // exists get params, cut get params
        if($position = strpos($pathUrl, '?'))
        {
            $pathUrl = substr($pathUrl, 0, $position);
        }

        return $pathUrl;
    }
  
}
