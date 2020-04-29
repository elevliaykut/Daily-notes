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