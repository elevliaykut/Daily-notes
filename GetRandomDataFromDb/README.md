<hr></hr>

#### inRandomOrder()

- Düşünelimki db den rastgele bir data çekmek istiyoruz. Bunu laravel de inRandomOrder() fonksiyonu ile kolayca yapabiliyoruz.

    O zaman user tablosundan rastgele bir kayıt çekelim.

        $randomUser = DB::table('users')
                ->inRandomOrder()
                ->first();

- Eğer istersek tabiki bir şarta bağlı olarak ta çekebiliriz. Rastgele bir kullanıcı çekerken status' u active olan ve yaşı 20 olan kullanıcılar arasından rastgele bir kullanıcı çekelim ama bu sefer model kullanalım.

        $randomUser = User::where('status',"active")->where('age',20)
                    ->inRandomOrder()
                    ->first();

<hr></hr>