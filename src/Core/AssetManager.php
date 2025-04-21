<?php
namespace App\Core;

class AssetManager {
    private static $instance = null;
    private $cssFiles = [];
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function addCss($file) {
        if (!in_array($file, $this->cssFiles)) {
            $this->cssFiles[] = $file;
        }
    }
    
    public function renderCss() {
        $output = '';
        foreach ($this->cssFiles as $file) {
            $output .= sprintf('<link rel="stylesheet" href="/public/assets/css/%s.css">', $file);
        }
        return $output;
    }
}
