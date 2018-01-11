<?php
namespace Craft;

/**
 * EnvironmentQuickLinksService
 *
 * @author    Sam Goddard <sam@madebykind.com>
 * @copyright Copyright (c) 2018, Kind
 * @see       https://github.com/madebykind/craft.environmentquicklinks
 * @package   craft.plugins.environmentquicklinks
 * @since     2.0
 */
class EnvironmentQuickLinksService extends BaseApplicationComponent
{

    /**
     * Returns the show label bool
     *
     * @return bool
     */
    public function getShowLabel()
    {
        $showLabel = craft()->config->get('showLabel', 'environmentquicklinks');
        return is_bool($showLabel) ? $showLabel : false;
    }

    /**
     * Returns the current full URL
     *
     * @return bool
     */
    public function getCurrentEnvUrl()
    {
        return craft()->request->getHostInfo();
    }

    /**
     * Returns the dev URL, or null if none is set
     *
     * @return string
     */
    public function getDevUrl() {
        return craft()->config->get('devUrl', 'environmentquicklinks');
    }

    /**
     * Returns the staging URL, or null if none is set
     *
     * @return string
     */
    public function getStagingUrl() {
        return craft()->config->get('stagingUrl', 'environmentquicklinks');
    }

    /**
     * Returns the live Url, or null if none is set
     *
     * @return string
     */
    public function getLiveUrl() {
        return craft()->config->get('liveUrl', 'environmentquicklinks');
    }

    /**
     * Get the end segment of the current URL without the env details suffix
     *
     * @return string|null
     */
    public function getSegments()
    {
        return craft()->request->getRequestUri();
    }

    /**
     * Returns the environment label background color, or null if none is set
     *
     * @return string|null
     */
    public function getLabelColor()
    {
        return craft()->config->get('labelColor', 'environmentquicklinks');
    }

    /**
     * Includes the environment link switcher data as a visual banner
     */
    public function addLabel()
    {
        $devUrl = $this->getDevUrl();
        $stagingUrl = $this->getStagingUrl();
        $liveUrl = $this->getLiveUrl();
        $currentEnvUrl = $this->getCurrentEnvUrl();
        $segments = $this->getSegments();
        $labelColor = $this->getLabelColor();
        $showLabel = $this->getShowLabel();

        if ($showLabel){

            // Include the default styles
            craft()->templates->includeCssResource('environmentquicklinks/environmentquicklinks.css');
            craft()->templates->includeJsResource('environmentquicklinks/environmentquicklinks.js');

            // Create the wrapping div for the environmentslinks-bar
            craft()->templates->includeHeadHtml('<div class="envquicklinks-bar">');

                // Don't show dev link when on dev env
                if ($currentEnvUrl != $devUrl & !empty($devUrl)) {
                    craft()->templates->includeHeadHtml('<a target="_blank" class="envquicklinks-bar__link" href="' . $devUrl . $segments . '"> dev</a>');
                }
                // Don't show staging link when on staging env
                if ($currentEnvUrl != $stagingUrl & !empty($stagingUrl)) {
                    craft()->templates->includeHeadHtml('<a target="_blank" class="envquicklinks-bar__link" href="' . $stagingUrl . $segments . '"> staging</a>');
                }
                // Don't show live link when on live env
                if ($currentEnvUrl != $liveUrl & !empty($liveUrl)) {
                    craft()->templates->includeHeadHtml('<a target="_blank" class="envquicklinks-bar__link" href="' . $liveUrl . $segments . '"> live</a>');
                }

                craft()->templates->includeHeadHtml('<a href="#" class="envquicklinks-bar__toggle">[ - ]</a>');

            // Close the wrapping div
            craft()->templates->includeHeadHtml('</div>');

            // Optionally override the label color
            if (!empty($labelColor))
            {
                craft()->templates->includeCss('.envquicklinks-bar { background-color: '. $labelColor . '; } .envquicklinks-bar a { background-color: '. $labelColor . '; }');
            }
        }
    }
}
