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

# Olhar arquivos padrões no vendor
- vendor/laravel/framework/src/illuminate
# Create notifications class
```sh
php artisan make:notification NameClassNotification
```

# Verificar email
```php
// model
class User extends Authenticatable implements MustVerifyEmail {}

// web.php
Route::group(['middleware' => ['auth', 'verified']], function () {});
```

# Personalizar pagina email
```php
// php artisan make:notification VerifyEmailNotification
// model 
public function sendEmailVerificationNotification()
{
    $this->notify(new MyClassCreatedNotification);
}
```

# Mudar rota padrão de redirecionamento após login
- Em RouteServiceProvider
```php
public const HOME = '/tarefas';
```

# MOstrar dados somente se user estiver logado
```php
@auth
    Usuário logado
@endauth

@guest
    Olá visitante
@endguest
```

# [Laravel-excel](https://laravel-excel.com/)
```sh
composer require psr/simple-cache:^2.0 maatwebsite/excel
```

- Criar uma classe de exportação
```sh
php artisan make:export UsersExport --model=User
```

- Usando MPDF
```sh
composer require mpdf/mpdf
# se não funcionar
composer require mpdf/mpdf -W
```

- Em excel.php
```php
# mudar para 
'pdf'      => Excel::MPDF,
```

- Laravel [DOMPDF](https://github.com/barryvdh/laravel-dompdf)
```sh
composer require barryvdh/laravel-dompdf
```

- Add config/app.php
```php
// provider
Barryvdh\DomPDF\ServiceProvider::class

// aliases
'PDF' => Barryvdh\DomPDF\Facade::class,
```

- Publicar provider dompdf
```sh
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
```
