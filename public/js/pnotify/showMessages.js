function showMessage(title,text,type)
{
    var message = new PNotify({
                        title: title,
                        text: text,
                        type: type
                    });

    return message;
}