### Authentication ve Authorization (Kimlik doğrulama ve Yetkilendirme)

Authentication,bir kullanıcının herhangi bir kaynağa erişimde kimliğinin doğrulanması işlemidir.

Kullanıcıya Kimsin sorusu sorulur? Bu sorunun cevabı genellikle kullanıcının kullanıcı  adı ve  şifre şeklinde cevap vermesiyle yanıtlanır.

        - Authentication = login + password (who you are)

Güvenliğin daha yüksek tutulması gereken durumlarda kullanıcı adı ve şifre ile beraber dijital sertifikalar kullanılarak güvenliğin arttırılması sağlanabilir.

Authentication,authorization'dan önce gelmektedir.

Authorization ise,kimliği doğrulanan kullanıcının erişmek istediği kaynak üzerindeki yetkilerini tanımlar.

Dosya-klasör erişimleri,erişim saatleri,ayrılmış alan miktarı v.b.

Authorization işleminin iki aşaması mevcuttur.

- 1) Sistem yöneticisi erişilecek kaynak üzerinde izinleri tanımlar

- 2) Erişilecek kaynağın üzerinde bulunduğu sistem veya uygulama kaynağa erişileceği zaman izinleri doğrular.

          - Authorization = permissions (what you are allowed to do)

Peki authentication işlemi yapılmadan authorization işlemi yapılamaz mı?

Kimsin sorusunun sorulmaması demek herhangi birisi anlamına gelir. Dolayısı ile kimliği doğrulanmayan yani anonim kullanıcılara izin verileceği durumlarda bu işlem gerçekleştirilir.
