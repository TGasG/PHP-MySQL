# PHP dan MySQL

Ini adalah contoh program menggunakan PHP dan MySQL.

# Cara pakai

1. Buatlah sebuah database 'webprog' pada MySQL masing-masing kemudian buatlah sebuah table seperti pada file [model/create-learn.sql](model/create-learn.sql)

    ```
    CREATE TABLE learn (
        id int PRIMARY KEY AUTO_INCREMENT, language varchar(255), status varchar(4), score int DEFAULT 0
        );
    ```

    ##### (Optional)

    Setelah membuat table learn kalian dapat juga memasukan data dummy pada file [model/insert-data-dummy.sql](model/insert-data-dummy.sql) langkah ini bersifat opsional untuk data isian awal saja.

    ```
    INSERT INTO learn (
        language, status, score
        ) VALUES
    ('HTML', 'pass', 90),
    ('CSS', 'pass', 87),
    ('Javascripts', 'fail', 65),
    ('PHP', 'fail', 69);
    ```

2. Sesuaikan isian pada file [lib/connect.php](lib/connect.php) sesuai dengan host, user, password, dan database masing-masing.
