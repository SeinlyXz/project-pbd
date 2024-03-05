# Instruksi Penggunaan .htaccess

Untuk menggunakan .htaccess dalam pengaturan server Apache, pastikan Anda mengikuti langkah-langkah berikut:

## Aktifkan .htaccess

1. Buka XAMPP dan masuk ke folder konfigurasi Apache.
2. Temukan file `httpd.conf`.
3. Cari bagian yang memiliki kode berikut:

    ```apache
    <Directory "/Applications/MAMP/bin/xampp">
        Options Indexes MultiViews
        AllowOverride None <------ Ubah ke All
        Order allow,deny
    </Directory>
    ```

4. Ubah `AllowOverride None` menjadi `AllowOverride All`.
5. Simpan perubahan dan restart server Apache.

Setelah mengikuti langkah-langkah di atas, .htaccess sekarang akan aktif dan dapat digunakan untuk mengatur konfigurasi server Anda sesuai kebutuhan.

## Catatan

Pastikan untuk berhati-hati saat melakukan perubahan pada konfigurasi server, dan pastikan Anda memahami dampak dari setiap perubahan yang Anda buat.
