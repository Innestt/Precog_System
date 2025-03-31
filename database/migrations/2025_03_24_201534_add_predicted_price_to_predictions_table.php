<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('predictions', function (Blueprint $table) {
            $table->decimal('predicted_price', 10, 2)->after('kmDriven');
        });
    }

    public function down()
    {
        Schema::table('predictions', function (Blueprint $table) {
            $table->dropColumn('predicted_price');
        });
    }
};
