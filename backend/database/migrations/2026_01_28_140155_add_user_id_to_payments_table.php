<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::table('payments', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->nullable()->after('id');
    });

    // Fill temporary user_id = 1 for all old rows
    DB::table('payments')->update(['user_id' => 1]);

    // Now add the foreign key
    Schema::table('payments', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


public function down()
{
    Schema::table('payments', function (Blueprint $table) {
        $table->dropColumn('user_id');
    });
}

};
