# Contagem de Pontos de Função

A contagem em **Pontos de Função (PF)** permite a determinação do **Tamanho Funcional** do projeto de software.
A **análise de ponto de função (APF)** é um processo para a identificação e contagem das funcionalidades baseadas nos conceitos
de **Funções de Dados** e **Funções de Transação**.

Os conceitos relacionados com dados são os **Arquivos de Lógica Interna (ALI)** e os **Arquivos de Interface Externa (AIE)**,
e os conceitos relacionados com operações externas a fronteira do sistema são:
**Entrada Externa (EE)**, **Consulta Externa (CE)** e **Saída Externa (SE)**.

Existem várias práticas de contagem, cada uma com suas especificidades.

## Contagem Indicativa

Na contagem indicativa (Ci) só é necessário conhecer e analisar as **Funções de Dados**. Desta forma,
os **ALI**s (Arquivos Lógicos Internos) com o valor de _35 PF_ cada e os **AIE**s (Arquivos de Interface Externa) com o valor de _15 PF_ cada.

### Contagem Indicativa

| Função de Dado  | Entidades Relacionadas | Tamanho em PF |
| --------------- | ---------------------- | :-----------: |
| ALI Funcionário | Funcionário            |     35 PF     |
| ALI Estoque     | Funcionário            |     35 PF     |
| ALI Pedidos     | Funcionário            |     35 PF     |
| ALI Pagamento   | Cliente                |     35 PF     |
| ALI LOGIN       | Funcionário            |     35 PF     |
| **Total**       | **Ci**                 |  **175 PF**   |

### Contagem Detalhada (Cd)

| Descrição                  | Tipo     | RLR     | DER     | Complexidade     |   Tamanho em PF   |
| -------------------------- | -------- | ------- | ------- | ---------------- | :---------------: |
| ALI Funcionário            | ALI      | 1       | 2       | Baixa            |       7 PF        |
| ALI Estoque                | ALI      | 1       | 3       | Baixa            |       7 PF        |
| ALI Pedidos                | ALI      | 1       | 3       | Baixa            |       7 PF        |
| ALI Pagamento              | ALI      | 1       | 2       | Baixa            |       5 PF        |
| ALI LOGIN                  | ALI      | 1       | 2       | Baixa            |       5 PF        |
| **Descrição**              | **Tipo** | **ALR** | **DER** | **Complexidade** | **Tamanho em PF** |
| Adicionar Funcionário      | EE       | 1       | 2       | Baixa            |       3 PF        |
| Alterar Funcionário        | EE       | 1       | 2       | Baixa            |       3 PF        |
| Excluir Funcionário        | EE       | 1       | 2       | Baixa            |       3 PF        |
| Listar Funcionário         | CE       | 1       | 2       | Baixa            |       3 PF        |
| Adicionar Itens do Estoque | EE       | 1       | 3       | Média            |       3 PF        |
| Listar Itens do Estoque    | CE       | 1       | 3       | Média            |       3 PF        |
| Alterar Itens do Estoque   | EE       | 1       | 3       | Média            |       3 PF        |
| Remover Itens do Estoque   | EE       | 1       | 3       | Média            |       4 PF        |
| **Total**                  |          |         |         | **Cd**           |     **xx PF**     |
