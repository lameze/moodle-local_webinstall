<?php
namespace Context;

use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Mink\Exception\UnsupportedDriverActionException;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Behat\Context\Context;

class FeatureContext extends MinkContext implements Context {
    /**
     * @AfterStep
     */
    public function takeScreenshotAfterFailedStep(AfterStepScope $scope)
    {
        if (99 === $scope->getTestResult()->getResultCode()) {
            $this->saveScreenshot(null, __DIR__ . '/../../build/behat/');
        }
    }

    public function saveScreenshot($filename = null, $filepath = null)
    {
        if (!$this->getSession()->getDriver() instanceof \Behat\Mink\Driver\Selenium2Driver) {
            throw new UnsupportedDriverActionException('Taking screenshots is not supported by %s, use Selenium2Driver instead.', $this->getSession()->getDriver());
        }

        if (null === $filename) {
            $filename = 'behat_screenshot_' . date('YmdHis') . '.png';
        }

        $this->getSession()->getDriver()->getScreenshot($filepath . $filename);
    }
}
