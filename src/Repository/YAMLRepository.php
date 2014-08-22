<?php

namespace Repository;

use Symfony\Component\Yaml\Yaml;

class YAMLRepository
{
    protected $filePath;
    protected $menuArray;
    protected $currentSection;

    /**
     * 
     * @param string $filePath
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
        $this->loadYamToArray();
    }

    private function loadYamToArray()
    {
        $this->menuArray = Yaml::parse(file_get_contents($this->filePath));
    }

    public function getMenuArray()
    {
        return $this->menuArray;
    }

    public function getMenuFirst()
    {
        return $this->menuArray["Menu"][0]["url"];
    }

    public function setCurrentSection( $section )
    {
        $this->currentSection = $section;
    }

    public function getCurrentSectionDatas()
    {

        foreach ($this->menuArray["Menu"] as $key => $menuItem) {

            if ( $menuItem["url"] == $this->currentSection ) {
                return $menuItem;
                break;
            }
        }

        return null;
    }

}