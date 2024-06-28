<?php
namespace Context;

use Behat\MinkExtension\Context\MinkContext;
use Behat\Behat\Context\Context;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context {

    /**
     * @Given I am on the moodle site to be installed
     */
    public function iAmOnTheMoodleSiteToBeInstalled() {
        $baseurl = getenv('MOODLE_SITE_URL') ?: 'http://localhost';

        $this->visitPath("{$baseurl}");
    }

    /**
     * @When I fill in the database type
     */
    public function iFillInTheDatabaseType() {
        $dbtype = getenv('DB_TYPE') ?: 'pgsql';

        $this->fillField('dbtype', $dbtype);
    }

    /**
     * @When I fill in the database settings
     */
    public function iFillInTheDatabaseSettings() {
        $dbhost = getenv('DB_HOST') ?: 'localhost';
        $dbname = getenv('DB_NAME') ?: 'moodle';
        $dbuser = getenv('DB_USER') ?: 'postgres';
        $dbpass = getenv('DB_PASS') ?: 'moodle';

        $this->fillField('dbhost', $dbhost);
        $this->fillField('dbname', $dbname);
        $this->fillField('dbuser', $dbuser);
        $this->fillField('dbpass', $dbpass);
    }
}
