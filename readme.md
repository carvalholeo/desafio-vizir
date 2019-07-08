# Desafio Vizir

Neste repositório estão os arquivos com a proposta de resolução do desafio Telzir: _"Show me the code"_.

## Requisitos

Para conseguir executar o projeto, você precisa das seguintes condições na sua máquina:

- PHP 7.1 ou superior
- Node.js 10.16.0
- Sistema Operacional Linux

## Instruções

Na máquina de teste, entre na pasta do projeto e execute o seguintes comandos:

```
php composer.phar install
cp .env.example .env
php artisan key:generate
npm install
npm run prod
```

Se preferir, pode executar o script abaixo, que executa os mesmos comandos acima automaticamente:

`./install.sh`

Logo após, execute o comando `php artisan serve`.

Feito isso, basta entrar em qualquer browser, no endereço indicado pelo artisan no seu terminal e visualizar o projeto.

Este projeto foi criado com Laravel 5.8 e Bootstrap 4.1.

### _Nota sobre testes_

Infelizmente, para esse projeto, NÃO há testes automatizados. Isso ocorre por dois motivos:

1. Meu notebook queimou cerca de 1 semana antes do envio do desafio, o que me levou a desenvolver boa parte do projeto pelo celular.
2. Ainda estou aprendendo a parte de testes automatizados, então não sei como poderia ser feito pelo smartphone.