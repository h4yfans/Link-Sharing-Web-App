## Synopsis

Small Reddit clone with Laravel 5.2

## Installation

Step by step:
Add this line your Homestead.yaml file 
```
    - map: reddit.dev
      to: /home/vagrant/PATH_TO_VM/reddit/public
```

In your Homestead.yaml file, add this line on your ```databases``` section
```
    - reddit
```


```
composer install 
command php artisan migrate
```

# DP Pattern

http://dbpatterns.com/documents/58109dae1514b404853d8c35/
