#### orderBy(asc,desc)

Db deki kayıtları artan/azalan değerlere göre sıralamak istersek asc/desc
ifadelerini kullanabiliriz.

Örneğin; post tablosundan user_id si 5 olan kullanıcının en güncel paylaşımlarını çekmek istersek

        $posts = Post::where('user_id',5)
            ->orderBy('created_at','desc')
            ->get();

yada paylaştığı eski postlardan başlayarak listelelemek istersek

        $posts = Post::where('user_id',5)
            ->orderBy('created_at','asc')
            ->get();
