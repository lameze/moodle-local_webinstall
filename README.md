# Moodle Web Installation Testing

This repository contains the testing suite for the Moodle web installation process.

## Pre-requisites
- A web server with PHP and a database server installed, as if you were going to install Moodle manually.
- Composer installed.
- The Moodle codebase, you can clone the code from the Moodle repository.

## Getting Started
```bash
# Get Moodle code, you could select another version branch (skip this if you already got the code)
git clone -b main git://git.moodle.org/moodle.git moodle

# Clone the web install repository.
git clone git@github.com:lameze/moodle-webinstall.git
cd moodle-webinstall

# Install the dependencies.
composer install

# URL to the moodle site to be installed.
export MOODLE_SITE_URL="http://localhost/moodle"

# Database connection details, ensure the database is created before running the tests.
export DB_TYPE=pgsql
export DB_HOST=localhost
export DB_NAME=moodle
export DB_USER=postgres
export DB_PASS=moodle

# Ensure the site to be installed has write permissions so moodle can write the config.php file.
sudo chown -R www-data:www-data /path/to/moodle
  
# Run the tests
/vendor/bin/behat
```
The test execution usually takes around 54 seconds to complete, the common issues that might prevent the tests from passing are:
- The database connection details are incorrect.
- The moodle site URL is incorrect.
- The moodle site directory does not have write permissions and Moodle is unable to write the config.php file.
