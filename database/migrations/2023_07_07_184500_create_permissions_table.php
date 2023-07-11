<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('permissions')->insert([
            ['id' => 1, 'name' => 'categories'],
            ['id' => 2, 'name' => 'orders'],
            ['id' => 3, 'name' => 'notifications'],
            ['id' => 4, 'name' => 'customers'],
            ['id' => 5, 'name' => 'privacies'],
            ['id' => 6, 'name' => 'cities'],
            ['id' => 7, 'name' => 'socials'],
            ['id' => 8, 'name' => 'admins'],
            ['id' => 9, 'name' => 'complains'],
            ['id' => 10, 'name' => 'employers'],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
