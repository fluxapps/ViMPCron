<?php

require_once __DIR__ . "/../vendor/autoload.php";

use srag\DIC\ViMP\DICTrait;
use srag\Plugins\ViMP\Cron\ViMPJob;

/**
 * Class ilViMPCronPlugin
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilViMPCronPlugin extends ilCronHookPlugin
{

    use DICTrait;

    const PLUGIN_CLASS_NAME = ilViMPPlugin::class;
    const PLUGIN_ID = "xvmpcron";
    const PLUGIN_NAME = "ViMPCron";
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * ilViMPCronPlugin constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * @inheritDoc
     */
    public function getPluginName() : string
    {
        return self::PLUGIN_NAME;
    }


    /**
     * @inheritDoc
     */
    public function getCronJobInstance(/*string*/ $a_job_id)/*: ?ilCronJob*/
    {
        switch ($a_job_id) {
            case ViMPJob::CRON_JOB_ID:
                return new ViMPJob();

            default:
                return null;
        }
    }


    /**
     * @inheritDoc
     */
    public function getCronJobInstances() : array
    {
        return [
            new ViMPJob()
        ];
    }
}
