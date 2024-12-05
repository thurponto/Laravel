A API estará acessível em http://localhost:8000.
Explicação sobre a Funcionalidade Implementada
A API RESTful fornece um endpoint para o cadastro de profissões.
Valida os seguintes campos recebidos no corpo da requisição:
Nome: Obrigatório, texto.
Descrição: Opcional, texto.
Salário: Obrigatório, número.
Empresa: Obrigatório, texto.
Após validação, os dados são armazenados no banco de dados.
Descrição do Fluxo de Dados
O frontend envia os dados via método POST para o endpoint /api/profissoes.
A API valida os dados e os armazena no banco de dados usando Eloquent.
A API retorna uma resposta JSON indicando sucesso ou erros de validação.
O frontend processa e exibe a resposta ao usuário.
