# 環境構築手順

1. `git clone git@github.com:posse-ap/teamdev-2022-posse1-team1B.git`

2. `cd teamdev-2022-posse1-team1B`

3. `cp ./src/.env.dev ./src/.env`

3. `docker-compose build --pull`

4. `docker-compose up -d`

5. `docker-compose exec php bash`

6. `cd teamdev/`

7. `composer install`

8. `php artisan migrate:refresh --seed`

9. `npm install skyway-js`

10. `npm install react-chat-elements --save`

11. `npm install @mui/material @emotion/react @emotion/styled`

12. `npm install @mui/x-data-grid`

13. `npm install`

14. `npm run dev`

15. `npm install`

16. `npm run watch`

17. Please try to access `http://localhost:80`

```
※CSSについて
 src/resources/sassにSASSファイルが入っています
 `npm run watch`を実行することでscssの内容が
 src/public/css/app.css に出力され、画面に反映されます
``` 
