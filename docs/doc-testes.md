# Relatório de Testes de Módulo/Sistema

## US001-Manter Funcionário
### Teste 01:Adicionar funcionário
| Descrição                                             | Especificação 								   |
| ----------------------------------------------------- | ------------------------------------------------ |
| A1-Lista funcionários com permissão                   | Especificação OK                                 |
| A2-Lista funcionários com permissão                   | Especificação OK                                 |
| A3-Usuário pode ver lista de funcionários             | Especificação OK                                 |
| A4-Usúario não pode adicionar funcionário             | Especificação OK								   |
| A5-Nome e CPF são necessários                         | Especificação OK                                 |
| A6-Nome e CPF devem ser validos                       | Especificação OK                                 |
| A7-Informações são salvas no banco de dados           | Especificação OK                                 |
| Resultado:                                            | Adicionar funcionário OK                         |

### Teste 02:Alterar funcionário
| Descrição                                             | Especificação 						           |
| ----------------------------------------------------- | ------------------------------------------------ |
| B1-Usúario não pode alterar funcionário               | Especificação OK                                 |
| B2-Novos dados devem ser validos                      | Especificação OK                                 |
| B3-Alterações são salvas no banco de dados            | Especificação OK                                 |
| Resultado:                                            | Alterar funcionário OK                           |

### Teste 03:Excluir funcionário
| Descrição                                             | Especificação 							   	   |
| ----------------------------------------------------- | ------------------------------------------------ |
| C1-Usúario não pode deletar funcionário               | Especificação OK                                 |
| C2-Alterações salvas no banco de dados                | Especificação OK                                 |
| Resultado:                                            | Deletar funcionário OK                           |


## US002-Manter Cardápio
### Teste 01:Adicionar cardápio
| Descrição                                                     | Especificação 								   |
| ------------------------------------------------------------- | ------------------------------------------------ |
| A1-Lista itens com permissão                                  | Especificação OK                                 |
| A2-Mostra itens com permissão                                 | Especificação OK                                 |
| A3-Usúario pode ver cardápio                                  | Especificação OK                                 |
| A4-Usúario não pode adicionar itens                           | Especificação OK								   |
| A5-Nome, ingredientes, valor, imagem e status são necessários | Especificação OK                                 |
| A6-Nome deve cónter menos de 60 caracteres                    | Especificação OK                                 |
| A7-Informações são salvas no banco de dados                   | Especificação OK                                 |
| Resultado:                                                    | Adicionar cardápio Ok                            |

### Teste 01:Alterar cardápio
| Descrição                                                     | Especificação 								   |
| ------------------------------------------------------------- | ------------------------------------------------ |
| B1-usúario não pode alterar cardápio                          | Especificação OK								   |
| B2-Nome, ingredientes, valor e status devem ser atualizados   | Especificação OK                                 |
| B3-Nome deve cónter menos de 60 caracteres                    | Especificação OK                                 |
| B4-Alterações são salvas no banco de dados                    | Especificação OK                                 |
| Resultado:                                                    | Alterar cardápio OK                              |

### Teste 01:Deletar cardápio
| Descrição                                                     | Especificação 								   |
| ------------------------------------------------------------- | ------------------------------------------------ |
| C1-Usúario não pode deletar cardápio                          | Especificação OK								   |
| C2-Alterações são salvas no banco de dados                    | Especificação OK                                 |
| Resultado:                                                    | Deletar cardápio OK                              |


## US003-Manter Estoque
### Teste 01:Adicionar estoque
| Descrição                                                     | Especificação 								   |
| ------------------------------------------------------------- | ------------------------------------------------ |
| A1-Lista itens com permissão                                  | Especificação OK                                 |
| A2-Mostra itens com permissão                                 | Especificação OK                                 |
| A3-Usúario pode ver lista de estoque                          | Especificação OK                                 |
| A4-Usuário não pode criar estoque                             | Especificação OK								   |
| A5-Item, quantidade e data são necessários                    | Especificação OK                                 |
| A6-quantidade não pode númerico                               | Especificação OK                                 |
| A7-Informações são salvas no banco de dados                   | Especificação OK                                 |
| Resultado:                                                    | Adicionar estoque OK                             |

### Teste 01:Alterar estoque
| Descrição                                                     | Especificação 								   |
| ------------------------------------------------------------- | ------------------------------------------------ |
| B1-Altera item com permissão                                  | Especificação OK                                 |
| B2-Usuário não pode alterar estoque                           | Especificação OK								   |
| B3-Item, quantidade e data devem validos                      | Especificação OK                                 |
| B4-quantidade não pode númerico                               | Especificação OK                                 |
| B5-Informações são salvas no banco de dados                   | Especificação OK                                 |
| Resultado:                                                    | Alterar estoque OK                               |

### Teste 01:Deletar estoque
| Descrição                                                     | Especificação 								   |
| ------------------------------------------------------------- | ------------------------------------------------ |
| C1-Usuário não pode Deletar estoque                           | Especificação OK								   |
| C2-Informações são salvas no banco de dados                   | Especificação OK                                 |
| Resultado:                                                    | Deletar estoque OK                               |
