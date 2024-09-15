<h1 align="center" style="font-weight: bold;">🚘 SmartPark 🛜</h1>

<p align="center">
  <b>Projeto desenvolvido ao longo das disciplinas de Front-End I e Back-End I da minha faculdade. O SmartPark é um sistema para gerenciamento de estacionamentos simples e intuitivo</b>
</p>

<br>
<p align="center">
  • <a href="#executando">Executando na sua máquina</a> •
  <a href="#pastas">Estrutura das Pastas</a> •
  <a href="#licenca">Licença</a> •
</p>

<h2> 🖥️ Tecnologias Utilizadas</h2>

<div align="center"> 
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" height="40" alt="html5 logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" height="40" alt="css3 logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg" height="40" alt="bootstrap logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" height="40" alt="javascript logo"  />
  <img width="12" />
  <img src="https://cdn.simpleicons.org/jquery/0769AD" height="40" alt="jquery logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" height="40" alt="php logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" height="40" alt="mysql logo"  />
</div>

<br>
<h2 id="executando">🚀 Executando o projeto na sua máquina local</h2>

<h3>Pré-Requisitos</h3>

- [PHP 8](https://github.com)
- [Servidor Apache](https://www.apachefriends.org/pt_br/download.html)
- [MySQL](https://dev.mysql.com/downloads/installer/)

<h3>Clonando o projeto</h3>

Como clonar o projeto

```bash
git clone https://github.com/matheusaguiarrr/smartpark.git
```

<h3>Criando e Conectando o Banco de Dados</h3>

- Crie um banco chamado INNOUT
- Execute o arquivo sql contido na pasta extras
- Dentro da pasta src, preencha o arquivo env.sample.ini com as seguintes informações
 
![image](https://github.com/matheusaguiarrr/InNout/assets/106553412/0299438c-f572-4b51-9605-945cc6c0f299)

- Mude o nome do arquivo para env.ini

<br>
<h2 id="pastas">🗂️ Estrutura das Pastas</h2>

```
extras/
public/
├── assets/
│   ├── css/
│       └── bootstrap
│       └── components
│       └── fontawesome
│   ├── img/ 
│   ├── js/
src/
├── config/
├── controllers/
├── exceptions/
├── imagens/
│   └── parks
│   └── users
├── models/
├── views/
│   └── template
```
<br>
<h2 id="licenca">📝 Licença</h2>

Este projeto está sob a licença [MIT](LICENSE) license
