# 環境構築手順

1. `git clone git@github.com:posse-ap/hackathon-202202-sample.git`

2. `cd hackathon-202202-sample`

3. `cp ./src/.env.dev ./src/.env`

3. `docker-compose build --pull`

4. `docker-compose up -d`

5. `docker-compose exec php bash`

6. `cd ichiichiban`

7. `composer install`

8. `php artisan migrate:refresh --seed`

9. `npm install`

10. `npm run dev`

11. Please try to access `http://localhost:80`

```
※CSSについて
 src/resources/sassにSASSファイルが入っています
 修正した場合は`npm run dev`を再実行することで
 src/public/css/app.css に出力され、画面に反映されます
``` 

# teamdev-2022-posse1-team1B

## MVPとは
顧客のニーズを満たす最小限のプロダクトです。

## miroのURL
https://miro.com/app/board/uXjVOHj7f5o=/

## FigmaのURL
https://www.figma.com/file/TJMMQBKs9Yp0zCCOIzMnO0/fertilizer?node-id=0%3A1


## Goggle DriveのURL
https://drive.google.com/drive/folders/0APws78aegjXNUk9PVA


## ヒアリングで聞くこと
https://docs.google.com/spreadsheets/d/1yvUp7z4U2lNOQcGzEY08wmigLCScsLjS9Ja_ptR1kOg/edit#gid=0

## 要件定義のお勉強
https://docs.google.com/presentation/d/1sWmmI1Y8h8ZH45-TLHb0iXSFcRXj6R1eh9esqBX6X_E/edit#slide=id.gce243821c3_0_260

## チーム開発キックオフ資料
https://docs.google.com/presentation/d/1EVVXT5Sd8KNqqcGqWtywhzxlgqhCaXOOQvXLBdvytok/edit#slide=id.gce243821c3_0_260
