# Описание проекта: Блог-платформа

## Общая информация
Проект — современный блог с продвинутой архитектурой на Laravel. Включает полноценный функционал для публикации постов, управления категориями, комментариями, лайками и личным кабинетом пользователя. Есть админ-панель для управления всеми ресурсами.

---

## Ключевые особенности

### 1. Основная публичная часть
- **Главная страница (main.index)** — список всех последних публикаций.
- **Категории (categories.index)** — просмотр списка категорий, каждая с собственным списком постов (categories.category.index).
- **Посты (post.index, post.show)** — просмотр списка постов и детальной страницы конкретного поста с комментариями и лайками.
- Добавление комментариев и лайков реализовано через защищённые маршруты, доступные только авторизованным пользователям.

### 2. Личный кабинет пользователя (personal.*)
- Главная личная страница — обзор личной активности.
- Любимые посты — просмотр и удаление понравившихся постов.
- Комментарии пользователя — список комментариев с возможностью редактирования и удаления.

### 3. Административная панель (admin.*)
- Управление всеми основными сущностями:
  - Категории (CRUD)
  - Теги (CRUD)
  - Посты (CRUD)
  - Пользователи (CRUD)
- Панель защищена посредниками `auth`, `admin` и `verified` для безопасного доступа только админам.

---

## Техническая структура маршрутов

### Основные маршруты

```php
Route::name('main.')->group(function () {
    Route::get('/', MainController::class)->name('index'); // Главная страница
});

Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', CategoryIndexController::class)->name('index'); // Список категорий

    Route::prefix('{category}/posts')->name('category.')->group(function () {
        Route::get('/', CategoryPostIndexController::class)->name('index'); // Посты категории
    });
});

Route::prefix('post')->name('post.')->group(function () {
    Route::get('/', PostIndexController::class)->name('index'); // Все посты
    Route::get('/{post}', MainShowController::class)->name('show'); // Просмотр поста

    Route::prefix('{post}/comment')->name('comment.')->group(function () {
        Route::post('/', StoreCommentController::class)->name('store'); // Добавление комментария
    });

    Route::prefix('{post}/likes')->name('likes.')->group(function () {
        Route::post('/', StoreLikeController::class)->name('store'); // Лайк поста
    });
});
```

## Личный кабинет пользователя

```php
Route::prefix('personal')->name('personal.')->middleware(['auth', 'verified'])->group(function () {
    Route::name('main.')->group(function () {
        Route::get('/', PersonalMainController::class)->name('index'); // Главная персональная страница
    });
    Route::name('liked.')->prefix('liked')->group(function () {
        Route::get('/', PersonalLikedController::class)->name('index'); // Список лайкнутых постов
        Route::delete('/{post}', DeleteLikedController::class)->name('delete'); // Удаление из лайков
    });
    Route::name('comment.')->prefix('comment')->group(function () {
        Route::get('/', PersonalCommentController::class)->name('index'); // Список комментариев пользователя
        Route::get('/{comment}/edit', PersonalEditCommentController::class)->name('edit'); // Редактирование комментария
        Route::patch('/{comment}', PersonalUpdateCommentController::class)->name('update'); // Обновление комментария
        Route::delete('/{comment}', PersonalDeleteCommentController::class)->name('delete'); // Удаление комментария
    });
});
```
## Админ-панель
```php

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::name('main.')->group(function () {
        Route::get('/', AdminMainController::class)->name('index'); // Главная админки
    });

    Route::name('category.')->prefix('category')->group(function () {
        Route::get('/', AdminCategoryController::class)->name('index');
        Route::get('/create', CreateController::class)->name('create');
        Route::post('/', StoreController::class)->name('store');
        Route::get('/{category}', ShowController::class)->name('show');
        Route::get('/{category}/edit', EditController::class)->name('edit');
        Route::patch('/{category}', UpdateController::class)->name('update');
        Route::delete('/{category}', DeleteController::class)->name('delete');
    });

    Route::name('tag.')->prefix('tags')->group(function () {
        Route::get('/', AdminTagController::class)->name('index');
        Route::get('/create', AdminTagCreateController::class)->name('create');
        Route::post('/', AdminTagStoreController::class)->name('store');
        Route::get('/{tag}', AdminTagShowController::class)->name('show');
        Route::get('/{tag}/edit', AdminTagEditController::class)->name('edit');
        Route::patch('/{tag}', AdminTagUpdateController::class)->name('update');
        Route::delete('/{tag}', AdminTagDeleteController::class)->name('delete');
    });

    Route::name('post.')->prefix('posts')->group(function () {
        Route::get('/', AdminPostController::class)->name('index');
        Route::get('/create', AdminPostCreateController::class)->name('create');
        Route::post('/', AdminPostStoreController::class)->name('store');
        Route::get('/{post}', AdminPostShowController::class)->name('show');
        Route::get('/{post}/edit', AdminPostEditController::class)->name('edit');
        Route::patch('/{post}', AdminPostUpdateController::class)->name('update');
        Route::delete('/{post}', AdminPostDeleteController::class)->name('delete');
    });

    Route::name('user.')->prefix('users')->group(function () {
        Route::get('/', AdminUserController::class)->name('index');
        Route::get('/create', AdminUserCreateController::class)->name('create');
        Route::post('/', AdminUserStoreController::class)->name('store');
        Route::get('/{user}', AdminUserShowController::class)->name('show');
        Route::get('/{user}/edit', AdminUserEditController::class)->name('edit');
        Route::patch('/{user}', AdminUserUpdateController::class)->name('update');
        Route::delete('/{user}', AdminUserDeleteController::class)->name('delete');
    });
});
```

# Технологии и особенности

- Использован Laravel с четкой структурой и именованием маршрутов (Route Groups, Namespaces).
- Роуты организованы по функциональным блокам: публичная часть, личный кабинет, админ-панель.
- Для доступа к личному кабинету и админке используется Middleware аутентификации и авторизации (`auth`, `verified`, `admin`).
- Используются контроллеры с методом `__invoke` для простоты и чистоты кода.
- CRUD операции для категорий, тегов, постов и пользователей в админке.
- Взаимодействие с комментариями и лайками для улучшения UX.
- Гибкая архитектура позволяет легко расширять проект.

---

# Регистрация, авторизация, подтверждение email и восстановление пароля

- Реализована регистрация пользователей с валидацией данных.
- Авторизация с проверкой email и пароля через стандартные механизмы Laravel.
- Включена проверка подтверждения email — после регистрации на почту пользователя отправляется письмо с ссылкой для активации аккаунта. Доступ к личному кабинету разрешён только подтверждённым пользователям (middleware `verified`).
- Для тестирования отправки писем используется сервис Mailtrap — безопасный SMTP-сервер, который перехватывает все исходящие письма, не отправляя их реальным пользователям, что удобно для разработки и отладки.
- Реализована функция восстановления пароля через email: пользователь может запросить сброс пароля, после чего ему на почту приходит письмо со ссылкой для установки нового пароля.
- После успешного восстановления пароль обновляется, и пользователь может войти под новым паролем.
- Защита маршрутов, требующих аутентификации и подтверждения email, обеспечивается через middleware `auth` и `verified`.

---

# Итог

















































