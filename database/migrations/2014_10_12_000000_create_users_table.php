<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('customer');
            $table->boolean('is_subscribed')->default(false);

            // New fields for ISP flow
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('package_type')->nullable(); // Silver, Ultra, etc.
            $table->integer('package_price')->default(0);
            $table->string('status')->default('pending'); // pending, active, rejected
            $table->string('customer_id')->nullable()->unique(); // BN-001, etc.
            $table->date('active_until')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
