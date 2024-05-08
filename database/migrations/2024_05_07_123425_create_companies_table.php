<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->integer('companyId')->autoIncrement()->primary();
            $table->string('companyName', 128);
            $table->string('companyRegistrationNumber', 16);
            $table->date('companyFoundationDate');
            $table->string('country', 64);
            $table->string('zipCode', 64);
            $table->string('city', 64);
            $table->string('streetAddress', 128);
            $table->float('latitude', 5);
            $table->float('longitude', 5);
            $table->string('companyOwner', 64);
            $table->smallInteger('employees');
            $table->string('activity', 32);
            $table->string('active', 5);
            $table->string('email', 64);
            $table->string('password', 64);
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent();
        });

        DB::unprepared("
            create trigger date_check_update before update on companies
            for each row
            begin
             if (old.companyFoundationDate <> new.companyFoundationDate) then
               signal SQLSTATE VALUE '45000' SET MESSAGE_TEXT = 'Cant change the companyFoundationDate';
             end if;
            end;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
        DB::unprepared('DROP TRIGGER `date_check_update`');
    }
};
