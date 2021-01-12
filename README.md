## 系統名稱 
### 巧克力購物網站


## 系統畫面

### 會員 - 商品區

<a href="https://i.imgur.com/jwiiz9y.png"><img src="https://i.imgur.com/jwiiz9y.png" title="source: imgur.com" /></a>

### 會員 - 購物車

<a href="https://i.imgur.com/SQvZGp4.png"><img src="https://i.imgur.com/SQvZGp4.png" title="source: imgur.com" /></a>

### 會員 - 訂單

<a href="https://i.imgur.com/IXJ2E3B.png"><img src="https://i.imgur.com/IXJ2E3B.png" title="source: imgur.com" /></a>

## 系統的主要功能

前台

- 商品區 
  Route::middleware(['auth:sanctum', 'verified'])
  ->get('/products', [ProductsController::class, 'index'])
  ->name('shop.index');
  [3A732036 葉軍佑](https://github.com/3A732036)

- 購物車 
  Route::middleware(['auth:sanctum', 'verified'])
  ->get('/cart', [CartsController::class, 'index'])
  ->name('cart.index');
  [3A732036 葉軍佑](https://github.com/3A732036)
  
  Route::middleware(['auth:sanctum', 'verified'])
  ->delete('/cart/{id}', [CartsController::class, 'destroy'])
  ->name('cart.destroy');
  [3A732036 葉軍佑](https://github.com/3A732036)
  
  Route::middleware(['auth:sanctum', 'verified'])
  ->post('/cartadd', [CartsController::class, 'store'])
  ->name('cart.add');
  [3A732036 葉軍佑](https://github.com/3A732036)

- 訂單 Route::middleware(['auth:sanctum', 'verified'])
  ->get('/order', [OrdersController::class, 'index'])
  ->name('order.index');
  [3A732036 葉軍佑](https://github.com/3A732036)

  Route::middleware(['auth:sanctum', 'verified'])
  ->post('/order', [OrdersController::class, 'store'])
  ->name('order.store');
  [3A732036 葉軍佑](https://github.com/3A732036)

後台
- 

## ERD

<a href="https://i.imgur.com/ImEDf48.png"><img src="https://i.imgur.com/ImEDf48.png" title="source: imgur.com" /></a>

## 關聯式綱要圖

<a href="https://i.imgur.com/vNMR9ld.jpg"><img src="https://i.imgur.com/vNMR9ld.jpg" title="source: imgur.com" /></a>



