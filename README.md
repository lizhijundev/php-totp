# PHP TOTP函数库
TOTP（Time-based One-Time Password），基于时间同步，主要通过一个时间因素来实现验证，它的生成依靠当前时间点与基准时间（如UNIX时间戳）的算法，从而生成出一个唯一的密码。

## 安装
```
$ composer require lizhijun/totp
```

## 使用
```
use Lizhijun\PhpTotp\OtpAuthenticator;

$des = new Des3("123456789012345678901234","12345678");

$des->encrypt("Hello world");

$des->decrypt("");
```