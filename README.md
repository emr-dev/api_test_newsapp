# API_NEWS
 Тестовое API для курсовой работы новостного приложения по предмету "Проектирование мобильных клиент-серверных приложений (09.04.04) "


## INFO
Хост на который нужно отправлять запросы: www.api-news.emrdev.ru


## Authorization 
 Для подключения к API нужно отправить запрос с токеном в headers "X-AUTH-TOKEN"
 
 Пример curl:
 ```
CURLOPT_HTTPHEADER => array(
    'X-AUTH-TOKEN:  _API_TOKEN_',
    'Cookie: PHPSESSID=f0t9jjq43jnqtephd3nho5du1j'
  ),
```

## Получение источников(категорий) через API 

Запрос:

 ```
GET: api-news.emrdev.ru/api/category 

X-AUTH-TOKEN: YOU_API_KEY
```

Ответ:

```
{
    "status": "ok",
    "data": [
        {
            "id": 1,
            "name": "Kommersant.ru",
            "description": "Источник"
        },
        {
            "id": 2,
            "name": "RBC",
            "description": "Источник"
        },
        {
            "id": 3,
            "name": "Championat.com",
            "description": "Источник"
        },
 
    ]
}
```


## Получение новостей через API 

Запрос:

 ```
GET: aapi-news.emrdev.ru/api/article?category_id=1

Если не указывать category_id, то вернутся все новсти

X-AUTH-TOKEN: YOU_API_KEY
```


Ответ:

```
{
    "status": "ok",
    "count": 1,
    "data": [
        {
            "id": 3,
            "title": "В Москве по делу о госизмене арестовали преподавателя МФТИ - Новости – Происшествия - Коммерсантъ",
            "category": {
                "id": 1,
                "name": "Kommersant.ru",
                "description": "Источник"
            },
            "image": "https://im.kommersant.ru/SocialPics/4596205_26_0_172847667",
            "description": "Подробнее на сайте",
            "date": {
                "date": "2020-12-03 15:55:00.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        }
    ]
}
```