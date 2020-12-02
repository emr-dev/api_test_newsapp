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