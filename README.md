<h2>Требования</h2>


Если у вас уже установлен Yii Demo Blog - ничего дополнительно устнавливать не надо.
Если нет, то для установки потребуются 

* Apache/2.2.22;
* PHP/5.3.10; 
* MYSQL/5.0.8;
* Yii + Demo Blog (взять из yiiblog.zip) 

** Yii Blog c предустановленным чатом можно взять из yiiblog.zip.



<h2>Установка</h2>


1. Скопировать modules и extensions в protected

2. Добавить в config/main.php chat и chatWidget
    'modules'=>array(
        ...
        'chat',
        'chatWidget'=>array(
            'class' => 'ext.chat.ChatWidget'
        ),
        ...
    ),

3. Создать в БД таблицу tbl_chat (взять из файла tbl_chat.sql)

4. Добавить виджет в представление, путём добавления <?php $this->widget("ext.chat.ChatWidget"); ?>
* Div, относительно которого выбирается расположение, должен иметь id="page". 
** Изменяется в /protected/extensions/chat/assets/ChatPosition.js



<h2>Пример работы</h2>


http://t1.kiev.ua/yiichat/idn-test-task/demos/blog/index.php

