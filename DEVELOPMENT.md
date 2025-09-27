# Annotations

[//]: # 'Todas suas anotações sobre o projeto. Esse arquivo será mais importante que boa parte do projeto!'

> OBS: Para esse desafio, decidi considerar como 'trade-off' toda a decisão consciente que tomei, não apenas a troca entre espaço e velocidade,
> mas sim a escolha de situações onde eu encontrasse um equilíbrio para realizar o desafio de maneira coerente, sem perder tempo com complexidades desnecessárias,
> por conta do pouco tempo para terminar o projeto.

> OBS2: Não sei se esse Documento é para escrever em inglês, mas inicialmente vou fazer ele em pt-br.

#

##### 25/09

Configurei o projeto, primeira dúvida que surgiu era em relação ao Sqlite, pois nunca tinha utilizado em nenhum projeto, pois já configurava diretamente o BD com Laravel Sail.
Depois de uma pesquisa rapida sobre, vi que era facil de ser utilizado, além de facilitar em projetos pequenos e em testes.

---

##### 26/09

Inicialmente para melhorar a organização, utilizei o Claude Ia para organizar a sequência ideal para entregar o Desafio no prazo ideal e ter um bom resultado, com o processo que eu + ele
construiu eu optei em utilizar o Trello por ser facil visualmente para criar os cards com as tarefas necessarias para ser feitas. Com base nas informações,
qual seria a sequência que optei para fazer o projeto:

- 1- Setup Inicial (Já tinha feito na noite anterior).
- 2- Análise do Figma.
- 3- Criação e Modelagem do Banco de Dados
- 4- Implementação do Painel Admin
- 5- Controllers
- 6- Frontend (Blade + Tailwind)
- 7- Testes

Depois de analisar o projeto no figma tirei algumas informações para criar as colunas das tables e relacionamentos...

###### (trade-off)

Veio algumas dúvidas, no Reddit original quando você apaga um comentário pai,
os comentarios filhos não são apagados (pelas minhas pesquisas) e fica meio-estranho e meio complicado pensar numa lógica
para isso então pouco tempo, então eu optando por apagar um comentario pai e todos os outros comentarios filhos serão apagados tambem.
Mas em contrapartida optei em deixar o comentario quando o user é apagado assim como no reddit tradicional e deixa o comentario e deixar tambem o voto.

Na criação das migrations, alguns pontos legais a se falar:

- Dentro da Table de 'Votes' e 'Comments', inicialmente eu tinha optado em deixar as FKs como 'post_id' e 'comment_id'na table de 'Votes', e 'post_id' na table de 'Comments', logo revisei a estrutura com o Claude, e
  ele me passou o conceito de relacionamento polimorfico e logo eu lembrei do video do Gustavo da BlackDev onde explicava sobre, nos projetos que eu participei foi poucas vezes que eu utilizei
  isso. então eu relembrei com o video dele e revisei com IA, depois conferir na IA se a estrutura do Bd iria mudar alguma coisa.
  Mas Resumindo, o pq do morph: foi uma decisão para ter possiveis escalabilidade na aplicação a longo prazo, Por exemplo, se no futuro o sistema evoluir para incluir uma seção de vídeos,
  não será necessário criar uma nova tabela ou uma nova lógica para comentários (video_comments). A estrutura com morphs já está preparada para isso, pois o mesmo sistema de comentários serve para qualquer tipo de conteúdo.

#

- Dentro da Table de Comments a IA tambem me ajudou na parte de comentários aninhados, eu já sabia que precisava de alguma forma de uum comentario responder a outro, e o claude me apresentou o auto-relacionamento na propria table
  'parent_comment_id' por s er nullable faz com que os primeiros comentarios existam sem depender de outro , enquanto as respostas sao vinculados no id do comentario pai

Depois de pedi para o claude IA da uma conferida na estrutura do meu BD para ver se tava tudo coerente conforme eu tinha pensado inicialmente, eu pedi para o Gemini fazer um diagrama para melhor visualização:

> https://encurtador.com.br/RVEW8
