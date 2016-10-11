# City A.M. Developer Technical Test

## Contents

1. [City A.M. Repository](https://github.com/mstnorris/CityAM)
2. [readme](readme.md)
3. [Installation](installation.md)
4. [Instructions](instructions.md)

## Instructions

### Artisan Command

```
php artisan rss:parse
```

The command takes in an optional argument called 'feed' in the shape of a URL (the location of the City A.M. RSS Feed you wish to parse - by default it is the provided news.xml, but it does work with your others too should you wish).

```
rss
  rss:parse            Reads the specified City A.M. RSS feed and stores the data
```

### Routes

**/news**

View the paginated news articles. This is set to 5 by default. See 'app/Http/Controllers/ArticleController.php'. 

**/**

Displays the welcome page.

**/readme**

Displays the formatted repository Readme.

**/installation**

Displays the installation instructions. I guess if you're reading this in the browser then you've got it working already!

**/instructions**

It's this file.