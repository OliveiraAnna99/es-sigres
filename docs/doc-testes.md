# Relatório de Testes de Módulo/Sistema

## US001-Manter Funcionário
### Teste 01:Adicionar funcionário
| Descrição                                             | Especificação 								   |
| ----------------------------------------------------- | ------------------------------------------------ |
| A1-Ator preenche os dados requeridos                  | A função deve adicionar um funcionário ao sistema|
| A2-Ator seleciona a opção "Cadastrar"                 | com seus dados válidos, como, CPF, número, idade,|
| A3-O sistema salva os dados                           | endereço e nome.                                 |
| A4-O sistema retorna para a pagina "Funcionários"     |                                                  |
| A5-Fim do fluxo                                       | A especificação está de acordo com o UserStorie. |
| Resultado:                                            | Funcionário adicionado                           |

### Teste 02:Alterar funcionário
| Descrição                                             | Especificação 						           |
| ----------------------------------------------------- | ------------------------------------------------ |
| B1-Ator seleciona o funcionário para alteração        | A função deve alterar os dados de um funcionário |
| B2-Ator edita os campos requeridos para alteração     | já existente de forma que seus dados continuem   |
| B3-O sistema salva os dados alterados                 | válidos.                                         |
| B4-O sistema retorna para a pagina "Funcionários"     |                                                  |
| B5-Fim do fluxo                                       | A especificação está de acordo com o UserStorie. |
| Resultado:                                            | Funcionário alterado                             |

### Teste 03:Excluir funcionário
| Descrição                                             | Especificação 							   	   |
| ----------------------------------------------------- | ------------------------------------------------ |
| C1-Ator executa o fluxo de Listar funcionários        | A função deve excluir um funcionário já existente|
| C2-Ator seleciona a opção "Excluir"                   | no sistema.                                      |
| C3-O sistema rtorna a pagina "Funcionários"           |                                                  |
| C5-Fim do fluxo                                       | A especificação está de acordo com o UserStorie. |
| Resultado:                                            | Funcionário excluido                             |


## US002-Manter Cardápio
### Teste 01:Adicionar cardápio
| Descrição                                             | Especificação 								   |
| ----------------------------------------------------- | ------------------------------------------------ |
| A1-Ator preenche os dados requeridos                  | A função deve adicionar um prato no cardápio do  |
| A2-Ator seleciona a opção "Adicionar"                 | sistema, com preço, imagem, igrendientes e nome. |
| A3-O sistema salva os dados                           |                                                  |
| A4-O sistema retorna para a pagina "Cardápio"         |                                                  |
| A5-Fim do fluxo                                       | A especificação está de acordo com o UserStorie. |
| Resultado:                                            | Cardápio adicionado                              |

### Teste 02:Alterar cardápio
| Descrição                                             | Especificação 								   |
| ----------------------------------------------------- | ------------------------------------------------ |
| B1-Ator seleciona o cardápio para alteração           | A função deve alterar um prato já existente no   |
| B2-Ator edita os campos requeridos para alteração     | cardápio, de forma válida.                       |
| B3-O sistema salva os dados alterados                 |                                                  |
| B4-O sistema retorna para a pagina "Cardápio"         |                                                  |
| B5-Fim do fluxo                                       | A especificação está de acordo com o UserStorie. |
| Resultado:                                            | Cardápio alterado                                |

### Teste 03:Excluir cardápio
| Descrição                                             | Especificação 								   |
| ----------------------------------------------------- | ------------------------------------------------ |
| C1-Ator executa o fluxo de Listar cardápio            | A função deve excluir um prato do cardápio do    |
| C2-Ator seleciona a opção "Excluir"                   | sistema.                                         |
| C3-O sistema retorna a pagina "Cardápio"              |                                                  |
| C5-Fim do fluxo                                       | A especificação está de acordo com o UserStorie. |
| Resultado:                                            | Cardápio excluido                                |


## US003-Manter Estoque
### Teste 01:Adicionar estoque
| Descrição                                             | Especificação 								   |
| ----------------------------------------------------- | ------------------------------------------------ |
| A1-Ator preenche os dados requeridos                  | A função deve adicionar um item ao estoque do    |
| A2-Ator seleciona a opção "Adicionar"                 | sistema, com suas informações, como, quantidade, |
| A3-O sistema salva os dados                           | estado, válidade e nome.                         |
| A4-O sistema retorna para a pagina "Estoque"          |               								   |
| A5-Fim do fluxo                                       | A especificação está de acordo com o UserStorie. |
| Resultado:                                            | Estoque adicionado                               |

### Teste 02:Alterar estoque
| Descrição                                             | Especificação 								   |
| ----------------------------------------------------- | ------------------------------------------------ |
| B1-Ator seleciona o estoque para alteração            | A função deve alterar um item no estoque do      |
| B2-Ator edita os campos requeridos para alteração     | sistema, de forma válida.                        |
| B3-O sistema salva os dados alterados                 |                                                  |
| B4-O sistema retorna para a pagina "Estoque"          |                                                  |
| B5-Fim do fluxo                                       | A especificação está de acordo com o UserStorie. |
| Resultado:                                            | Estoque alterado                                 |

### Teste 03:Excluir estoque
| Descrição                                            | Especificação 		     						  |
| ---------------------------------------------------- | ------------------------------------------------ |
| C1-Ator executa o fluxo de Listar estoque            | A função deve excluir um item no estoque do      |
| C2-Ator seleciona a opção "Excluir"                  | sistema.                                         |
| C3-O sistema retorna a pagina "Estoque"              |                                                  |
| C5-Fim do fluxo                                      | A especificação está de acordo com o UserStorie. |
| Resultado:                                           | Cardápio excluido                                |
