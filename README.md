<h2>����������</h2>


���� � ��� ��� ���������� Yii Demo Blog - ������ ������������� ������������ �� ����.
���� ���, �� ��� ��������� ����������� 

* Apache/2.2.22;
* PHP/5.3.10; 
* MYSQL/5.0.8;
* Yii + Demo Blog (����� �� yiiblog.zip) 

** Yii Blog c ����������������� ����� ����� ����� �� yiiblog.zip.



<h2>���������</h2>


1. ����������� modules � extensions � protected

2. �������� � config/main.php chat � chatWidget
    'modules'=>array(
        ...
        'chat',
        'chatWidget'=>array(
            'class' => 'ext.chat.ChatWidget'
        ),
        ...
    ),

3. ������� � �� ������� tbl_chat (����� �� ����� tbl_chat.sql)

4. �������� ������ � �������������, ���� ���������� <?php $this->widget("ext.chat.ChatWidget"); ?>
* Div, ������������ �������� ���������� ������������, ������ ����� id="page". 
** ���������� � /protected/extensions/chat/assets/ChatPosition.js



<h2>������ ������</h2>


http://t1.kiev.ua/yiichat/idn-test-task/demos/blog/index.php

