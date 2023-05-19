# Fake Online Store

This is a simple Symfony application that shows us the products from the [Fake Store API](https://fakestoreapi.com) and allows us to add products to the shopping cart.

## Technologies used
- Symfony 6.2, including
  - Twig 2.12
  - Stimulus
- Bootstrap

As this application was built without using databases, we used the Stimulus controller to add products to local storage and pass them to our Symfony shopping cart controller.

## Getting started
To get started, clone this repository to your local machine and navigate to the project directory in your terminal. Then run the following commands to install the dependencies:

```
composer install
npm install
```
Then run the following commands to start the application
```
npm run watch
symfony serve -d
```
The fake online store will be served at [http://localhost:8000](http://localhost:8000).

## How to use it
You can add products to the shopping cart and view them on the shopping cart page.

## Credits

- [Fake Store API](https://fakestoreapi.com)

## Screenshot

![desktop screenshot](https://github.com/markusVJH/online-store/blob/main/screenshots/desktop.png)

## Authors

[markusVJH](https://github.com/markusVJH), [JAT1988](https://github.com/JAT1988) & [Kapshtak](https://github.com/Kapshtak)
