# Laravel-Action
Laravel-Action 是将CURD业务分离的概念包

# Installation
Install the package via composer: ```composer require crazycodes/laravel-action```

Register the service provider in ```config/app.php```

```
'providers' => [
    // [...]
   CrazyCodes\ActionServiceProvider::class,
],
```
You may also register the ```Action``` facade:
```
'aliases' => [
    // [...]
    'Action' => CrazyCodes\Facades\Action::class,
],
```

# Usage
需要先继承Action方法
```
namespace CrazyCodes\Action;

class CreateUser extends Action
{

}
```

继承的Action准备了两个方法

## before
```
public function before($request)
{
    return $request;
}
```
Action被调用的同时会直接调用before方法执行。

## after
```
public function after($request)
{
    return [];
}

```
可以选择不声明after方法。after主要用于调用其他Action
