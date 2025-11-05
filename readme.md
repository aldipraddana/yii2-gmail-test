# Yii2 Gmail Tester

Sebuah utilitas sederhana untuk menguji konfigurasi SMTP (Gmail) pada aplikasi Yii2.

## Fitur
- Mengirim email menggunakan konfigurasi SMTP yang dimasukkan lewat form.
- Tampilan sederhana untuk verifikasi pengaturan.

## Persyaratan
- PHP sesuai kebutuhan Yii2.
- Yii2 framework terpasang.

Tambahkan method berikut pada controller Yii Anda, lalu panggil kelas GmailTest:

```php
public function actionGmailTest()
{
    return \aldi\gmail\GmailTest::index();
}