<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoryAction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_category_product', function (Blueprint $table) {
            $table->string('category_action');
            $table->string('category_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_category_product', function (Blueprint $table) {
            $table->dropColumn('category_action');
            $table->dropColumn('category_image');
        });
    }
}
