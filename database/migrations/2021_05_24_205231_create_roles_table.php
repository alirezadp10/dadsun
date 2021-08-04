<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $driver = Schema::connection($this->getConnection())->getConnection()->getDriverName();

            if ('sqlite' === $driver) {
                $table->bigInteger('role_id')->unsigned()->default('');
            } else {
                $table->bigInteger('role_id')->unsigned();
            }

            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('users',['role_id']);
        Schema::dropIfExists('roles');
    }
}
