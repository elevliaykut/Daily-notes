#### Sql Queries kullanımı

Query laravel'de sql sorgusu yazmamıza olanak sağlayan bir sistemdir. Eloquent sisteminden farklı olarak düz sorguları yazmamıza olanak sağlamaktadır. Aralarındaki en önemli fark büyük verilerde query daha hızlı çalışmaktadır.

Basit bir örnek ile hemen daha iyi anlayalım.

Profil tablosundaki verileri, isme göre filtreleyip verileri 10 lu şekilde sayfalandırarak çekmek istediğimizi düşünelim.

    public function filter(){
       $name = Request::get('name');
       $profil = Profil::where('name', 'like', '%' . $name .'%')
            ->paginate(10);
        return response()::json(
            'profiles' => $profil
        )

    }
