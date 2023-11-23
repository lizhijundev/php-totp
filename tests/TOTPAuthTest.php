<?php


use Lizhijun\TOTP\TOTPAuth;
use PHPUnit\Framework\TestCase;


final class TOTPAuthTest extends TestCase
{
    // 测试生成令牌
    public function testCreateSecret(){
        try{
            $auth = new TOTPAuth();
            $sec1 = $auth->createSecret();
            $this->assertSame(16, strlen($sec1));

            $testLen = 20;
            $sec2 = $auth->createSecret($testLen);
            $this->assertSame($testLen, strlen($sec2));
        } catch (\Exception $e) {
            $this->expectException($e->getMessage());
        }
    }

    public function testGetCode(){
        try {
            $auth = new TOTPAuth();

            $secret = $auth->createSecret();
            // echo "secret is ". $secret . PHP_EOL;

            $code = $auth->getCode($secret);
            // echo "code is ". $code . PHP_EOL;

            $verifyResult = $auth->verifyCode($secret, $code);

            $this->assertSame(true, $verifyResult);
        } catch (\Exception $e) {
            $this->expectException($e->getMessage());
        }
    }



}