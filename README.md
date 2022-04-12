# 開発のフロー
1.ブランチは、feature/issue番号で切る(例）feature/41
  
2.プルリクエストを出したら、だいきorまゆなにレビューしてもらう。

3.LGTMをもらったら、だいきorまゆながマージする。

## ⚠レビューなしでマージ禁止


## ⚠issue番号と合致したブランチを使用する。


## ⚠不要な変更が入らないようにプルリクエストを出す際に確認する。



----

# teamdev-2022-posse1-team1B

## MVPとは
顧客のニーズを満たす最小限のプロダクトです。

## バックログのURL
https://docs.google.com/spreadsheets/d/14Tzry6vR5MDXCyXmSo8Mhk05u9zpoyu4FT1xdyhM5yk/edit#gid=1382531569

## FigmaのURL
https://www.figma.com/file/TJMMQBKs9Yp0zCCOIzMnO0/fertilizer?node-id=0%3A1

## Goggle DriveのURL
https://drive.google.com/drive/folders/0APws78aegjXNUk9PVA

## チーム開発キックオフ資料
https://docs.google.com/presentation/d/1EVVXT5Sd8KNqqcGqWtywhzxlgqhCaXOOQvXLBdvytok/edit#slide=id.gce243821c3_0_260




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
