<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKolommenAuthor extends Migration
{
    /**
     * Run the migrations.
     * @return void 
     */
    public function up()
    {
        Schema::table('authors', function($table) {
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('authors', function($table) {
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }
}