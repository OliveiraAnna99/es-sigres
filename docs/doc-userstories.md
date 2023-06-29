# Documento Lista de User Stories

## Histórico de revisões

| Data       | Versão |            Descrição            | Autor          |
| :--------- | :----: | :-----------------------------: | :------------- |
| 01/05/2023 | 0.0.1  |        Documento Inicial        | Israel Costa   |
| 01/05/2023 | 0.0.2  | Detalhamento do User Story US04 | Anna Karoline  |
| 02/05/2023 | 0.0.3  | Detalhamento do User Story US01 | Israel Costa   |
| 02/05/2023 | 0.0.4  | Detalhamento do User Story US03 | Isadora Luana  |
| 02/05/2023 | 0.0.5  | Detalhamento do User Story US02 | Israel Costa   |
| 02/05/2023 | 0.0.6  | Detalhamento do User Story US05 | Jônatas Câmara |

### User Story US01 - Manter Funcionário

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
| **Desenvolvedor**       | Anna Karoline  |
| **Revisor**             | Isadora Luana  |
| **Testador**            | Jônatas Câmara |

| Testes de Aceitação (TA) |                                                                                                                                                                                                  |
| ------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| **Código**               | **Descrição**                                                                                                                                                                                    |
| **TA01.01**              | O usuário informa, na tela Registrar, todos os dados para registrar-se corretamente, ao clicar em Salvar ele é notificado com uma mensagem de sucesso. Mensagem: Cadastro realizado com sucesso. |
| **TA01.02**              | Tentar cadastrar com erro, exibir a mensagem de erro: - MSG001: Preencha todos os campos; - MSG002: O campo {nomecampo} foi preenchido incorretamente.                                           |
| **TA01.03**              | O usuário informa, na tela Editar, os dados que deseja alterar, ao clicar em Salvar ele é notificado com uma mensagem de sucesso. Mensagem: Dados do funcionário editados com sucesso.           |
| **TA01.04**              | Tentar alterar com erro, exibir a mensagem de erro: - MSG001: Preencha todos os campos; - MSG002: O campo {nomecampo} foi preenchido incorretamente.                                             |
| **TA01.05**              | O usuário tenta excluir o funcionário, ao obter sucesso, é exibido a mensagem: funcionário excluído com sucesso.                                                                                 |
| **TA01.05**              | Pesquisar com sucesso. Exibição com sucesso e exibição vazio. Testar exibição com paginação.                                                                                                     |

### User Story US02 - Manter Estoque

|               |                                                                                                                                                                                                                                         |
| ------------- | :-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Descrição** | O sistema deverá fazer uma listagem automática da quantidade de itens ainda disponíveis no estoque, à medida que os pedidos forem entregues. Tem como tributo: itens do estoque, quantidade de itens, data de compra, data de validade. |

| **Requisitos envolvidos** |                      |
| ------------------------- | :------------------- |
| RF11                      | Adicionar do estoque |
| RF12                      | Listar do estoque    |
| RF13                      | Alterar do estoque   |
| RF14                      | Remover do estoque   |

|                         |              |
| ----------------------- | ------------ |
| **Prioridade**          | Essencial    |
| **Estimativa**          | 6h           |
| **Tempo Gasto (real):** |              |
| **Tamanho Funcional**   | 7 PF         |
| **Analista**            | Israel Costa |
| **Desenvolvedor**       | Isadora Luana|
| **Revisor**             | Anna Karoline|
| **Testador**            | Jonatas      |

| Testes de Aceitação (TA) |                                                                                                                                                                                                |
| ------------------------ | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Código**               | **Descrição**                                                                                                                                                                                  |
| **TA 02.01**             | O administrador, na tela do estoque, tentará adicionar dados corretos do item, ao clicar em Cadastrar aparecerá uma notificação de mensagem de sucesso. Mensagem: Item adicionado com sucesso. |
| **TA 02.02**             | Tentar cadastrar com erro, exibir a mensagem de erro: - MSG001: Preencha todos os campos. - MSG002: O campo {nomecampo} foi preenchido incorretamente.                                         |
| **TA 02.03**             | Alterar com sucesso. Tentar alterar com erro.                                                                                                                                                  |
| **TA 02.04**             | Excluir com sucesso. Tentar excluir com erro (sem permissão).                                                                                                                                  |
| **TA 02.05**             | Pesquisar com sucesso. Exibição com sucesso e exibição vazio. Testar exibição com paginação.                                                                                                   |

### User Story US03 - Manter Cardápio

|               |                                                                                                                                                                                                                                                                                                 |
| ------------- | :---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Descrição** | O sistema deve permitir adicionar, alterar, listar e deletar pratos ao cardápio. Os pratos tem como atributos: nome, ingredientes, valor, status e uma imagem do prato (Opcional). Apenas o administrador poderá realizar alteração e adição ao cardápio, funcionários podem realizar consulta. |

| **Requisitos envolvidos** |                 |
| ------------------------- | :-------------- |
| RF07                      | Adicionar Prato |
| RF08                      | Alterar Prato   |
| RF09                      | Excluir Prato   |
| RF010                     | Listar Prato    |

|                         |               |
| ----------------------- | ------------- |
| **Prioridade**          | Importante    |
| **Estimativa**          | 7 h           |
| **Tempo Gasto (real):** |               |
| **Tamanho Funcional**   | 7 PF          |
| **Analista**            | Isadora Luana |
| **Desenvolvedor**       | Jonatas       |
| **Revisor**             | Israel Costa  |
| **Testador**            | Anna Karoline |

| Testes de Aceitação (TA) |                                                                                                                                                                                                        |
| ------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| **Código**               | **Descrição**                                                                                                                                                                                          |
| **TA 02.01**             | O administrador, na tela do cardápio, tentará adicionar dados corretos do cardápio, ao clicar em Cadastrar aparecerá uma notificação de mensagem de sucesso. Mensagem: Cadastro realizado com sucesso. |
| **TA 02.02**             | Tentar cadastrar com erro, exibir a mensagem de erro: - MSG001: Preencha todos os campos. - MSG002: O campo {nomecampo} foi preenchido incorretamente.                                                 |
| **TA 02.03**             | Alterar com sucesso. Tentar alterar com erro.                                                                                                                                                          |
| **TA 02.04**             | Excluir com sucesso. Tentar excluir com erro (sem permissão).                                                                                                                                          |
| **TA 02.05**             | Pesquisar com sucesso. Exibição com sucesso e exibição vazio. Testar exibição com paginação.                                                                                                           |

### User Story US04 - Manter Pedidos e Realizar Pagamento

|               |                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               |
| ------------- | :---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Descrição** | O sistema deve possuir um crud de pedidos, de modo que o usuário seja capaz de realizar o gerenciamento dos pedidos do restaurante por meio deste. Podendo realizar ações que vão desde a realização de um cadastro de novos itens do pedido até a alteração, listagem e exclusão do mesmo. Para realizar o cadastro de um item do pedido o usuário deverá informar campos como : numeração da mesa, o item que ele deseja adicionar ao pedido e o status do pedido que vai determinar se este já foi concluído ou ainda está em andamento, o pedido em questão só sofrerá uma alteração de estado em relação ao seu status quando o pagamento for realizado e isso ocorrerá por meio de um sistema externo de pagamentos que será vinculado ao sistema. Para realização do pagamento deve ser selecionada a forma de pagamento que o usuário deseja e dependendo dessa escolha os campos a serem preenchidos podem variar, visto que pode ser via pix, cartão ou em espécie. |

| **Requisitos envolvidos** |                           |
| ------------------------- | :------------------------ |
| RF11                      | Adicionar Itens ao Pedido |
| RF12                      | Alterar Itens do Pedido   |
| RF14                      | Remover Itens do Pedido   |
| RF15                      | Listar Itens do Pedido    |
| RF16                      | Realizar Integração do Sistema com API de pagamentos (opcional)    |
| RF17                      | Ajustar API para realizar o pagamento via cartão (opcional)        |
| RF18                      | Ajustar API para realizar o pagamento via pix (opcional)           |
| RF19                      | Ajustar API para realizar o pagamento via boleto (opcional)        |

|                         |               |
| ----------------------- | ------------- |
| **Prioridade**          | Importante    |
| **Estimativa**          | 7h            |
| **Tempo Gasto (real):** |               |
| **Tamanho Funcional**   | 7 PF          |
| **Analista**            | Anna Karoline |
| **Desenvolvedor**       | Israel Costa  |
| **Revisor**             | Jonatas       |
| **Testador**            | Isadora Luana |

| Testes de Aceitação (TA) |                                           |
| ------------------------ | ----------------------------------------- |
| **Código**               | **Descrição**                             |
| **TA01.01**              | Descrever o teste de aceitação 01 do US04 |
| **TA01.02**              | Descrever o teste de aceitação 02 do US04 |
| **TA01.03**              | Descrever o teste de aceitação 03 do US04 |
| **TA01.04**              | Descrever o teste de aceitação 04 do US04 |

### User Story US05 - Login

|               |                                                                                         |
| ------------- | :-------------------------------------------------------------------------------------- |
| **Descrição** | Ato de logar-se no sistema para acesso de ações e funcionalidades embutidas no sistema. |

| **Requisitos envolvidos** |                  |
| ------------------------- | :--------------- |
| RF01                      | Sistema de Login |

|                         |               |
| ----------------------- | ------------- |
| **Prioridade**          | Essencial     |
| **Estimativa**          | 3 h           |
| **Tempo Gasto (real):** |               |
| **Tamanho Funcional**   | 3 PF          |
| **Analista**            | Isadora Luana |
| **Desenvolvedor**       | Anna Karoline |
| **Revisor**             | Jônatas       |
| **Testador**            | Israel Costa  |

| Testes de Aceitação (TA) |                                                                                                                                                                                                    |
| ------------------------ | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Código**               | **Descrição**                                                                                                                                                                                      |
| **TA01.01**              | O usuário informa, na tela de Login, os dados para logar incorretamente, ao clicar em Entrar, ele é notificado com uma mensagem de erro Mensagem: Login ou senha inválidos                         |
| **TA01.02**              | O usuário informa, na tela de Login, os dados para logar corretamente, ao clicar em Entrar, ele é encaminhado para a tela principal do sistema. É exibida a mensagem: Login realizado com sucesso. |


### User Story US06 - Logout

|               |                                                                                         |
| ------------- | :-------------------------------------------------------------------------------------- |
| **Descrição** | Ato de sair do sistema. |

| **Requisitos envolvidos** |                  |
| ------------------------- | :--------------- |
| RF01                      | Sistema de Logout |

|                         |               |
| ----------------------- | ------------- |
| **Prioridade**          | Essencial     |
| **Estimativa**          | 3 h           |
| **Tempo Gasto (real):** |               |
| **Tamanho Funcional**   | 3 PF          |
| **Analista**            | Israel Costa  |
| **Desenvolvedor**       | Anna Karoline |
| **Revisor**             | Jônatas       |
| **Testador**            | Isadora Luana |

| Testes de Aceitação (TA) |                                                                                                                                                                                                    |
| ------------------------ | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Código**               | **Descrição**                                                                                                                                                                                      |
| **TA01.01**              | O usuário, já logado clica para voltar, usando a funcionalidade do navegador e o sistema redireciona o usuário para a tela de login ou para uma página de acesso restrito, indicando que o logout foi realizado com sucesso.  |
| **TA01.02**              | O usuário, já logado clica para em 'Logout' e voltará para a tela de Login. |
