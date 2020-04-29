### 1. Cross Site Request Forgery (CSRF)
### 1.a CSRF Nedir ?

Türkçe açılımı “Siteler Arası İstek Sahtekârlığı” şeklinde olan CSRF zafiyeti; web uygulamasını kullanmakta olan kullanıcıların istekleri dışında işlemler yürütülmesidir. Uygulamaya giden isteklerin hangi kaynaktan ve nasıl gönderildiği kontrol edilmeyen sistemlerde ortaya çıkan bu zafiyet, aslında uygulamayı kodlayan yazılımcıların gözünden kaçan bir ayrıntıdır diyebiliriz. Genelde CSRF veya XSRF şeklinde kısaltılan bu güvenlik açığı “Session Riding” olarak da bilinmektedir.

### 1.b CSRF ile ne gibi zararlar verilebilir ?

Bu güvenlik açığı ile verilebilecek zararlar uygulamayı kullanmakta olan kullanıcının yetkilerine bağlıdır. Yani bir sistem yöneticisinin hesabı ile standart kullanıcının hesapları üzerinden uygulanacak bir CSRF açığının vereceği zararın boyutları farklıdır. Bir örnek ile açıklamak gerekirse; Banka hesabını incelemekte olan birisinin aynı zamanda yan sekmede maillerini kontrol ettiğini düşünelim. Hedef kişi, saldırgan tarafından gönderilen zararlı bir bağlantıya tıkladığı zaman, hedef kullanıcı mail sekmesinde olmasına rağmen saldırgan, hedefin yan sekmesinde açık bulunan banka sayfasına ve verilerine erişebilir. Çünkü hedefin banka sayfasındaki oturumu halen aktif olduğu için saldırganın ihtiyacı olan bilgiler tarayıcıda halen mevcut durumdadır. Hedef kullanıcı oturumunu sonlandırmadığı sürece saldırgan kişi “para transferi, kredi çekme” gibi ciddi zararlara yol açabilecek işlemleri arka planda gizlice gerçekleştirebilir.

### 1.c Zafiyetli Kod & Güvenli Kod

Şu anda banka sisteminin POST methodunu kullandığını ve savunmasız talebin şuna benzediğini varsayalım:

        http://bankasitesi.com/transfer.do hedef_bankahesabı=MUSTAFA ve miktarı = 100

Böyle bir istek az önceki gibi standart A veya IMG etiketleri kullanılarak teslim edilemez, ancak bir FORM etiketi kullanılarak teslim edilebilir:

        <form action = “<nowiki> http://bankasitesi.com/transfer.do </nowiki>” method = “POST”>
              <input type = “hidden” name = “acct” value = “MUSTAFA” />
                <input type = “hidden” name = “amount” value = “100000” />
                <input type = “submit” value = “İndirimleri görüntüle” /> 
        </ Form>

Bu form, kullanıcının gönder düğmesine basmasını gerektirecektir, ancak bu, JavaScript kullanılarak otomatik olarak da çalıştırılabilir:

        <body onload = “document.forms [0] .submit ()”>
        <Form …

şeklinde bir dizi kod ile formun otomatik olarak gönderilmesi sağlanabilir.
Bu senaryonun önüne geçmek için isteklere, kullanılan formlara token bilgisi eklenilmelidir. Aynı senaryoyu token bilgisi ile çalışan bir sistemde tekrarlayalım:

        <form action = “<nowiki> http://bankasitesi.com/transfer.do&token=314asdq62643383279!%5028841971 </nowiki>” method = “POST”>

Bir önceki örnekten farklı olarak bu sefer gönderdiğimiz isteğe bir de anlık olarak ürettiğimiz benzersiz token bilgisini ekledik. Saldırgan bu tokeni tahmin edemeyeceği için bu güvenlik açığı üzerinden hedef kişiye saldıramaz.

### 1.d CSRF Zafiyeti Nasıl Tespit Edilir?

Kullanıcı tarafından gönderilen bir HTTP talebinin gerçek kullanıcı tarafından mı yoksa bir saldırgan tarafından mı gönderildiğini tespit etmek zordur. Web sitesine erişmeye çalışan bir kullanıcının kimliğini doğrulamak için sıkı önlemler alınabilir, fakat kullanıcılar aynı oturumda tekrar tekrar kimlik doğrulamak ile uğraşmak istemezler. Sistemde token yönteminin kullanılması, kimliğin arka planda otomatik olarak doğrulanmasını sağlar. Böylece kullanıcı kimlik doğrulama istekleriyle sürekli olarak rahatsız edilmez. Genelde CSRF açığını engellemek için sisteme giriş yapan kullanıcıya, her defasında farklı ve tahmin edilmesi güç “token” bilgisi verilir. Fakat bu token verisi oturum boyunca aynı kalmaz. Örneğin kullanıcının yüklediği her bir form için ayrı token bilgisi üretilir. Arkaplanda gerçekleşen bu olayda, sisteme giriş yapan kullanıcı token aldığını her ne kadar fark etmese de, yaptığı tüm işlemlerde bu token sistem tarafından kontrol edilir ve işlemin gerçekten kullanıcı tarafından yapıldığı doğrulanır. Eğer token veya buna benzer bir anahtar kontrolü yapılmazsa, arka planda gönderilen sahte bir istek ile gerçek kullanıcının gönderdiği istek ayırt edilemez. Bu durumda sistemin gelen tüm istekleri ayırt etmeksizin kabul etmesi gerekir ki bu büyük bir güvenlik zafiyetine sebep olur.

### 1.e CSRF Zafiyetine Karşı Alınabilecek Önlemler

✔️ Kullanıcının sisteme gönderdiği önemli talepler POST metodu ile alınmalıdır.

✔️ Siteler Arası Talep Sahteciliğini (CSRF) önlemek için en popüler yöntem, kullanıcıya rastgele üretilmiş eşsiz bir “token” bilgisi vermektir. CSRF Token veya Synchronizer Token olarak adlandırılan bu yöntem şu şekilde çalışır:
        - Web sunucusu bir token oluşturur. (Bu token işlem yapıldıkça yeniden üretilir.)
        - Token, formda gizli bir bilgi olarak depolanır.
        - Kullanıcı POST işlemini gerçekleştirir.
        - Token bilgisi POST verilerine dahil edilir.
        - Web uygulaması, sistem tarafından oluşturulan tokeni, talepte gönderilen token ile karşılaştırır.
        - Eğer token verileri eşleşirse, isteğin gerçek kullanıcı tarafından gönderildiği anlaşılır ve istek onaylanır.
        - Eşleşme yoksa, istek reddedilir. Bu sayede kötü niyetli istekler engellenmiş olur.

### 1.f CSRF açığının laravel'de kapatılması

Uygulamamızda kullanacağımız formları csrf alanı olarak belirlemeliyiz.

                <form method="POST" action="/profile">
                        @csrf
                        ...
                </form>
<hr></hr>