<?php

use App\Models\ClassSchedule;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('conducted_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ClassSchedule::class)->constrained()->cascadeOnDelete();
            $table->boolean('is_done')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conducted_classes');
    }
};
