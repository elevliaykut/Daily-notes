<hr></hr>

#### array_push

Döngü içinde db 'den kayıtları çekerken, gelen kayıtları bir diziye yazmak isterseniz array_push fonksiyonunu kullanabiliriz.

    $post_array = array();

    foreach($users as $user) {
        $user_posts = UserPost::where('id',$user->id)->first();
        array_push($post_array,$user_post);
    }

- Yukarıda bir kullanıcının attığı postları array_push fonksiyonu ile bir array e yazdık. Artık eğer api yazıyorsanız sizde şuan benim gibi direkt bu array'i response olarak dönebilirsiniz.

<hr></hr>