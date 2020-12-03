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

## Получение источников(категорий) из API 

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