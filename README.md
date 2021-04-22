# BetaTestMarvel API

API REST para teste de proeficiencia da [Beta Sistemas](https://betasistemas.com/beta/)

Desde já agradeço a oportunidade. E parabenizo pela elaboração do teste, que é objetivo, simples, e ao mesmo tempo desafiador.

Documentação para acesso via API:
* [**Configurações**](#configs)
* [**Métodos**](#methods)
* [**Respostas**](#responses)
* [**Rotas**](#routes)

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
|---|---|
| `GET` | /characters | | <details><summary>`name`</summary> Lista personagens por nome igual ou parecido </details> `comic` `movie` `serie` `limit` `offset` | Lista os personagens disponíveis. |