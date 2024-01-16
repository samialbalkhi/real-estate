<?php

use App\Models\User;
use App\Models\AccountType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_account_types', function (Blueprint $table) {
            $table
                ->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table
                ->foreignIdFor(AccountType::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_account_types');
    }
};
