Para rodar o tailwind css:
Abra o terminal no vscode e digite:
npm i

Edite os arquivos .html

Para funcionar os estilos os arquivos devem importar o output.css que está dentro de src

`<link href="Caminho até output.css" rel="stylesheet" >`

Todas as págnas devem ser criadas dentro da pasta html e somente o index fica fora

Para rodar o tailwind escreva isso no terminal

`npx tailwindcss -i ./src/global.css -o ./src/output.css --watch`

Cada pagina deve conter sua pasta

Em assets ficam as imagens