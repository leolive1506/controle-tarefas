# Markdown mailables
- Criar mensagens disparadas por email com componentes pre existentes
- Coneceta com view por meio methodo build
- Ao instanciar class, a class é responsável por renderizar mensagem com base na view
- Markdown
    - Views prontas com layouts pre estabelicidos que podemos reutilizar
    - Já blade permite renderizar as views
```sh
php artisan make:mail ClassName --markdown view-associada
```

# Envio e-mail
```php
Mail::to('destinatario')->send('mensagem');
// usando markdown mailables para mensagem
Mail::to('leonardo.santana@gmail.com')->send(new \App\Mail\MensagemTesteMail());
```

# Public e customizar templates de email
```sh
php artisan vendor:publish number_laravel-mail
```
