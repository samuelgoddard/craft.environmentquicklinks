<?php
namespace Craft;

/**
 * EnvironmentQuickLinksPlugin
 *
 * @author    Sam Goddard <sam@madebykind.com>
 * @copyright Copyright (c) 2018, Kind
 * @see       https://github.com/madebykind/craft.environmentquicklinks
 * @package   craft.plugins.environmentquicklinks
 * @since     1.0
 */
class EnvironmentQuickLinksPlugin extends BasePlugin
{

    /**
     * @return string
     */
    public function getName()
    {
        return "Environment Quick Links";
    }

    /**
     * Return the plugin description
     *
     * @return string
     */
    public function getDescription()
    {
        return "Easily jump between environment links from the front end";
    }

    /**
     * Return the plugin developer's name
     *
     * @return string
     */
    public function getDeveloper()
    {
        return "Kind";
    }

    /**
     * Return the plugin developer's URL
     *
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://madebykind.com';
    }

    /**
     * Return the plugin's Documentation URL
     *
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/madebykind/craft.environmentquicklinks';
    }

    /**
     * Return the plugin's current version
     *
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * Return the plugin's db schema version
     *
     * @return string|null
     */
    public function getSchemaVersion()
    {
        return '0.0.0.0';
    }

    /**
     * Return the plugin's db schema version
     *
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return '';
    }

    /**
     * Return whether the plugin has a CP section
     *
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     * Renders the environment label, if this is an authenticated CP request
     */
    function init() {

        /*
         * We only want to add the environment label after a user is logged in.
         */
        if (craft()->userSession->isLoggedIn())
        {
            craft()->environmentQuickLinks->addLabel();
        }

    }

    /**
     * Registers the Twig extension
     *
     * @return EnvironmentQuickLinksExtension
     */
    public function addTwigExtension()
    {
        Craft::import('plugins.environmentquicklinks.twigextensions.*');
        return new EnvironmentQuickLinksTwigExtension();
    }

}
