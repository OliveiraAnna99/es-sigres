# Documento Lista de User Stories

## Histórico de revisões

| Data       | Versão |            Descrição            | Autor         |
| :--------- | :----: | :-----------------------------: | :------------ |
| 01/05/2023 | 0.0.1  |        Documento Inicial        | Israel Costa  |
| 01/05/2023 | 0.0.2  | Detalhamento do User Story US04 | Anna Karoline |

### User Story US01 - Manter Usuário

|               |                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             |
| ------------- | :---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Descrição** | O sistema deve manter um cadastro de usuário que tem acesso ao sistema via login e senha. Um usuário tem os atributos name, id, email, username, data de nascimento, tipo de usuário, status, password, avatarURL. O email será o login e ele pode registrar-se diretamente no sistema, o avatarURL é um link para uma foto de seu perfil. Além disso o usuário poderá alterar alguns dados, como o e-mail ou a senha. O usuário administrador do sistema pode realizar as operações de adicionar, alterar, remover e listar os usuários comuns do sistema. |

| **Requisitos envolvidos** |                                |
| ------------------------- | :----------------------------- |
| RF01                      | Cadastrar Usuário              |
| RF02                      | Alterar Usuário                |
| RF03                      | Consultar Usuários             |
| RF04                      | Excluir Usuário                |
| RF05                      | Vizualizar detalhes do Usuário |

|                         |           |
| ----------------------- | --------- |
| **Prioridade**          | Essencial |
| **Estimativa**          | 8 h       |
| **Tempo Gasto (real):** |           |
| **Tamanho Funcional**   | 7 PF      |
| **Analista**            | Taciano   |
| **Desenvolvedor**       | Zé        |
| **Revisor**             | Maria     |
| **Testador**            | Xuxa      |

| Testes de Aceitação (TA) |                                           |
| ------------------------ | ----------------------------------------- |
| **Código**               | **Descrição**                             |
| **TA01.01**              | Descrever o teste de aceitação 01 do US01 |
| **TA01.02**              | Descrever o teste de aceitação 02 do US01 |
| **TA01.03**              | Descrever o teste de aceitação 03 do US01 |
| **TA01.04**              | Descrever o teste de aceitação 04 do US01 |

### User Story US02 - Manter Funcionário

|               |                                                                                                                                                                                                                                                                                                                 |
| ------------- | :-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Descrição** | O sistema deve manter um cadastro de funcionário que tem acesso ao sistema via login e senha. Um funcionário tem os atributos nome, data de nascimento, endereço, telefone , CPF, RG, salário, função, login e senha. O login será no formato email e ele só pode ser registrado pelo Administrador do sistema. |

| **Requisitos envolvidos** |                       |
| ------------------------- | :-------------------- |
| RF02                      | Adicionar Funcionário |
| RF03                      | Alterar Funcionário   |
| RF04                      | Excluir Funcionário   |
| RF05                      | Listar Funcionário    |

|                         |                |
| ----------------------- | -------------- |
| **Prioridade**          | Essencial      |
| **Estimativa**          | 6 h            |
| **Tempo Gasto (real):** |                |
| **Tamanho Funcional**   | 7 PF           |
| **Analista**            | Israel Costa   |
| **Desenvolvedor**       | Isadora Luana  |
| **Revisor**             | Anna Karoline  |
| **Testador**            | Jônatas Câmara |

### User Story US04 - Gerenciar Pedidos e Realizar Pagamento

|               |                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               |
| ------------- | :---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Descrição** | O sistema deve possuir um crud de pedidos, de modo que o usuário seja capaz de realizar o gerenciamento dos pedidos do restaurante por meio deste. Podendo realizar ações que vão desde a realização de um cadastro de novos itens do pedido até a alteração, listagem e exclusão do mesmo. Para realizar o cadastro de um item do pedido o usuário deverá informar campos como : numeração da mesa, o item que ele deseja adicionar ao pedido e o status do pedido que vai determinar se este já foi concluído ou ainda está em andamento, o pedido em questão só sofrerá uma alteração de estado em relação ao seu status quando o pagamento for realizado e isso ocorrerá por meio de um sistema externo de pagamentos que será vinculado ao sistema. Para realização do pagamento deve ser selecionada a forma de pagamento que o usuário deseja e dependendo dessa escolha os campos a serem preenchidos podem variar, visto que pode ser via pix, cartão ou em espécie. |

| **Requisitos envolvidos** |                           |
| ------------------------- | :------------------------ |
| RF11                      | Adicionar Itens ao Pedido |
| RF12                      | Alterar Itens do Pedido   |
| RF14                      | Remover Itens do Pedido   |
| RF15                      | Listae Itens do Pedido    |

|                         |                           |
| ----------------------- | ------------------------- |
| **Prioridade**          | Importante                |
| **Estimativa**          | 7h                        |
| **Tempo Gasto (real):** |                           |
| **Tamanho Funcional**   | 7 PF                      |
| **Analista**            | Jonatas Camara dos Santos |
| **Desenvolvedor**       | Anna Karoline D. Oliveira |
| **Revisor**             | Isadora Luana             |
| **Testador**            | Israel                    |

| Testes de Aceitação (TA) |                                           |
| ------------------------ | ----------------------------------------- |
| **Código**               | **Descrição**                             |
| **TA01.01**              | Descrever o teste de aceitação 01 do US04 |
| **TA01.02**              | Descrever o teste de aceitação 02 do US04 |
| **TA01.03**              | Descrever o teste de aceitação 03 do US04 |
| **TA01.04**              | Descrever o teste de aceitação 04 do US04 |
