Building a blog using Laravel and VueJS in order to learn VueJS. Since I'm using this as a learning process, if you take a look and use anything, all I ask is that you [let me know what you think!](mailto:tim@kortsmit.com)

To install:

1. Clone
2. Configure for homestead and `vagrant reload --provision`
3. Add host file entry. I suggest using `picturesque.local` if you'd like to use BrowserSync
4. Create .env using .env.example and configure to own environment
5. `php artisan key:generate`
6. Create a local database schema
7. `composer install`
8. `npm install` or if on Windows `npm install --no-bin-links`
9. `gulp`
10. `php artisan migrate`
11. `php artisan db:seed`
12. Load it up!

Open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
