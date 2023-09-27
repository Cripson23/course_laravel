<?php

    use App\Models\Car;
    use App\Models\Tag;
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
        Schema::create('tag_car', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tag::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Car::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_car');
    }
};
