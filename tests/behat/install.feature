Feature: Moodle Web Installation

  Scenario: Verify successful installation of Moodle
    Given I am on "http://localhost:8080/moodle"

    # First page: Choose a language
    And I should see "Installation"
    And I should see "Choose a language"
    And I should see "Please choose a language for the installation. This language will also be used as the default language for the site, though it may be changed later."
    And I press "Next"

    # Second page: Confirm paths
    And I should see "Confirm paths"
    And I press "Next"

    # Choose database driver
    And I fill in "dbtype" with "pgsql"
    And I press "Next"

    # Database settings
    When I fill in "dbhost" with "localhost"
    When I fill in "dbname" with "test"
    When I fill in "dbuser" with "test"
    When I fill in "dbpass" with "test"
    And I press "Next"

    # Configuration completed: --> We only see this part if Moodle could not save the config.php
    # And I should see "Configuration completed"
    # And I press "Next"

    # Installation
    And I should see "Have you read these conditions and understood them?"
    And I press "Continue"

    # Server checks
    And I should see "Server checks"
    And I press "Continue"

    # All modules installation.
    And I press "Continue"

    # Admin user account.
    And I should see "On this page you should configure your main administrator account"
    And I fill in "email" with "admin@moodle.com"
    And I fill in "newpassword" with "Web1nstall123!"
    And I press "Update profile"

    # Site home settings.
    And I fill in "s__fullname" with "site test"
    And I fill in "s__shortname" with "sitetest"
    And I fill in "s__supportemail" with "admin@moodle.com"
    And I fill in "s__noreplyaddress" with "admin@moodle.com"
    And I press "Save changes"

    # Installation finished.
    And I should see "Welcome, admin!"
