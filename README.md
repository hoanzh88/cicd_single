# ci/cd: ví dụ đơn giản

### Vào github -> actions
Tạo 1 workflows

Test echo hello world
```
name: ci
on: [push]
jobs:
  build:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2
      - name: Report PHP version
        run: php -v
      - name: Run a other script
        run: echo Hello World!
```

### Tạo 1 single function
calculator.php
```
<?php
class Calculator{
    
    public function add($num1, $num2) {
        return $num1 + $num2;
    }

    public function subtract($num1, $num2) {
        return $num1 - $num2;
    }

    public function multiply($num1, $num2) {
        return $num1 * $num2;
    }

    public function divide($num1, $num2) {
        return $num1 / $num2;
    }
}
?>
```

### Viết unit test
test/calculatorTest.php
```
<?php
require __DIR__ . "/calculator.php";

class CalculatorTest extends \PHPUnit\Framework\TestCase{
    public function testadd(){
        $calculator = new \Calculator();
        $calculator->add(1, 2);
    }
}
```

test/phpunit.xml
```
<phpunit>
  <testsuites>
    <testsuite name="money">
      <directory>../test</directory>
    </testsuite>
  </testsuites>
</phpunit>
```

### Add git action workflows

```
      - name: PHPUnit Tests
        uses: php-actions/phpunit@v3
        # env:
          # TEST_NAME: HoanChuong
        with:
          # bootstrap: vendor/autoload.php
          configuration: test/phpunit.xml
          memory_limit: 256M
          # args: --coverage-text
```

### Phần CD
Step 1: Generate an SSH Key
Link: https://docs.github.com/en/authentication/connecting-to-github-with-ssh/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent

