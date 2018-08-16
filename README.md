# Laravel-Action
Laravel-Action 将CUD独立成模块调用

# Installation
下载composer包: ```composer require crazycodes/laravel-action```

注入提供者到 ```config/app.php```

```
'providers' => [
    // [...]
   CrazyCodes\ActionServiceProvider::class,
],
```
注册 ```Action``` facade:
```
'aliases' => [
    // [...]
    'Action' => CrazyCodes\Facades\Action::class,
],
```
发布配置文件
```
php artisan vendor:publish --provider=CrazyCodes\ActionServiceProvider
```
配置项就一个
```
actionNamespace //设置你的action所在的命名空间
```

# 使用
继承Action方法获取规范的命名
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

## 成员变量
```
public $beforeResultName = 'beforeResult';
public $afterResultName = 'afterResult';
```
用于获取返回的结果

# 调用
可以通过Facade调用
```
Action::use('YourAction',发送的参数);
```
或者使用全局函数
```
laravel_action('YourAction',发送的参数);
```

# 获取结果
得到的结果默认是对象。可以转换格式
```
function toJson();
function toArray();
```
结果展示
Array
```
array:2 [
  "beforeResult" => array:1 [
    0 => "aaa"
  ]
  "afterResult" => []
]
```
JSON
```
{"beforeResult":["aaa"],"afterResult":[]}
```

# 后续
demo和测试正在出，稍安勿躁