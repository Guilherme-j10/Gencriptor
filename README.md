# Gencriptor
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/elevenstack/gencriptor?style=flat-square)
![Packagist License](https://img.shields.io/packagist/l/elevenstack/gencriptor?color=gra&style=flat-square)
![Packagist Version](https://img.shields.io/packagist/v/elevenstack/gencriptor?style=flat-square)
![Scrutinizer code quality (GitHub/Bitbucket)](https://img.shields.io/scrutinizer/quality/g/Guilherme-j10/Gencriptor/master?style=flat-square)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/Guilherme-j10/Gencriptor?style=flat-square)
[![GitHub stars](https://img.shields.io/github/stars/Guilherme-j10/Gencriptor?style=flat-square)](https://github.com/Guilherme-j10/Gencriptor/stargazers?style=for-the-badge)

This is a packege that help you to encripty passwords and create password for your aplication with security, so in below you can see some methods that can use.

## Installation using composer

in cli:
````
$ composer require elevenstack/Gencriptor
````

composer.json file:

````json
"require":{
    "elevenstack/Gencriptor": "^1.0"
}
````

## How to use

- getstring_secur(size:int, special_caractere:bool);
- encString(password:string);
- decString(password:string);

Exemple of getpassword();
````php
    require_once __DIR__."venodr/autoload.php";
    use elevenstack\Gencriptor\Gencriptor;

    $pass = new Gencriptor();
    $result = $pass->getstring_secur(8, false);

    echo $result; 
    //G1JCOT7V
````

if you want a method that can undo the security, in first you have use this method 'encString()' to return a password encrypeted and for decrypt the returned password by encString() you have use 'decString()', so thus verifications can be do.

Example of encString(); and decString();

````php
    require_once __DIR__."venodr/autoload.php";
    use elevenstack\Gencriptor\Gencriptor;

    $pass = new Gencriptor();
    $crypted = $pass->encString('anypass');
    echo $crypted;
    //LWVPdi1lT3Z4NEc4JVQ/SDRYa0xuRTNDeDRHOA

    $descrypted = $pass->decString('LWVPdi1lT3Z4NEc4JVQ/SDRYa0xuRTNDeDRHOA');
    echo $descrypted;
    //anypass
````

Example of verification using encpass and decpass: 

````php
    require_once __DIR__."venodr/autoload.php";
    use elevenstack\Gencriptor\Gencriptor;

    $pass = new Gencriptor();
    $crypted = $pass->encString('pass');
    echo $crypted; //LWVPdi1lT3Z4NEc4JVQ/SA

    $descrypted = $pass->decString('LWVPdi1lT3Z4NEc4JVQ/SA');

    if($descrypted == 'pass'){
        echo "Open access";
    }else{
        echo "Error try again";
    }
````

## Requirements

The package is suported by this versions:

- PHP >= 7.2

## Author

This pakcage was created and is maintained by Guilherme-j10. if you have any questions can contact me by my e-mail guilherme123.campos12@gmail.com.

## License

MIT License

Copyright (c) 2019 Johnny Mast

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.









