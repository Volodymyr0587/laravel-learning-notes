<?php

use App\Enums\ResourceType;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            // $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();

            $table->string('title');
            $table->string('image')->nullable();
            $table->string('link_to_tutorial');
            $table->string('link_to_resource')->nullable();
            $table->string('resource_name')->nullable();
            $table->enum('resource_type', array_column(ResourceType::cases(), 'value'))->nullable();
            $table->text('description')->nullable();
            $table->string('project_folder')->nullable();
            $table->string('database_name')->nullable();
            $table->string('link_to_github_repo')->nullable();
            $table->string('link_to_source_code')->nullable();
            $table->string('link_to_source_materials')->nullable();
            $table->boolean('completed');

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
