# Sistema de Agendamento de Carros

## Nome do aluno
MATHEO BATISTA

## Tecnologia utilizada
O sistema foi desenvolvido utilizando Laravel, PHP, MySQL, HTML e CSS, com execução no Laragon.

## Usuários para teste

Administrador  
Login: admin  
Senha: 123

Atendente  
Login: atendente  
Senha: qwer

## Banco de dados
Nome do banco: locadora00

## Sobre o sistema
Este projeto foi criado para controlar o agendamento de veículos de uma locadora.

Nele é possível acessar o sistema por login, cadastrar novos carros, visualizar os veículos cadastrados, editar informações, excluir carros disponíveis e realizar o agendamento de locação.

Ao agendar um veículo, o sistema registra os dados do cliente e as datas de retirada e devolução, alterando automaticamente o status do carro para agendado.

Quando o agendamento é finalizado, o carro volta para disponível e o registro do agendamento é atualizado.