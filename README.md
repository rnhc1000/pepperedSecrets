## Peppered Passwords to be Storef Safely at DB
How to store secrets and passwords safely and having full control
- Argon2
- Hash
- Pepper

## _Table of contents_
- [Overview](#overview)
- [Screenshot](#screenshot)
- [Links](#links)
- [Built with](#built-with)
- [What I practiced](#what-i-practiced)
- [Continued development](#continued-development)
- [Resources](#useful-resources)
- [Author](#author)
- [Acknowledgments](#acknowledgments)
## _Overview_
The design is structured as shown:
- src|
    - assets|
    - components|
        - About
          - index.tsx
          - styles.css
        - HomeBody
        - NotFoundPage
        - Product
        - ProductsMenu
   - routes
        - About Us
        - BodyHome
        - Home
        - NotFound
        - Products
            - Books
            - Computers
            - Electronics
   - App.tsx
   - index.css
   - main.tsx
   - index.html
   - tsconfig.json
   - tsconfig.node.json
   - vite.config.js
   - yarn.lock
- public|

## _Screenshot_
[![](./pepperedPassword.png)]()
## _Links_
- Live Site URL: [] 
## _Built with_

![](https://ferreiras.dev.br/assets/images/icons/react-router-stacked-color-inverted.svg)|![](https://ferreiras.dev.br/assets/images/icons/react.svg)|![](https://ferreiras.dev.br/assets/images/icons/vite.svg)|![](https://ferreiras.dev.br/assets/images/icons/yarn-title.svg)|![](https://ferreiras.dev.br/assets/images/icons/ts-logo.svg)|![](https://ferreiras.dev.br/assets/images/icons/icons8-javascript.svg)|![](https://ferreiras.dev.br/assets/images/icons/icons8-visual-studio-code.svg)

 ## _What I practiced_
```php

declare(strict_types=1);

namespace Rferreira\Misc\classes;

final class GeradorSenhaSegura
{
    private string $senhaAProteger;
    private string $pimenta;
    private string $senhaComPimenta;
    private string $senhaHashed;

    public function __construct($senhaAProteger)
    {
        $this->setSenha($senhaAProteger);
    }

    public function gerarSenhaApimentada(): string
    {
        $pimenta = false;
        $pepper = new GetTokenPwd();
        $pimenta = $pepper->getChiliPepper();
        $senhaAProteger = $this->getSenha();
        $senhaComPimenta = new SetPepPwd($senhaAProteger, $pimenta);
        return $senhaComPimenta->getSenhaPeppered();
    }

    public function calculaHash($senhaComPimenta): string
    {
        return password_hash($senhaComPimenta, PASSWORD_ARGON2ID);
         
    }

    public function passwordVerify($senhaComPimenta, $senhaHashed) : bool
    {
        if (!(password_verify($senhaComPimenta, $senhaHashed))){
                        return false;
        } else {
            echo "<br>" . "Hahaha....";
            return true;
        }
    }

    public function setSenha($senhaAProteger)
    {
        $this->senhaAProteger = $senhaAProteger;
    }

    public function getSenha(): string
    {

        return $this->senhaAProteger;
    }

}

``` 

## _Continued development_
- Next challenge: Moving forward 
### _Useful resources_
- [https://argon2.online/] Hashing passwords".
- [https://cheatsheetseries.owasp.org/cheatsheets/Password_Storage_Cheat_Sheet.html] It is essential to store passwords in a way that prevents them from being obtained by an attacker. even if the application or database is compromised
- [https://www.password-hashing.net/] Argon2i and Argon2d are parametrized by
A time cost, which defines the execution time
A memory cost, which defines the memory usage
A parallelism degree, which defines the number of threads
- [https://github.com/p-h-c/phc-winner-argon2] It has a simple design aimed at the highest memory filling rate and effective use of multiple computing units, while still providing defense against tradeoff attacks (by exploiting the cache and memory organization of the recent processors).
## _Author_
- Website - [https://ferreiras.dev.br] 
## Acknowledgments