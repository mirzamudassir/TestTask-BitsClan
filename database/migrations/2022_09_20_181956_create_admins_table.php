<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('email');
            $table->text('password');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('admins')->insert(
        array(
            'name' => 'Mudassir Mirza',
            'email' => 'mudassir@email.com',
            'password' => '$2y$10$OGe979Y9l.cIgOtMT47Tau5EjWfWJKqIPBQSsfg3yVvncCq1u3ZAK',
            'created_at' => '2022-09-20 06:53:39'

        )
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
