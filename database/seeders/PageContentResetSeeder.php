<?php

namespace Database\Seeders;

/**
 * Re-applies database/seeders/content to every page, overwriting edits made
 * in the admin panel. Run deliberately:
 * php artisan db:seed --class=PageContentResetSeeder
 */
class PageContentResetSeeder extends PageSeeder
{
    protected bool $overwrite = true;
}
