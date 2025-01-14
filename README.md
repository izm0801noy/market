# market  
  
## 環境構築  
Dokerビルド   　
1.git cloneリンク git@github.com:izm0801noy/market.git  
  
2.docker-compose up d -build  
  
Laravel環境構築     　
1.docer-compose exec php bash  
2.composer install  
3..env.exampleファイルから.envを作成し、環境変数を変更  
4.php artisan key:generate  
5.php artisan migratte  
6.php artisan db:seed  
  
## 使用技術（実行環境）  
･PHP v8.3.12   
･Laravel　8.83.27  
･MySQL8.0  


  
## ER図
![market](https://github.com/user-attachments/assets/107a5a1f-2a80-47db-ac7b-f0f224632813)  
  
## URL  
･環境開発:http://localhost/  
･phpMyAdmin:：http://localhost:8080/  
