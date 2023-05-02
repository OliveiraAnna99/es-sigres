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

## Perfis de Usuários

| Usuários      | Descrição                                                                                                                                                                                                                   |
| ------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Administrador | Esse usuário terá total acesso às diversas funcionalidades do sistema, sendo capaz de adicionar novos funcionários ao sistema, adicionar novos cardápios, bem como adicionar novos itens que estarão presentes no cardápio. |
| Funcionário   | Esse usuário terá acesso privilegiado a algumas ações do sistema, sendo responsável pela gerência de pedidos, podendo adicionar ou cancelar pedidos, além de efetuar o pagamento.                                           |
| Cliente       | Esse usuário não terá interação com o sistema.                                                                                                                                                                              |

## Lista de Requisitos Funcionais

| Requisito                         | Descrição                                                                                                                                                                              | Ator                         |
| --------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------- |
| RF001 - Sistema Login             | O usuário realiza login no sistema de modo que este passa por um processo de validação dos campos e dos dados para assim dar acesso ao sistema                                         | Administrador e Funcionário  |
| RF002 - Adicionar Funcionário     | O administrador adiciona um novo funcionário ao sistema informando dados como: nome, cpf, rg, email, login e senha                                                                     | Administrador                |
| RF003 - Alterar Funcionário       | os dados anteriormente preenchidos durante o cadastro do usuário são atualizados                                                                                                       | Administrador                |
| RF004 - Excluir Funcionário       | O funcionário anteriormente cadastrado no sistema é removido deste                                                                                                                     | Administrador                |
| RF005 - Listar Funcionários       | Uma lista com os funcionários cadastrados e que estão ativos no sistema é exibida                                                                                                      | Administrador                |
| RF006 - Realizar Pagamento        | Após a solicitação da compra do produto, um boleto é gerado para que seja realizado o pagamento dos serviços fornecidos                                                                | Administrador                |
| RF007 - Adicionar Cardápio        | O administrador ou funcionário adiciona um novo cardápio ao sistema informando dados que consistem em uma lista de itens que possuem: nome do prato, valor, descrição dos ingredientes | Administrador ou Funcionário |
| RF008 - Alterar Cardápio          | Os dados de um cardápio anteriormente cadastrado são atualizados                                                                                                                       | Administrador                |
| RF009 - Excluir Cardápio          | Um cardápio anteriomente cadastrado é removido do sistema                                                                                                                              | Administrador                |
| RF010 - Listar Cardápios          | É feito uma listagem de cardápios que estão cadastrados no sistema e que se encontram ativos para aquele dia                                                                           | Administrador ou Funcionário |
| RF011 - Adiconar Itens ao Estoque | O administrador ou funcionário adiciona um item ao sistema informando dados                                                                                                            | Chefes e Coordenadores       |
| RF012 - Alterar Itens do Estoque  | Os dados de um item anteriormente cadastrado são atualizados                                                                                                                           | Chefes e Coordenadores       |
| RF013 - Remover Itens do Estoque  | Um item anteriomente cadastrado é removido do sistema                                                                                                                                  | Chefes e Coordenadores       |
| RF014 - Listar Itens do Estoque   | É feito uma listagem de itens que estão cadastrados no sistema                                                                                                                         | Chefes e Coordenadores       |

## Lista de Requisitos Não-Funcionais

| Requisito                                   | Descrição                                                                                                                     |
| ------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------- |
| RNF001 - Quantidade de estações disponíveis | Estabelece um valor mínimo para a quantidade de estações onde o sistema será implantado para que ocorra um bom funcionamento. |
| RNF002 - Quantidade de displays no ambiente | Determina que tenha ao menos um display para identificar os pedidos finalizados.                                              |
|                                             |

## Riscos

Tabela com o mapeamento dos riscos do projeto, as possíveis soluções e os responsáveis.

| Data       | Risco                                                                 | Prioridade | Responsável | Status  | Providência/Solução                                                                     |
| ---------- | --------------------------------------------------------------------- | ---------- | ----------- | ------- | --------------------------------------------------------------------------------------- |
| 01/12/2022 | Divisão de tarefas mal sucedida                                       | Baixa      | Gerente     | Vigente | Acompanhar de perto o desenvolvimento de cada membro da equipe                          |
| 01/12/2022 | Má gestão de tempo para cada tarefa                                   | Média      | Gerente     | Vigente | Acompanhar o desenvolvimento e prazo de cada tarefa.                                    |
| 01/04/2023 | Não aprendizado das ferramentas utilizadas pelos componentes do grupo | Alta       | Todos       | Vigente | Reforçar estudos sobre as ferramentas e aulas com a integrante que conhece a ferramenta |

### Referências
