<?php
/**
 * Totally not stolen from http://www.smashingmagazine.com/2011/10/17/getting-started-with-php-templating/
 * SORRY I FORGOT THAT INCLUDE DID JUST LIKE EXECUTE IN SCOPE
 */

class RumTemplate {
    protected $templateDir;
    protected $vars = array();
    public function __construct($templateDir) {
        $this->templateDir = $templateDir;
    }
    public function render($templateFile) {
        if (file_exists($this->templateDir .'/' . $templateFile . '.php')) {
            $parsedown = Parsedown::instance();
            include $this->templateDir . '/' . $templateFile .'.php';
        } else {
            throw new Exception('no template file ' . $templateFile . ' present in directory ' . $this->templateDir);
        }
    }
    public function __set($name, $value) {
        $this->vars[$name] = $value;
    }
    public function __get($name) {
        return $this->vars[$name];
    }
}