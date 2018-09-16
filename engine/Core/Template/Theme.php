<?php declare(strict_types=1);

namespace Engine\Core\Template;

/**
 * Class Theme
 *
 * @author SuslikEst
 */
class Theme 
{
    /**
     * Rules template name
     */
    const RULES_NAME_FILE = [
        'header'  => 'header-%s',
        'footer'  => 'footer-%s',
        'sidebar' => 'sidebar-%s',
    ];
    
    /**
     * Url theme mask
     */
    const URL_THEME_MASK = '%s/content/themes/%s';
    
    /**
     * Url current theme
     * @type string
     */
    protected static $url = '';

    /**
     * Data for block
     * @var array
     */
    protected $data = [];
    
    /**
     * Theme header
     * 
     * @param null $name
     */
    public function header($name = null)
    {
        $name = (string) $name;
        
        $file = 'header';

        if ('' !== $name)
        {
            // file name type of header-yourenamed
            $file = sprintf(self::RULES_NAME_FILE['header'], $name);
        }

        $this->loadTemplateFile($file);
    }

    /**
     * Theme footer
     * 
     * @param string $name
     */
    public function footer($name = '')
    {
        $name = (string) $name;
        
        $file = 'footer';

        if ('' !== $name)
        {
            $file = sprintf(self::RULES_NAME_FILE['footer'], $name);
        }

        $this->loadTemplateFile($file);
       
    }

    /**
     * Theme sidebar
     * 
     * @param string $name
     */
    public function sidebar($name = '')
    {
        $name = (string) $name;
        
        $file = 'sidebar';

        if ('' !== $name)
        {
            $file = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        }

        $this->loadTemplateFile($file);
        
    }

    /**
     * Theme block
     * 
     * @param string $name
     * @param array $data
     */
    public function block($name = '', $data = [])
    {
        $name = (string) $name;

        if ('' !== $name)
        {
            $this->loadTemplateFile($name, $data);
        }

    }
    
    /**
     * Load file template
     * 
     * @param string $nameFile
     * @param array $data
     * @throws Exception
     */
    private function loadTemplateFile($nameFile, $data = [])
    {
        $templateFile = ROOT_DIR . '/content/themes/default/' . $nameFile . '.php';

        if (is_file($templateFile)) 
        {
            extract($data);
            require_once $templateFile;
        }
        else
        {
          throw new Exception(sprintf("Error Processing Request %s", $templateFile));
        }
    }

   /**
    * Get data
    * 
    * @return array
    */
   public function getData()
   {
       return $this->data;
   }

   /**
    * Set data
    * 
    * @param array $data
    */
   public function setData($data)
   {
       $this->data = $data;
   }
    
}
