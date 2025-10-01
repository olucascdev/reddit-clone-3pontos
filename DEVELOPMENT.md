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

##### 27/09

Partir para a parte da implementação do painel admin, cara, teve um problema com resources criados que não estavam aparecendo na home e isso eu perdi muito tempo,
tava cogitando em começar os controllers, mas pedi ajuda ao Daniel no discord e ele me ajudou, thanks!

No Admin não tive muitas dificuldades, fiz algo bem simples, um dashboard com as principais informações com infos fakes só para ter uma noção,
fiz os resources de Users, Posts e Subreddits, subnavigations de User dentro de Subreddits e virse-versa. eu optei em não colocar muita coisa, pois
eu ja tava pensando em várias coisas que eu poderia fazer, mas o tempo era curto e eu não queria me perder em detalhes, então optei por algo simples e funcional.
e tambem personalizei um pouco.

Depois pedi para a IA me ajudar a fazer as factories e Dataseeders com base no bd e relacionamentos, eu estruturei da seguinte forma:
cada User vai ser vinculado a 2 a 3 sub reddits e esse mesmo user tenha 3 posts , 2 comentários em outros posts, e votes (up ou down)
aleatorio em 3 posts e 2 comentarios. Fiz isso para facilitar os testes e visualização do projeto.

##### 28/09, 29/09 e 30/09

Para ser sincero nessa parte eu fiquei meio perdido, eu tinha pensado em fazer uma API já que era pra pensar em escalabilidade,eu tava pensando muito alem do que o desafio pedia,
por isso eu li o desafio acho que mais de 10x pra ver realmente o que era pedido.
Mas eu defini em fazer a parte do back end com controllers e services, e depois fazer as views.
Para não perder muito tempo eu ja instalei o laravel breeze por conta da auth que facilitaria.

E comecei a logica do user não logado (guest), basicamente o guest somente por ver as coisas(Posts, Comentarios, Subreddits)
se por acaso ele clicar em qualquer ação(Comentar, Votar etc) ele é diretamente direcionado para a tela de login.

Depois pensei na estrutura:
Middleware -> Form Requests -> Controllers -> Services -> views

Fiz um middleware para aplicar nas rotas que o user precisa estar logado, e ser !user() ele é redirecionado para o /register do breeze.
tmb coloquei a verificação em componentes dinamicos no livewire.(mais tarde)

Depois fui pra parte de HomeController, deixei ele só para exibir os posts, A ia me deu uma ideia
de criar um PostService para lidar com a logica de pegar os posts, assim eu teria a logica separada do controller, e facilitaria
a manutenção do código no futuro, eu só faria um **construct()** para não precisar ficar repetindo na home e no subredditController, além tmb ser mais rápido, por não precisar fazer uma query para o BD.
Nisso controller só precisaria "pedir" os posts pra esse service. logo depois tmb utilizei o mesmo service para o SubredditController.

para as ações eu fiz com Livewire, eu tinha pensado em fazer com controllers normais, mas ia pedir um Post ia passar pelo store().
Eu não manjo muito de Livewire mais eu entendi como funciona a IA também me ajudou a fazer os componentes.
No blade eu chamo esse componente, ele envia uma requisição AJAX para o back sem dar refresh na pagina, e o componente faz a ação e retorna a view atualizada.

Depois eu fui fazendo as views, fiz boa parte das views e componentes com Ia, principalmente no começo, fazendo a base da estrutura e organizando as cores do projeto
com Tailwind.

Foi interessante esse desafio, eu realmente aprendi bastante coisa fazendo, pesquisando e tentando, algumas noites mal dormidas, mas valeu a pena.
Não sei se vou conseguir fazer os Testes com Pest, mas vou tentar fazer se der tempo até as 13h...

##### 01/10

Não fiz os testes :( , porem coloquei o laravel sail para rodar o projeto em container com somente pgsql

cara simplesmente minhas views sumiram, fui colocar o laravel sail e testar ele e não tinha pagina de home, post, subreddit, tudo que eu passei a madrugada fazendo, isso é surreal!

bom, eu consegui as bases que eu tinha feito com IA por sorte apenas 6 arquivos sumiram sem resgitro, eu consegui pegar a base dos componentes de views e fiz na IA muito rapido, já peço desculpa por isso, realmente
eu tinha feito bem estruturado igual no figma, mas agr eu tmb n tenho como provar, eu realmente n sei o que houve, mas enfim, eu refiz os arquivos que eu tinha perdido e consegui terminar o projeto a tempo.
