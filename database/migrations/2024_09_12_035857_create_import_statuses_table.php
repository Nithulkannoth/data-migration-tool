<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('import_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('progress')->default(0); // Progress as a percentage
            $table->string('status')->default('pending'); // Status (e.g., pending, in_progress, completed)
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('import_statuses');
    }
}
