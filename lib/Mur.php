<?php

require_once "../vendor/autoload.php";

/**
 * MUR - The MUstache Renderer
 */
class Mur
{
    private static $templatePath = __DIR__ . '/../templates/';

    /**
     * Renders a template with the provided object
     *
     * @param string $template
     * @param object $obj
     */
    public static function render($template, $obj)
    {
        $template = self::$templatePath . $template . '.html';
        $m = new Mustache_Engine(array('entity_flags' => ENT_QUOTES));
        echo $m->render(file_get_contents($template), $obj);
    }
}
