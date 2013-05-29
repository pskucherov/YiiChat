function ChatPosition() {
    this.pageTop   = 0;
    this.pageWidth = 0;
    this.pageLeft  = 0;

    this.closeImgWidth  = $('#closeImg').width();
    this.chatBlockWidth = $('#chat-block').width();

    this.closeImg  = '';
    this.openImg   = '';
    this.offsetTop = 0;
}

ChatPosition.prototype.init = function(closeImg, openImg, offsetTop) {
    this.closeImg  = closeImg;
    this.openImg   = openImg;
    this.offsetTop = offsetTop;
}

ChatPosition.prototype.getPagePos = function() {
    this.pageTop   = $('#page').offset().top;
    this.pageWidth = $('#page').width();
    this.pageLeft  = $('#page').offset().left;
}

ChatPosition.prototype.closeChat = function() {
    $('#chat-block').css('display', 'none');
    $('#closeImg').css('left', (this.pageLeft + this.pageWidth - this.closeImgWidth));
    $('#closeImg').css('top', (this.pageTop + this.offsetTop));
    $('#closeImg').attr('src', this.openImg);
}

ChatPosition.prototype.openChat = function() {
    $('#chat-block').css('left', ( this.pageLeft + this.pageWidth - this.chatBlockWidth ));
    $('#chat-block').css('top', ( this.pageTop + this.offsetTop));
    $('#chat-block').css('display', 'inline-block');
    $('#closeImg').css('left', ($('#chat-block').offset().left - this.closeImgWidth));
    $('#closeImg').attr('src', this.closeImg);
}

ChatPosition.prototype.chatState = function() {
    if ( $('#chat-block').css('display') === 'none' ) {
        return false;
    }
    return true;
}

ChatPosition.prototype.changeState = function() {
    if ( !this.chatState() ) {
        this.openChat();
    } else {
        this.closeChat();
    }
}

ChatPosition.prototype.redraw = function() {
    this.getPagePos();
    if ( this.chatState() ) {
        this.openChat();
    } else {
        this.closeChat();
    }
}