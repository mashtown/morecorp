## Tasks

Create a Product Management System with two interfaces (Admin & Store front)

## How To Compile Assets

Unfortunately, I didn't use the Laravel mix for this project, just plain npm and gulp compiler.

In your command line, navigate to the Laravel public directory and install npm.

-[To compile styles only 
```bash
run gulp styles.
```
-[To compile scripts only 
```bash
run gulp scripts.
```
-[To watch for changes
```bash
run gulp watch
```

## Database seeder

I've included everything in the database\seeds\DatabaseSeeder.php.

You can seed your db by just php artisan db:seed