<div id="chat-slide-out">
    <img src='<?php echo $openWinImageUrl; ?>' class="chatPos" id="closeImg"  >
    <div class="chatPos" id="chat-block" >
        <div id="chat-messages" class="chatSize chatBorder chatBody">
            <img src="<? echo $ajaxLoader; ?>" id="ajaxLoader" >
        </div>
        <div class="chatPostSize chatBorder chatPost">
            <?php
            echo CHtml::beginForm();
            echo CHtml::textField('chattext', '', array('id' => 'chatTextField', 'maxlength' => 100));
            echo CHtml::ajaxSubmitButton('SEND', CHtml::normalizeUrl(array('chat/chatRoom/post')),
                array(
                    'type'=>'POST',
                    'dataType'=>'json',
                    'success'=>'js:function(data){
                        if(data.result === "success"){
                            getNewMessages();
                        }
                      }',
                    'complete'=>'function() {
                        $("#chatTextField").val("");
                    }',
                )
                , array('id' => 'chatSubmitButton'));
            echo CHtml::endForm();
            ?>
        </div>
    </div>
</div>