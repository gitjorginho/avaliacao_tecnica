<p class="has-line-data" data-line-start="0" data-line-end="1">Instalação</p>
<p class="has-line-data" data-line-start="3" data-line-end="11">1 - renomear arquivo .env.example para .env<br>
2 - criar um banco com nome laravel (charset utf8mb4)<br>
3-  $ cd avaliacao_tecnica<br>
3 - $ composer install<br>
4 - $ php artisan migrate<br>
5 - $ php artisan key:generate<br>
6 - $ php artisan db:seed<br>
7 - Pronto, agora pode acessar com usuario: ‘admin’ e senha: ‘admin’</p>
<p class="has-line-data" data-line-start="13" data-line-end="20">obs.: no arquivo .env voce pode configurar sua conexao com o banco como segue:<br>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=laravel<br>
DB_USERNAME=root<br>
DB_PASSWORD=</p>
