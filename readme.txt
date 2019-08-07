## acties:

let op paarse \ of een \ die voor een \$ staat...
die moet je niet mee kopieren

1. gebruik pubs.sql om database aan te maken

2.  gebruik "composer create-project laravel/laravel pubs --prefer-dist" om pubs laravel app aan te maken in www map

3.  verander ".env" met volgende instellingen:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=pubs
    DB_USERNAME=root
    DB_PASSWORD=

4.  maak ".htaccess" file aan met volgende instellingen:

###
Step 1: Rename File
In first step it is very easy and you need to just rename file name. you have to rename server.php to index.php at your laravel root directory.
server.php
INTO
index.php

Step 2: Update .htaccess
first of all you have to copy .htaccess file and put it laravel root folder. You just copy .htaccess file from public folder and then update bellow code:

.htaccess

Options -MultiViews -Indexes
RewriteEngine On

# Handle Authorization Header

RewriteCond %{HTTP:Authorization} .
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

# Redirect Trailing Slashes If Not A Folder...

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_URI} (.+)/\$
RewriteRule ^ %1 [L,R=301]

# Handle Front Controller...

RewriteCond %{REQUEST_URI} !(.css|.js|.png|.jpg|.gif|robots.txt)$ [NC]
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_URI} !^/public/
RewriteRule ^(css|js|images)/(.*)$ public/$1/$2 [L,NC]

5. Maak een model (database tabel connectie enkelvoud in naam) en controller

"php artisan make:controller TitlesController --model=Title"

6. pas model aan:
   open model (app/title.php)
   indien tabel naam niet hetzelfde als file naam: "protected $table = 'titles';"

7. maak route in /routes/web.php
   bijv: Route::resource('titles','TitlesController');

8. pas controller aan:
   bijv: /http/Controllers/TitlesController.php
   pas aan:  
   public function index()
   {
   return title::all();
   }

9. in plaats van rechtstreeks return data een view return
   public function index()
   {
   $data = array(
            // gebruik model en eloquent
            //'afdelingen' => Afdeling::all(),
            // als je wilt sorteren (bijvoorbeeld)
            'afdelingen' => Title::orderBy('title', 'asc')->paginate(8),
            'title' => 'Lijst met titels' 
        );
        
        return view('titles.index')->with($data);
   }

10. maak map titles in /resources/views
    daarbinnen create.php edit.php enz. zie voorbeelden.
11. maak autorisatie
    php artisan make:auth

12. om te werken met forms:
    Run:
    composer require laravelcollective/html
    Add to the app.php providers array:
    Collective\Html\HtmlServiceProvider::class,
    Add to the app.php aliases array:
    'Form' => Collective\Html\FormFacade::class,
    'Html' => Collective\Html\HtmlFacade::class,

13. om 14 uit te kunnen voeren moet je het volgende doen:
    in de config/database.php file, and make sure your database connection shows 'strict' => false

14. om de kolommen updated_at en created_at toe te voegen
    gebruik commando:
    php artisan make:migration add_kolommen_author
    edit bestand datum_add_kolommen_author in database/migrations:
    public function up()
    {
    Schema::table('authors', function($table) {
        $table->dateTime('created_at');
        $table->dateTime('updated_at');
    });
    }
    en down:
    public function down()
    {
    Schema::table('authors', function($table) {
        $table->dateTime('created_at');
        $table->dateTime('updated_at');
    });
    }

    dan het commando:
    php artisan migrate

    doe dit ook voor andere tabellen

15. laravel verwacht een id veld met de naam id en type int
    pas de database bestanden aan zodat het werkt:
    class Author extends Model
    {
    protected $casts = ['au_id' => 'string'];
    protected $primaryKey = 'au_id';
    }

om alles te controleren:
composer dumpautoload
composer clearcache
php artisan clear-compiled
eventueel...
composer update
