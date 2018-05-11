<?php
/**
 * Sprout Reports plugin for Craft CMS 3.x
 *
 * Powerful custom reports.
 *
 * @link      barrelstrengthdesign.com
 * @copyright Copyright (c) 2017 Barrelstrength
 */

namespace barrelstrength\sproutreportsusers;

use barrelstrength\sproutbase\app\reports\services\DataSources;
use barrelstrength\sproutreportsusers\integrations\sproutreports\datasources\Users;
use craft\base\Plugin;
use yii\base\Event;
use craft\events\RegisterComponentTypesEvent;
use Craft;

class SproutReportsUsers extends Plugin
{
    public function init()
    {
        parent::init();

        Event::on(DataSources::class, DataSources::EVENT_REGISTER_DATA_SOURCES, function(RegisterComponentTypesEvent $event) {

            $isCraftPro = (Craft::$app->getEdition() == Craft::Pro);

            if ($isCraftPro == true) {
                $event->types[] = Users::class;
            }

        });
    }
}
