---
title: "Проблемы с WAMPServer 2.0i"
translation: "_legacy/getting-started/problems-with-wampserver-2.0i"
---

# Как заставить WAMPServer 2.0i работать на MODx Revolution

У Мэри (einsteinsboi) есть отличный пост в блоге об использовании WAMPServer 2.0i с MODx Revolution и о некоторых проблемах, с которыми вы можете столкнуться.

<http://codingpad.maryspad.com/2010/01/11/modx-revolution-and-wamp/>

Краткое резюме и объяснение ниже.

## WAMPServer использует несоответствующие сборки MySQL Server и Client

Обычно в любой конфигурации сервера лучше всего убедиться, что версии MySQL-сервера и клиентской сборки совпадают. WAMPServer позволяет вам запускать свой стек с различными версиями комбинаций PHP / MySQL.

Дочерняя проблема возникает в версии PHP 5.2.11 WAMPServer 2.0i. Он устанавливает версию сервера на 5.1.36, а версию клиента на 5.0.51a.. MODx [не поддерживает 5.0.51a](getting-started/installation/troubleshooting/mysql-5.0.51 "MySQL 5.0.51 Проблемы"), и, следовательно, не будет установлен с этой конфигурацией.

## Решение

Чтобы это исправить, просто запустите WAMPServer со сборкой PHP 5.3.0. WAMPServer 2.0i установит для сервера значение 5.1.36, а для клиента - 5.0.5-dev. Хотя все еще не оптимально, это позволит Revolution работать без сбоев в MySQL.