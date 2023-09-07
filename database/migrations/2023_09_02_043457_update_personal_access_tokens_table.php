<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('personal_access_tokens', function (Blueprint $table) {
        $table->index(['tokenable_type', 'tokenable_id'], 'personal_access_tokens_tokenable_index')
              ->collation('utf8_unicode_ci');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
