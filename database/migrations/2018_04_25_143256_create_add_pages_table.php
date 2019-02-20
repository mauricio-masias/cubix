<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('pages', function($table) {
            $table->string('page_title',100);
            $table->string('page_subtitle',100);
            $table->string('page_available',100);
            $table->text('page_footer');
            $table->string('page_pdf',200);
            $table->text('page_og');
            $table->text('page_card'); 
            $table->tinyInteger('page_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('pages', function($table) {
            $table->dropColumn('page_active');
        });
    }
}

 