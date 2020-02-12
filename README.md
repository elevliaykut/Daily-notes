# 💫 Daily-notes
Gün içinde Development yaparken öğrendiğim her şeyi buraya yazmaya karar verdim. Bu şey de olabilir; karşılaştığım hataların çözüm yollarıda olabilir. Ona şimdi emin olamadım.😀
#### O zaman başlayalım 🚀

<hr></hr>

### WEB SERVİS MİMARİLERİ
Veri akışının platform bağımsız gerçekleşebilmesi için bir web servis mimarisine ihtiyaç duyulmaktadır. Bu veri akışının HTTP üzerinden sağlanması Remote Procedure Call olarak isimlendirilir.

2 çeşit web servis mimarisi mevcuttur.

### 1- REST WEB SERVİS MİMARİSİ

JSON,XML,TXT,HTML gibi veri tiplerinin gönderilmesini destekleyen web servis mimarilerini REST mimariler denir.En kullanışlı web servis mimarisidir.

Rest Web servis mimarisi literatürüne uygun yazılan web servis mimarilerine RESTful web servis olarak adlandırılır.

### 2- SOAP WEB SERVİS MİMARİSİ

Sadece XML veri tiplerini destekleyen yapıya SAOP web servis mimarileri denir.

#### RESTFUL WEB SERVİS MİMARİSİ

##### ✔️ A.) Get Metodu:
Get metodu kullanıldığında istekler URL kısmından gönderilir.Gönderilen bilgiler URL' de görüntüleneceği için güvenlik riski yüksek bir metottur.

##### ✔️ B.) Post Metodu:
POST metodunda da istekler URL kısmından gönderilir.Ancak GET metoduna göre hızlı ve daha güvenilirdir.

##### ✔️ C.) Put Metodu:
PUT metodunu bir formdaki verinin tamamını göndermek gerektiği durumda kullanırız.

##### ✔️ D.) Patch Metodu:
Patch metodunu ise bir formda client sadece email' ini güncellemek isterse bu durumda patch kullanılmalıdır.
Patch gereken ksımda PUT metodu kullanılmalıdır ki RESTful mimarisine bağlı kalmış olalım.

##### ✔️ E.) Delete Metodu:
DELETE metodu URL de belirlediğimiz resource'un tamamı ile silinmesi için kullanılan bir metottur.

<hr></hr>

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

<hr></hr>


