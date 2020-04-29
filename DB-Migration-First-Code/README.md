### Laravel database migration

Laravel de migration dosyaları database/migrations dizininin altında tutulur.

Örnek olarak uçuş bilet bilgilerinin tutulduğu migration için hazırlanmış aşağıdaki class verilebilir.

        <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;

        class CreateFlightsTable extends Migration
        {
        /**
        * Run the migrations.
        *
        * @return void
        */
                public function up()
                {
                        Schema::create('flights', function (Blueprint $table) {
                        $table->bigIncrements('id');
                        $table->string('name');
                        $table->string('airline');
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
                        Schema::drop('flights');
                }
        }

Yukarıdaki class'ı database migrate etmek için

                php artisan migrate

komutu kullanılır.

https://laravel.com/docs/5.8/migrations