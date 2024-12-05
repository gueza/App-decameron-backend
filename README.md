# php.ini
extension=curl
extension=mbstring
extension=openssl
extension=pdo_mysql
extension=pdo_pgsql
extension=zip
extension=fileinfo

1. php artisan migrate
1.1 php artisan migrate:rollback
1.2 php artisan migrate:reset
2. php artisan db:seed
3. php artisan serv

# ENV
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=decameron-hotel
DB_USERNAME=postgres
DB_PASSWORD=12345

# Routes
## Accommodations
- GET|HEAD  api/accommodations => AccommodationController@list
- GET|HEAD  api/accommodations-by-room-type => AccommodationController@getAccommodationsByRoomType

## City
- GET|HEAD  api/city => CityController@list

## Hotels
- GET|HEAD  api/hotels => HotelController@list
- POST      api/hotels => HotelController@store
- PUT       api/hotels/{id} => HotelController@update
- DELETE    api/hotels/{id} => HotelController@delete

## RoomType
- GET|HEAD  api/room-type => RoomTypeController@list

## Rooms
- GET|HEAD  api/rooms => RoomController@list
- POST      api/rooms => RoomController@store
- GET|HEAD  api/rooms-by-hotel => RoomController@getRoomsByHotel
- PUT       api/rooms/{id} => RoomController@update
- DELETE    api/rooms/{id} => RoomController@delete

