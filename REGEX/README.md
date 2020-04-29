### Laravel Regex Validation Kullanımı

Geliştirdiğimiz uygulamada 1/0 işleminin yapıldığını düşünelim.Yada boş bir input' un database kaydedildiği, email gerektiren input'a isim yada sayı girildiğide olabilir.Gerekli kontroller yapılmazsa ne olur ? İşte bu noktada işin içine Regex,Validation giriyor.Kullanımı laravel de oldukça basit ve gerekli formlarda kesinlikle kullanılmalıdır.

✔️ Laravel de validation kullanımı

Aşağıda ki store fonksiyonumuzda gelen request deki formda title,body inputunun girilmesi gerektiği ve title' ın max 255 karakter olduğu belirtilmiştir.

<img src="./images/validation.png" width="400" height="350"/>

https://laravel.com/docs/5.8/validation

✔️ Laravel de regex kullanımı

                $this->validate(request(), [
                        'projectName' => 'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
                ];

Regex'in için geçerli değişken değerleri;

        myproject123
        myproject
        MyProject

Regex'in kabul etmediği değerler;

        123myproject
        !myproject
        myproject 123
        my project
        my project123

https://stackoverflow.com/questions/42577045/laravel-5-4-validation-with-regex