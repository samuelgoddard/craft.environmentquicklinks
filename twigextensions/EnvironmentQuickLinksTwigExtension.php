<?php
namespace Craft;

/**
 * EnvironmentQuickLinksTwigExtension
 *
 * @author    Sam Goddard <sam@madebykind.com>
 * @copyright Copyright (c) 2018, Kind
 * @see       https://github.com/madebykind/craft.environmentquicklinks
 * @package   craft.plugins.environmentquicklinks
 * @since     1.0
 */
class EnvironmentQuickLinksTwigExtension extends \Twig_Extension
{

    /**
     * Returns an array to be merged into Twig's global variables.
     *
     * @return array The globals defined by this extension
     */
    public function getGlobals()
    {
        $globals['environmentQuickLinks'] = array(
            'showLabel' => craft()->environmentQuickLinks->getShowLabel(),
            'labelColor' => craft()->environmentQuickLinks->getLabelColor(),
            'devUrl' => craft()->environmentQuickLinks->getDevUrl(),
            'stagingUrl' => craft()->environmentQuickLinks->getStagingUrl(),
            'liveUrl' => craft()->environmentQuickLinks->getLiveUrl(),
        );
        return $globals;
    }

    /**
     * Returns the Twig extension name.
     *
     * @return string
     */
    public function getName()
    {
        return 'EnvironmentQuickLinks';
    }
}
