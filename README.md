# :question: Como instalar e executar o projeto

## Executar na máquina:
Lembrando. Se você estiver no windows, use o WSL2 para rodar o docker

1. Abra o terminal na pasta desejada para clonar o repositório e execute o comando:

```bash
git clone https://github.com/caduzindev/test-days.git
```

2. Depois de concluído, siga os passos a seguir

```bash
cd test-days/
```

Para instalar as dependências:

```bash
composer install
```

Rode os testes antes de tudo:

```bash
composer tests
```

Para Rodar:

```bash
docker-compose up -d
```

Agora no seu navegador acesse:

```bash
http://localhost:8005/
```