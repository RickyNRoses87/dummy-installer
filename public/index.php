<?php

use Database\CreateCategoriesTable;
use Database\CreateContentMediaTable;
use Database\CreateContentMetaTable;
use Database\CreateContentsTable;
use Database\CreateLicensesTable;
use Database\CreateMenusTable;
use Database\CreateModulesTable;
use Database\CreatePagesTable;
use Database\CreatePreferencesTable;
use Database\CreateTemplatesTable;
use Database\CreateUserGroupsTable;
use Database\CreateUsersTable;
use Database\CreateWidgetsTable;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Installer\Installer;
use Installer\Operation;

require __DIR__.'/../bootstrap/setup.php';

// $query = 'CREATE TABLE user(id INT(11) AUTO INCREMENT PRIMARY KEY);';
// $builder = new Builder($capsule->getConnection());



$installer = new Installer($capsule);

$schema = $capsule->getConnection()->getSchemaBuilder();


// operations
// return [
// 	// w/ callable specified
// 	'create_categories_table' => CreateCategoriesTable::class,

// ];

// try
// TODO: move definitions to a config file
$create = new Operation(
    'create_categories_table',
    new CreateCategoriesTable($schema));
$contents = new Operation(
    'create_contents_table',
    new CreateContentsTable($schema));
$content_media = new Operation(
    'create_content_media_table',
    new CreateContentMediaTable($schema));
$content_meta = new Operation(
    'create_content_meta_table',
    new CreateContentMetaTable($schema));
$licenses = new Operation(
    'create_licenses_table',
    new CreateLicensesTable($schema));
$menus = new Operation(
    'create_menus_table',
    new CreateMenusTable($schema));
$modules = new Operation(
    'create_modules_table',
    new CreateModulesTable($schema));
$pages = new Operation(
    'create_pages_table',
    new CreatePagesTable($schema));
$preferences = new Operation(
    'create_preferences_table',
    new CreatePreferencesTable($schema));
$templates = new Operation(
    'create_templates_table',
    new CreateTemplatesTable($schema));
$users = new Operation(
    'create_users_table',
    new CreateUsersTable($schema));
$user_groups = new Operation(
    'create_user_groups_table',
    new CreateUserGroupsTable($schema));
$widgets = new Operation(
    'create_widgets_table',
    new CreateWidgetsTable($schema));

// TODO: add CreateCategoriesTable::class support


// dd($operation);

// $installer->register($create);
// $installer->register($contents);
// $installer->register($operation);
// dd($installer->getOperations());
// $installer->register($content_media);
// $installer->register($content_meta);
// $installer->register($pages);
// $installer->register($preferences);
// $installer->register($templates);
// $installer->register($users);
// $installer->register($user_groups);
$installer->register($widgets);

$result = $installer->run();

dd($result);



// widgets





// $operation->run(); // runs the operation
// $installer->next()->run();// runs next operation



// $installer->run();






$operation = new Operation(
    'create_categories_table',
    function () use ($schema) {
        $schema->create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('title');
            $table->text('contents');
            $table->integer('flagship')->default(0);

            $table->dateTime('created');
            $table->integer('createdby'); // TODO: change this name.

            $table->dateTime('modified');
            $table->integer('modifiedby');

            $table->smallInteger('enabled')->default(1);

            $table->string('import_id', 40);
            

            // It should have something simpler.
            // $table->timestamps();

            // ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2
        });
    });

// dd($operation);
