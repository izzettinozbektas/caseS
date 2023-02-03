cd site && cp .env.example .env && cd ..
docker-compose up -d
docker-compose exec app composer install
docker-compose exec app php artisan migrate
docker-compose exec app php passport:install
echo "Test Çalıştırılıyor"
docker-compose exec app php artisan test
echo "İşlem Başarılı Şekilde Tamamlandı"

