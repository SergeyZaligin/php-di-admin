<?php declare(strict_types=1);

namespace Engine\Core\Template;

use Engine\Core\Template\Theme;

/**
 * Class View
 *
 * @author SuslikEst
 */
class View 
{
    /**
     *
     * @var Theme object
     */
    protected $theme;
    
    /**
     * Constructor View
     */
    public function __construct() 
    {
        $this->theme = new Theme();
    }
    
    /**
     * Render view
     * 
     * @param type $template
     * @param type $vars
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    public function render($template, $vars = []) 
    {
        $templatePath = $this->getTemplatePath($template, ENV);
        
        if(!is_file($templatePath))
        {
            throw new \InvalidArgumentException(
            sprintf('Template "%s" not found in "%s"', $template, $templatePath)
            );
        }
        
        $this->theme->setData($vars);
        
        extract($vars);
        
        ob_start();
        ob_implicit_flush(0);

        try {
            require($templatePath);
        } 
        catch (\Exception $e)
        {
          ob_end_clean();
          throw $e;
        }

        echo ob_get_clean();
    }
    
    /**
     * Get template path
     * 
     * @param string $template
     * @param string $env
     * @return resource
     */
    private function getTemplatePath($template, $env = null)
    {

        if ($env == 'Cms')
        {
            return ROOT_DIR . '/content/themes/default/' . $template . '.php';
        }

        return ROOT_DIR . '/View/' . $template . '.php';
    }
}
