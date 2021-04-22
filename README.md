# BetaTestMarvel API

API REST para teste de proeficiencia da [Beta Sistemas](https://betasistemas.com/beta/)

Desde já agradeço a oportunidade. E parabenizo pela elaboração do teste, que é objetivo, simples, e ao mesmo tempo desafiador.

Documentação para acesso via API:
* [**Configurações**](#configs)
* [**Métodos**](#methods)
* [**Respostas**](#responses)
* [**Rotas**](#routes)
* [**Parâmetros**](#params)

<a id="configs"></a>

## Configurações do projeto
Requisitos mínimos:
- [PHP ^7.2](https://www.php.net)
- [Mysql 5.5.5-10.4.17-MariaDB](https://www.mysql.com)
- [Composer](https://getcomposer.org)

Framework utilizado:
- [Laravel ^8.37](https://laravel.com/docs/8.x)
<br>

Primeiramente, ao abrir o projeto, lembre-se de instalar as dependências:
```
composer install
```

Após instalar as dependências, copie o arquivo `.env.example` e renomeie para `.env`, se preciso, faça as configurações necessárias e crie o banco de dados local em sua máquina .

Rode as migrations e os seeders para criar as tabelas e popular os campos nescessários:
```
php artisan migrate --seed
```
Existem factorys para teste, caso não queira usa-las, basta comentar a primeira linha da classe run de cada uma das seeders, ex:
![](https://i.imgur.com/fwUcbVU.png)

Todas as contas criadas devem passar por aprovação de um usuário administrador, que decidirá se o usuário será um editor ou um administrador, para isso, existe um administrador padrão para gerenciar a primeira conta criada, depois você pode remove-lo com o endpoint de remoção.
- Login no sistema (usuário admin padrão):
  - email: **adm@betasistemas.com**
  - Senha: **123**

<a id="methods"></a>

## Métodos
Todas as requisições seguem o seguinta padrão:
| Método | Descrição |
|---|---|
| `GET` | Retorna informações de um ou mais registros. |
| `POST` | Cria um novo registro. |
| `PUT` | Atualiza ou altera os dados de um registro. |
| `DELETE` | Remove um registro. |

<a id="responses"></a>

## Respostas
| Código | Descrição |
|---|---|
| `200` | Requisição executada com sucesso.|
| `401` | Dados de acesso inválidos.|
| `404` | Registro ou rota pesquisada não encontrada (Not found).|
| `422` | Erro de validação de campo ou fora do escopo definido para o campo.|

<a id="configs"></a>

## Endpoints
### Rotas Públicas
| Método | Endpoint | Parâmetros Requeridos | Parâmetros Opcionais | Resumo |
|---|---|---|---|---|
| `GET` | /characters | | [`name`](#name) [`comic`](#comic) [`movie`](#movie) [`serie`](#serie) [`limit`](#limit) [`offset`](#offset) | Lista id, nome, e capa, dos personagens disponíveis. |
| `GET` | /character/{id} | | | Retorna todas as informações do personagem selecionado pelo {id}. |
| `GET` | /character/{id}/comics | | [`limit`](#limit) [`offset`](#offset) | Retorna as HQ's em que o personagem selecionado pelo {id} participa. |
| `GET` | /character/{id}/movies | | [`limit`](#limit) [`offset`](#offset) | Retorna os filmes em que o personagem selecionado pelo {id} participa. |
| `GET` | /character/{id}/series | | [`limit`](#limit) [`offset`](#offset) | Retorna as séries em que o personagem selecionado pelo {id} participa. |
| `GET` | /character/{id}/images | | [`limit`](#limit) [`offset`](#offset) | Retorna as imagens em que o personagem selecionado pelo {id} está. |
| `GET` | /comics | | [`title`](#title) [`character`](#character) [`limit`](#limit) [`offset`](#offset) | Lista id, título, e capa, das HQ's disponíveis. |
| `GET` | /comic/{id} | | | Retorna todas as informações da HQ selecionada pelo {id}. |
| `GET` | /comic/{id}/characters | | | Retorna os personagens que participam da HQ selecionada pelo {id}. |
| `GET` | /comic/{id}/images | | [`limit`](#limit) [`offset`](#offset) | Retorna as imagens em que a HQ selecionada pelo {id} está. |
| `GET` | /movies | | [`title`](#title) [`character`](#character) [`limit`](#limit) [`offset`](#offset) | Lista id, título, e capa, dos filmes disponíveis. |
| `GET` | /movie/{id} | | | Retorna todas as informações do filme selecionado pelo {id}. |
| `GET` | /movie/{id}/characters | | | Retorna os personagens que participam do filme selecionado pelo {id}. |
| `GET` | /movie/{id}/images | | [`limit`](#limit) [`offset`](#offset) | Retorna as imagens em que o filme selecionado pelo {id} está. |
| `GET` | /series | | [`title`](#title) [`character`](#character) [`limit`](#limit) [`offset`](#offset) | Lista id, título, e capa, das séries disponíveis. |
| `GET` | /serie/{id} | | | Retorna todas as informações da série selecionada pelo {id}. |
| `GET` | /serie/{id}/characters | | | Retorna os personagens que participam da série selecionada pelo {id}. |
| `GET` | /serie/{id}/images | | [`limit`](#limit) [`offset`](#offset) | Retorna as imagens em que a série selecionada pelo {id} está. |
| `POST` | /auth/login | `email` `password` | | Cria o token de altenticação pelo email e senha do usuário. |
| `POST` | /auth/register | `name` `email` `password` `password_confirm` | | Cadastra um usuário. |
### Rotas Autenticadas
| Método | Endpoint | Parâmetros Requeridos | Parâmetros Opcionais | Resumo |
|---|---|---|---|---|
| `GET` | /user | | | Retorna as informações do usuário logado. |
| `POST` | /auth/logout | | | Destrói o token de altenticação do usuário. |
#### Rotas para editor
| Método | Endpoint | Parâmetros Requeridos | Parâmetros Opcionais | Resumo |
|---|---|---|---|---|
| `POST` | /character | `name` `real_name` `resume` | `cover_url` `image` `id_comics` `id_movies` `id_series` | Adiciona um novo personagem. |
| `PUT` | /character/{id} | | `name` `real_name` `resume` `cover_url` `image` `id_comics` `id_movies` `id_series` | Altera dados de um personagem pelo {id}. |
| `DELETE` | /character/{id} | | | Remove o personagem pelo {id}. |
| `POST` | /comic | `title` `published_date` `writer` `penciler` `resume` | `cover_url` `image` | Adiciona uma nova HQ. |
| `PUT` | /comic/{id} | | `title` `published_date` `writer` `penciler` `resume` `cover_url` `image` | Altera dados de uma HQ pelo {id}. |
| `DELETE` | /comic/{id} | | | Remove a HQ pelo {id}. |
| `POST` | /movie | `title` `release_date` `director` `resume` | `cover_url` `image` | Adiciona um novo filme. |
| `PUT` | /movie/{id} | | `title` `release_date` `director` `resume` `cover_url` `image` | Altera dados de um filme pelo {id}. |
| `DELETE` | /movie/{id} | | | Remove o filme pelo {id}. |
| `POST` | /serie | `title` `release_date` `director` `resume` | `cover_url` `image` | Adiciona uma nova série. |
| `PUT` | /serie/{id} | | `title` `release_date` `director` `resume` `cover_url` `image` | Altera dados de uma série pelo {id}. |
| `DELETE` | /serie/{id} | | | Remove a série pelo {id}. |
#### Rotas para administrador
| Método | Endpoint | Parâmetros Requeridos | Parâmetros Opcionais | Resumo |
|---|---|---|---|---|
| `GET` | /users | | `name` `limit` `offset` `orderBy` | Lista os usuários disponíveis. |
| `PUT` | /approve/{id} | `type` | | Altera o tipo do usuário pelo {id} |
| `DELETE` | /user/{id} | | | Remove o Usuário pelo {id} |




