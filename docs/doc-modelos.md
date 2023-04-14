# Documento de Modelos

Neste documento temos o modelo Conceitual (UML) ou de Dados (Entidade-Relacionamento). Temos também a descrição das entidades e o dicionário de dados.

Para a modelagem pode se usar o Astah UML ou o BrModelo. Uma ferramenta interessante para modelos UML é a [YUML](http://yuml.me), no link temos um exemplo de [Modelo UML com YUML](yuml/monitoria-yuml.md). Atualmente é possível usar a ferramenta **Mermaid** segundo o blog do GitHub [Include diagrams in your Markdown files with Mermaid](https://github.blog/2022-02-14-include-diagrams-markdown-files-mermaid/). A documentação do **Mermaid** pode ser encontrada em [Mermaid in GitHub](https://mermaid-js.github.io/mermaid).

## Modelo Conceitual

### Diagrama de Classes usando Mermaid

```mermaid
classDiagram

    Funcionario <|-- Contato
    Funcionario <|-- UsuarioLogin
    Funcionario <|-- Endereco
    Funcionario <|-- Pedido

    Pedido <|-- ItensPedido
    Pedido <|-- Pagamento

    ItensPedido <|-- Prato

    Prato <|-- PratoIngrediente

    PratoIngrediente <|-- Ingredientes

    class Funcionario{
        +char nome
        +char CPF
        +Endereco endereco
        +Contato contato
        +char dataNascimento
        +char rg
        +char funcão
        +UsuarioLogin login


        -consultarFuncionario(char CPF) Funcionário
        -adicionarFuncionario(Funcionario funcionario) void
        -removerFuncionario(Funcionario funcionario) void
        -editarFuncionario(Funcionario funcionario) void
        -listarTodos() Funcionario
        -realizarLogin(char login) UsuarioLogin
        -validarCPF(char CPF) boolean
    }

    class Contato{
        +char telefone
        +char email

        -atualizarContato(Contato contato) void
    }

    class UsuarioLogin{
        +char login
        +char senha

        -realizarLogin(char login, char senha) boolean
    }

    class Endereco{
        +char logradouro
        +char bairro
        +char cep
        +int numeroCasa
        +char complemento

        -atualizarEndereco(Endereco enderedo) void
    }

    class Pedido{
        +int numPedido
        +int mesa
        +char data
        +char data
        +char hora
        +char status
        +ItensPedido pedido

        -total() double
        -atualizarPedido(Pedido pedido) void
        -addPedido(Pedido pedido) void
        -consultarPedido(numPedido int) void
        -validarItensPedido(itensPedido ItensPedido) boolean
    }

    class ItensPedido{
        +prato Prato
        +int quantidade

        -totalPrato() double
        -addItensPedido(ItensPedido itensPedido) void
        -consultarItensPedido(ItensPedido itensPedido) ItensPedido
        -editarItensPedido(ItensPedido itensPedido) void
        -removeItensPedido(ItensPedido itensPedido) void
    }

    class Prato{
        +double preco
        +char nome

        -atualizarPrato(item Prato) void
        -listarItens() Prato[]
        -addPrato(Prato prato) void
        -consultarPrato(prato char) Prato
        -editarPrato(Prato prato) void
        -removePrato(Prato prato) void
        -validarNomePrato(char nome) boolean
    }

    class PratoIngrediente{
        +Ingredites ingrediente
        +Prato item
        +int quantidade

        -atualizarIngrediente(Ingredientes ingrediente) void
        -atualizarPrato(Prato item) void
        -atualizarQuantidade(int quantidade) void
    }

    class Ingredientes{
        +char ingrediente
        +int codigo

        -atualizarIngrediente(int ingrediente) void
        -atualizarCodigo(int codigo) void
    }

```

### Descrição das Entidades

Descrição sucinta das entidades presentes no sistema.

| Entidade | Descrição                                                                                                                                |
| -------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| Animal   | Entidade abstrata para representar informações gerais dos Animais: age, gender, isMammal(), mate().                                      |
| Duck     | Entidade que representa um Pato tem as informações: String beakColor, +swim(), +quack(). A classe Duck estende a classe abstrata Animal. |
| Fish     | Entidade que representa um Peixe tem as informações: sizeInFeet, -canEat(). A classe Peixe estende a classe abstrata Animal.             |
| Zebra    | Entidade que representa um Zebra tem as informações is_wild, run(). A classe Zebra estende a classe abstrata Animal.                     |

## Modelo de Dados (Entidade-Relacionamento)

Para criar modelos ER é possível usar o BrModelo e gerar uma imagem. Contudo, atualmente é possível criar modelos ER usando a ferramenta **Mermaid**, escrevendo o modelo diretamente em markdown. Acesse a documentação para escrever modelos [ER Diagram Mermaid](https://mermaid-js.github.io/mermaid/#/entityRelationshipDiagram).

```mermaid

---
title: Modelo de Dados - Sistemas de Restaurante
---
erDiagram

    Cardapio||--|{Item: possui
    Administrador ||--|{Cardapio: gerencia
    Venda ||--|{Item: possui
    Item ||--O{Produto: possui
    Estoque ||--O{Item: possui
```

### Dicionário de Dados

| Tabela     | Laboratório                                                                |
| ---------- | -------------------------------------------------------------------------- |
| Descrição  | Armazena as informações de um laboratório acadêmico.                       |
| Observação | Laboratórios acadêmicos podem ser de Ensino, Pesquisa, Extensão, P&D, etc. |

| Nome          | Descrição                        | Tipo de Dado | Tamanho | Restrições de Domínio |
| ------------- | -------------------------------- | ------------ | ------- | --------------------- |
| codigo        | identificador gerado pelo SGBD   | SERIAL       | ---     | PK / Identity         |
| sigla         | representação em sigla do lab    | VARCHAR      | 15      | Unique / Not Null     |
| nome          | nome do laboratório              | VARCHAR      | 150     | Not Null              |
| descricao     | detalhes sobre o laboratório     | VARCHAR      | 250     | ---                   |
| endereco      | endereço e localização do lab    | VARCHAR      | 150     | ---                   |
| data_criacao  | data de criação do lab           | DATE         | ---     | Not Null              |
| portaria      | portaria de criação do lab       | VARCHAR      | 50      | ---                   |
| link_portaria | URL para a portaria (PDF)        | VARCHAR      | 150     | ---                   |
| site          | URL para o site do laboratório   | VARCHAR      | 150     | ---                   |
| e-mail        | e-mail de contato do laboratório | VARCHAR      | 150     | ---                   |
| departamento  | departamento vinculado ao lab    | SERIAL       | ---     | FK / Not Null         |
