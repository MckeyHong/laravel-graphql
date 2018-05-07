## Laravel GraphQL

使用　[Folkloreatelier / laravel-graphql](https://github.com/Folkloreatelier/laravel-graphql) 練習實作 `GraphQL`。

## Installation

1.  請先確保環境可正常運作 `Laravel 5.6`，並有 laravel 基本操作概念。
2.  新增資料庫 `laravel_graphql` (utf8mb4 / utf8mb4_unicode_ci)。
3.  複製 .env 設定檔，並更改設定檔內的資料庫使用者帳號及密碼

```
$ cp .env.example .env
```

4.  使用 composer 安裝專案所需套件

```
$ composer install
```

5.  產生該專案的 key

```
$ php artisan key:generate
```

6.  執行 migrate (產生專案所需的資料表)

```
$ php artisan migrate
```

7.  隨機產生 10 筆使用者資料

```
$ php artisan db:seed --class=UsersTableSeeder
```


## 使用範例說明

###  推薦安裝 chrome 套件 `GraphiQL`


* 取得使用者資料格式：

```
query FetchUsers($id: String) {
  users(id: $id) {
    id
    name
    email
  }
}

// 搜尋單一使用者資訊
Query Variables
{
  "id": 1
}
```

* 新增使用者資料格式：

```
mutation users {
  createUser(name: "James", email: "la_graphql@gmail.com.tw", password: "password") {
    id
    name
    email
  }
}
```


* 更新使用者電子信箱資料格式：

```
mutation users {
  updateUserEmail(id: "1", email: "la_graphql001@gmail.com.tw") {
    id
    name
    email
  }
}
```

* 更新使用者密碼資料格式：

```
mutation users {
  updateUserPassword(id: "1", password: "newpassword") {
    id
    name
    email
  }
}
```

## 參考文獻

- **[GraphQL](https://www.graphql.com/)**
- **[Folkloreatelier / laravel-graphql](https://github.com/Folkloreatelier/laravel-graphql)**


