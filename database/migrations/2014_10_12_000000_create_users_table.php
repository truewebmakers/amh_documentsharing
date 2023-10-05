<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_pic')->nullable();
            $table->string('phone',15)->nullable(); 
            $table->string('city',100)->nullable();  
            $table->string('alternative_phone',15)->nullable();
            $table->string('company_address')->nullable();
            $table->string('street_address',15)->nullable();
            $table->string('suburb')->nullable();
            $table->string('state')->nullable();
            $table->string('post_code',15)->nullable();
            $table->string('company_name')->nullable();
            $table->string('australian_bussiness_number',)->nullable();
            $table->string('number_of_emp')->nullable();
            $table->string('estimated_anunal_revenue',)->nullable();
            $table->string('date_of_est')->nullable();
            $table->string('bussiness_type')->nullable();
            $table->string('bussiness_category',)->nullable();
            $table->string('website_url',)->nullable();
            $table->string('service_hour',)->nullable();
                      
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
