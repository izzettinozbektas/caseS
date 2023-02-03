## Laravel Docker Case

- Repoyu indir
- Docker bilgisayarınızda olmalı
- Proje dizininde  kurulum.sh (./kurulum.sh) çalıştır

> http://localhost:8001 den projeyi çalışır
>
> http://localhost:5050 den pgadmin
>
phpmyadmin giriş bilgileri
- giriş bilgileri ->
- `email: admin@admin.com` 
- `password: admin`
- Add New Server dedikten name kısmına `localhost`
- connection kısmındada hostname addres `postgres`
- database kısmına `caseDb` username `root` password `root`
- Pgadmin kullanabilirsiniz.


## Dockersız kullanım
- Repoyu indir
- Proje dizinine sırası ile 
- `cd site && cp .env.example .env && cd ..`
- `composer install`
- `php artisan migrate`
- `php artisan passport:install`
- `php artisan test`


#### Not
- proje dizinindeki case.postman_collection.json postman'a import edip endpointleri deneye bilirisiniz
 

#### Kullanılan Teknolojiler
- Laravel 9x^
- Docker
- Php8.1
- PostgresSql
- PGAdmin
- Repository Pattern