# City A.M. Developer Technical Test

## Contents

1. [City A.M. Repository](https://github.com/mstnorris/CityAM)
2. [readme](readme.md)
3. [Installation](installation.md)
4. [API Documentation](instructions.md)
5. [Report](report.md) 

## Overview

This technical test is intended to test your ability to structure code, process data, and present it.

We are looking for:

1. Well structured, testable, commented code
2. Accompanying automated tests
3. Use of the correct tools for specific tasks

## Task
Using best practices, build a Laravel application that reads an RSS feed, stores the data, and presents this to the user.

- You should use the latest version of Laravel
- The RSS feed to use is:
  http://www.cityam.com/feeds/sections/news.xml
- You should write an Artisan command to store the RSS feed items in the database, using your choice of database structure
- You should include a route “/news” in your application that will display these items. Use Bootstrap to apply some basic styling to this page

Whilst we use Vagrant to set up local environments, for this test it is acceptable to skip this and use a locally installed LAMP stack or Homestead VM. Please provide the source code archived in a zip/tar file, or hosted on a public VCS such as GitHub.