# Relatório de Testes de Módulo/Sistema

Documento construido a partir do modelo **Modelo BSI - Doc 008 - Relatório de Testes de Módulo/Sistema**.
Link para o documento modelo: https://docs.google.com/document/d/11hLKf0FcspQrDRfo3gRMXzuY1028cUeniv_Aob8DX_0/edit?usp=sharing

### Legenda
| Nome       | Descrição     |
| ---------- | ------------- |
| Teste      | Código do Teste. |
| Descrição  | Descrição dos passos do teste executado. |
| Especificação | Informações sobre a função testada, estando ela de acordo ou não com a especificação do caso de uso. |
| Resultado  |  Resultado do teste, modificações sugeridas ou erros. No caso de erro na execução do teste, descreve-se o erro em detalhes. |

## US001-Manter Funcionários

| Teste          | Descrição                                                                                  | Especificação 					| Resultado          |
| -------------- | ------------------------------------------------------------------------------------------ | ----------------------- | ------------------ |
| Teste 01:Adicionar funcionário. | A1-Adicionar Funcionário.<br> A1.1-O ator Preenche os dados nescessários.<br> A1.2-O ator clica no botão "Cadastrar Funcionário".<br> A1.3-O sistema salva os dados.<br> A1.4-O sistema retorna para a página de "Funcionários".<br> A1.5-Fim do fluxo. | Especificação OK. | Ao cadastrar um funcionário é nescessário informar um CPF válido, caso contrário o cadastro não ocorre e a menssagem "CPF inválido" aparece. |
| Teste 02:Editar funcionário. | A2-Editar funcionário.<br> A2.1-O ator executa o fluxo "Listar funcionários".<br> A2.2-O ator clica no botão "Editar Funcionário".<br> A2.3-O sistema redireciona o ator para a página "Editar Funcionário".<br> A2.4-O ator preenche os dados a serem editados.<br> A2.5-O ator clica no botão "Atualizar Funcionário".<br> A2.6-O sistema salva os dados.<br> A2.7-O sistema retorna para a página "Funcionários".<br> A2.8-Fim do fluxo. | Especificação OK. | OK |
| Teste 03:Excluir funcionário. | A3-Excluir funcionário.<br> A3.1-O ator executa o fluxo "Listar funcionários".<br> A3.2-O ator clica no botão "Excluir funcionário".<br> A3.3-O sistema exclui os dados do funcionário.<br> A3.4-Fim do fluxo. | Especificação Ok | OK |
| Teste 04:Listar funcionários. | A4-Listar funcionário.<br> A4.1-O ator clica no botão "Funcionários".<br> A4.2-O sistema direciona o ator para a página de "Funcionários"<br> A4.3-O sistema consulta os dados de funcionários cadastrados.<br> A4.4-O sistema lista funcionários na página.<br> A4.5-Fim do fluxo. | Especificação OK | OK |

## US002-Manter Estoques

| Teste          | Descrição                                                                                  | Especificação 					| Resultado          |
| -------------- | ------------------------------------------------------------------------------------------ | ----------------------- | ------------------ |
| Teste 01:Adicionar estoque. | A1-Adicionar estoque.<br> A1.1-O ator Preenche os dados nescessários.<br> A1.2-O ator clica no botão "Cadastrar Estoques".<br> A1.3-O sistema salva os dados.<br> A1.4-O sistema redireciona o ator para a página do item adicionado.<br> A1.6-Fim do fluxo. | O campo "Quantidade" deve ser preenchido com um número inteiro maior que 0, caso contrário, dará um erro e mansagem "O valor deve ser maior ou igual a 1." ou "Insirá um valor válido." aparecerá na tela.<br> A data deve ser válida, caso contrário, dará um erro na página. (mensagem pro erro deve ser adicionada) | OK |
| Teste 02:Editar estoque. | A2-Editar estoque.<br> A2.1-O ator executa o fluxo "Listar estoques".<br> A2.2-O ator clica no botão "Editar" ou "Editar Estoque" na página do item recém cadastrado.<br> A2.3-O sistema redireciona o ator para a página "Editar estoque".<br> A2.4-O ator preenche os dados a serem editados.<br> A2.5-O ator clica no botão "Atualizar Item".<br> A2.6-O sistema salva os dados.<br> A2.7-O sistema retorna para a página "Estoques".<br> A2.8-Fim do fluxo. | Esta especificação condiz com a do "Teste 01". | OK |
| Teste 03:Excluir estoque. | A3-Excluir estoque.<br> A3.1-O ator executa o fluxo "Listar estoques".<br> A3.2-O ator clica no botão com o ícone de "Lixeira".<br> A3.3-O sistema exclui os dados do "Item" em "Estoques".<br> A3.4-O sistema retorna para a página "Estoqueos".<br> A3.5-Fim do fluxo. | Especificação OK | OK |
| Teste 04:Listar estoques. | A4-Listar estoques.<br> A4.1-O ator clica no botão "Estoques".<br> A4.2-O sistema direciona o ator para a página de "Estoques"<br> A4.3-O sistema consulta os dados de estoques cadastrados.<br> A4.4-O sistema lista estoques na página.<br> A4.5-Fim do fluxo. | Especificação OK | OK |

## US003-Manter Cardápios

| Teste          | Descrição                                                                                  | Especificação 					| Resultado          |
| -------------- | ------------------------------------------------------------------------------------------ | ----------------------- | ------------------ |
| Teste 01:Adicionar cardápio. | A1-Adicionar cardápio.<br> A1.1-O ator Preenche os dados nescessários.<br> A1.2-O ator clica no botão "Cadastrar Cardápio".<br> A1.3-O sistema salva os dados.<br> A1.4-O sistema retorna para a página de "Cardápios".<br> A1.5-Fim do fluxo. | Especificação OK | OK |
| Teste 02:Editar cardápio. | A2-Editar cardápio.<br> A2.1-O ator executa o fluxo "Listar cardápios".<br> A2.2-O ator clica no botão "Editar Cardápio".<br> A2.3-O sistema redireciona o ator para a página "Editar Cardápio".<br> A2.4-O ator preenche os dados a serem editados.<br> A2.5-O ator clica no botão "Atualizar Cardápio".<br> A2.6-O sistema salva os dados.<br> A2.7-O sistema retorna para a página "Cardápios".<br> A2.8-Fim do fluxo. | O "Preço" deve ter "," e não "." em sua formatação, caso o contrário dará erro e exibirá a mensagem "The valor format is invalid.".<br> Ao editar, a formatação do "Preço" irá mudar automaticamente de "," para "." devido a um erro. | OK |
| Teste 03:Excluir Cardápio. | A3-Excluir cardápio.<br> A3.1-O ator executa o fluxo "Listar cardápios".<br> A3.2-O ator clica no botão "Excluir cardápio".<br> A3.3-O sistema exclui os dados do cardápio.<br> A3.4-O sistema retorna para a página "Cardápio".<br> A3.5-Fim do fluxo. | Especificação OK | OK |
| Teste 04:Listar cardápios. | A4-Listar cardápios.<br> A4.1-O ator clica no botão "Cardápios".<br> A4.2-O sistema direciona o ator para a página de "Cardápios"<br> A4.3-O sistema consulta os dados de cardápios cadastrados.<br> A4.4-O sistema lista cardápios na página.<br> A4.5-Fim do fluxo. | Especificação OK | OK |

## US004-Manter Pedidos

| Teste          | Descrição                                                                                  | Especificação 					| Resultado          |
| -------------- | ------------------------------------------------------------------------------------------ | ----------------------- | ------------------ |
| Teste 01:Adicionar pedido. | A1-Adicionar pedido.<br> A1.1-O ator Preenche os dados nescessários.<br> A1.2-O ator clica no botão "Realizar Pedido".<br> A1.3-O sistema salva os dados.<br> A1.4-O sistema retorna para a página do pedido cadastrado.<br> A1.5-Fim do fluxo. | Especificação OK | OK |
| Teste 02:Editar pedido. | A2-Editar cardápio.<br> A2.1-O ator executa o fluxo "Listar pedidos".<br> A2.2-O ator clica no botão "Editar" ou "Editar Pedidos" na página do pedido recém cadastrado.<br> A2.3-O sistema redireciona o ator para a página "Editar Pedidos".<br> A2.4-O ator preenche os dados a serem editados.<br> A2.5-O ator clica no botão "Cadastrar Pedido".<br> A2.6-O sistema salva os dados.<br> A2.7-O sistema retorna para a página "Pedidos".<br> A2.8-Fim do fluxo. | Especificação OK | OK |
| Teste 03:Excluir pedido. | A3-Excluir pedido.<br> A3.1-O ator executa o fluxo "Listar pedidos".<br> A3.2-O ator clica no botão "Excluir cardápio".<br> A3.3-O sistema exclui os dados do pedido.<br> A3.4-O sistema retorna para a página "Pedidos".<br> A3.5-Fim do fluxo. | Especificação OK | OK |
| Teste 04:Listar pedidos. | A4.1-O ator clica no botão "Pedidos".<br> A4.2-O sistema direciona o ator para a página de "Pedidos"<br> A4.3-O sistema consulta os dados de pedidos cadastrados.<br> A4.4-O sistema lista pedidos na página.<br> A4.5-Fim do fluxo. | Especificação OK | OK |
