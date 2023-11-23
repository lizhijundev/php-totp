# PHP TOTP函数库

[![Tests](https://github.com/lizhijundev/php-totp/actions/workflows/tests.yml/badge.svg)](https://github.com/lizhijundev/php-totp/actions/workflows/tests.yml)

TOTP（Time-based One-Time Password），基于时间同步，主要通过一个时间因素来实现验证，它的生成依靠当前时间点与基准时间（如UNIX时间戳）的算法，从而生成出一个唯一的密码。

## 安装
```
$ composer require lizhijun/totp
```

## 调用

### 生成 TOTP 密钥 和 二维码字符串

```php
use Lizhijun\TOTP\TOTPAuth;

public function generateTOTP(){
    $auth = new TOTPAuth();
    $secret = $auth->createSecret();
    $qrcodeStr = $auth->getQrcodeStr($secret, 'zhansan', 'org');
    
    // todo: qrcode提供前端生成二维码
}
```

### 验证 TOTP密钥
```php
use Lizhijun\TOTP\TOTPAuth;

public function bindTOTP(){

    $secret = ''; // 上一步生成的 TOTP 密钥
    $code = '';   // 用户使用二次密码验证器扫码后，验证器生成`一次性数字验证密码`
    $auth = new TOTPAuth();
    
    $verifyResult = $auth->verifyCode($secret, $code);
    if ($verifyResult) {
        // todo: 验证成功 绑定 TOTP 密钥到用户信息
    } else {
    }
}


```

+ 用户使用 `密码验证器` 扫码后，验证器生成`一次性数字验证密码`
+ 服务端验证用户 `一次性数字验证密码` 和 `TOTP 密钥`
+ 生成密钥可持久化到关联用户表

# 验证器推荐
应用市场搜索并安装以下任一验证器：
+ 谷歌身份验证器 (Google Authenticator)
+ 微软身份验证器 (Microsoft Authenticator)


## 参考
+ [RFC 6238：《 TOTP: Time-Based One-Time Password Algorithm》](https://datatracker.ietf.org/doc/html/rfc6238)
+ [RFC 6238 翻译](https://rfc2cn.com/rfc6238.html)