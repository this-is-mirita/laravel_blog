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
