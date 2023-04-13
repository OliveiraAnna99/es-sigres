# Documento de Visão

## Equipe e Definição de Papéis

| Membro         | Papel             | E-mail                          |
| -------------- | ----------------- | ------------------------------- |
| Taciano        | Cliente Professor | taciano@bsi.ufrn.br             |
| Anna Karoline  | Desenvolvedor(a)  | anna.oliveira.700@ufrn.edu.br   |
| Isadora Luana  | Desenvolvedor(a)  | isadora.azevedo.700@ufrn.edu.br |
| Israel Costa   | Gerente           | israel.silva.117@ufrn.edu.br    |
| Jônatas Câmara | Cliente           | jonatas.camara.705@ufrn.edu.br  |

## Matriz de Competências

| Membro          | Competências                                                                                    |
| --------------- | ----------------------------------------------------------------------------------------------- |
| Anna Karoline   | Desenvolvedor Back-end - PHP, Laravel, MySQL                                                    |
| Isadora Azevedo | Desenvolvedor Front-end - JavaScript, React, React Native, Next.js, HTML, CSS                   |
| Israel Costa    | Desenvolvedor Front-end/Mobile - JavaScript, HTML, CSS, Bootstrap, Next.js, React, React Native |
| Jônatas Câmara  | Desenvolvedor Back-end/Game - Python, Unity                                                     |

## Descrição do Projeto

O presente projeto trata-se de um sistema de gerenciamento de pedidos de um restaurante. O software em questão surge com o objetivo de garantir uma maior otimização
do tempo para a realização das atividades do processo, evitando deslocamentos desne-
cessários do ambiente de atendimento ao cliente até a cozinha, bem como as possíveis
problemas causados pelos ruídos de comunicação provocados por falha humana.


## Lista de Requisitos Funcionais

Requisito                                 | Descrição   | Ator |
---------                                 | ----------- | ---------- |
RF001 - Sistema Login     | O usuário realiza login no sistema de modo que este passa por um processo de validação dos campos e dos dados para assim dar acesso ao sistema | Administrador e Funcionário |
RF002 - Adicionar Funcionário | O administrador adiciona um novo funcionário ao sistema informando dados como: nome, cpf, rg, email, login e senha | Administrador |
RF003 - Alterar Funcionário | os dados anteriormente preenchidos durante o cadastro do usuário são atualizados | Administrador |
RF004 - Excluir Funcionário | O funcionário anteriormente cadastrado no sistema é removido deste | Administrador |
RF005 - Listar Funcionários | Uma lista com os funcionários cadastrados e que estão ativos no sistema é exibida | Administrador |
RF006 - Realizar Pagamento| Após a solicitação da compra do produto, um boleto é gerado para que seja realizado o pagamento dos serviços fornecidos | Administrador |
RF007 - Adicionar Cardápio | O administrador  ou funcionário adiciona um novo cardápio ao sistema informando dados que consistem em uma lista de itens que possuem: nome do prato, valor, descrição dos ingredientes | Administrador ou Funcionário |
RF008 - Alterar Cardápio | Os dados de um cardápio anteriormente cadastrado são atualizados | Administrador |
RF009 - Excluir Cardápio | Um cardápio anteriomente cadastrado é removido do sistema | Administrador |
RF010 - Listar Cardápios | É feito uma listagem de cardápios que estão cadastrados no sistema e que se encontram ativos para aquele dia | Administrador ou Funcionário |
RF011 - Adiconar Itens ao Estoque| Uma turma tem: código, professor, sala e horários (horário da turma). Uma turma é de um componente curricular. Uma turma tem um ou mais professores. Uma turma tem uma ou mais salas. Uma turma tem vários horários de aulas. | Chefes e Coordenadores |
RF012 - Alterar Itens do Estoque | Uma turma tem: código, professor, sala e horários (horário da turma). Uma turma é de um componente curricular. Uma turma tem um ou mais professores. Uma turma tem uma ou mais salas. Uma turma tem vários horários de aulas. | Chefes e Coordenadores |
RF013 - Remover Itens Cardápio | Uma turma tem: código, professor, sala e horários (horário da turma). Uma turma é de um componente curricular. Uma turma tem um ou mais professores. Uma turma tem uma ou mais salas. Uma turma tem vários horários de aulas. | Chefes e Coordenadores |
RF014 - Listar Itens do Cardápio | Uma turma tem: código, professor, sala e horários (horário da turma). Uma turma é de um componente curricular. Uma turma tem um ou mais professores. Uma turma tem uma ou mais salas. Uma turma tem vários horários de aulas. | Chefes e Coordenadores |

##Lista de Requesitos Funcionais do Sistema

Documento construído a partir dos modelos disponibilizados na disciplina de Engenharia de Software II

###Descrição

Esse documento apresenta uma lista de requisitos funcionais, levantados através de uma BrainStorm de modo a resolver a problemática proposta pelo dono de um restaurante acerca do gerenciamento de pedidos do mesmo.


### Sistema de Login 


|||
|--|--|--|
| <b> Descrição </b> | O Administrador ou Funcionário consegue acesso ao sistema através de um Login que passa por um processo de validação e verificação desses dados. Isso ocorre através através da obtenção de alguns dados do usuário do sistema, como Email e Senha.|



|||
|--|--|--|
|  |  <b> Requisitos Funcionais Envolvidos </b>|
| <b> RF001 </b> |  Sistema de login|


<br>
<br>
<br>


### Manter Funcionário

|||
|--|--|--|
| <b> Descrição </b> |O Administrador realiza ações acerca do Funcionário de modo que este seja capaz de adicionar, alterar, listar ou remove-lo do sistema.| 

|||
|--|--|--|
|  |  <b> Requisitos Funcionais Envolvidos </b>| 
| <b> RF002 </b> |  Adicionar Funcionário|
| <b> RF003 </b> |  Alterar Funcionário|
| <b> RF004 </b> |  Listar Funcionário|
| <b> RF005 </b> |   Deletar Funcionário|


<br>
<br>
<br>

###Manter Cardápio


|||
|--|--|--|
| <b> Descrição </b> | O administrador do sistema deseja realizar ações sob o cardápio, podendo adicionar, excluir, listar e altera-lo. Para realizarmos o cadastro desse cardápio devemos fornecer informações que consistem em uma lista de alimentos que o compõe |

|||
|--|--|--|
|  |  <b> Requisitos Funcionais Envolvidos </b>|
| <b> RF006 </b> |  Adicionar Cardápio|
| <b> RF007 </b> |  Alterar Cardápio|
| <b> RF008 </b> |  Listar Cardápio|
| <b> RF009 </b> |   Deletar Cardápio|


<br>
<br>
<br>


### Pagamento

|||
|--|--|--|
| <b> Descrição </b> | Conjuntos de requisitos referentes a parte de vendas desse restaurante. Através dele será possivel realizar uma compra. |

|||
|--|--|--|
|  |  <b> Requisitos Funcionais Envolvidos </b>|
| <b> RF0010 </b> |  Realizar Pagamentos|


<br>
<br>
<br>

### Gerenciar Pedidos

|||
|--|--|--|
| <b> Descrição </b> |  Engloba adicionar, listar, alterar e excluir itens do pedido, seus atributos são: Numeração da mesa, itens, andamento/status do pedido. O funcionário    controlará o sistema e o cliente informará a escolha do pedido.
 |

|||
|--|--|--|
|  |  <b> Requisitos Funcionais Envolvidos </b>|
| <b> RF0011 </b> |  Adiconar Itens ao Estoque |
| <b> RF0012 </b> |  Listar Itens do Estoque |
| <b> RF0013 </b> |  Alterar Itens ao Estoque |
| <b> RF0014 </b> |  Remover Itens ao Estoque |
