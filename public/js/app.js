function App()
{
    var obj = this;
    
    /**
     * Função para seguir um usuário
     * 
     * @param int id do usuário que vai ser seguido
     * @returns void
     */
    obj.followerUser = function(id)
    {
        $.post( 
            'ajax/follower', 
            {
              id:id
            }, 
            function(data) 
            {
                if(data < 0)
                {
                    alert('Realize o login');
                }
                else if(data == 1)
                {
                    $('.profile-image button').removeClass('btn-primary').addClass('btn-success').html('Seguindo');
                }
                else if(data == 2)
                {
                    $('.profile-image button').removeClass('btn-success').addClass('btn-primary').html('Seguir');
                }
                else
                {
                    alert('Tivemos um problema, tente novamente !');
                }
            }
        );
    }
    
    var id_item = 0;
    obj.modalItem = function(id)
    {
        id_item = id;
        
        $.post( 
            'ajax/profilemodalitem', 
            {
              id:id
            }, 
            function(data) 
            {
                if(data)
                {
                    console.log(data);
                    var imgs = $.parseJSON(data.img_link);
                    $('#item-modal-image').attr('src', 'imagem.php?p='+data.img_path+imgs[0]+'&w=500');
                    $('#item-modal-name').html(data.title);
                    $('#item-modal-description').html(data.description);
					
                    if(data.game)
                    {
                            $('#item-modal-console').html(data.console.name);
                    }
                    if(data.game)
                    {
                            $('#item-modal-game').html(data.game.name);
                    }
					
                    $('#item-modal-comment-count').html(data.comments.comments_count);
                    
                    
                    var likesUsersHTML = '';
                    $.each(data.likes.list,function(i, value){
                        likesUsersHTML += '<a href="'+value.profile_name+'">'+value.name+'</a>, ';
                    });
                    $('#item-modal-likes-count').html(data.likes.likes_count);
                    $('#item-modal-likes-users').html(likesUsersHTML.substring(0, likesUsersHTML.length - 2));
                    
                    
                    var commentsHTML = '';
                    $.each(data.comments.list,function(i, value){
                        img = '';
                        if(value.img_user)
                            img = value.img_user[0];
                        commentsHTML = '<li><span><a href="'+value.profile_name+'"><img src="http://www.cormus.com.br/colecao/public/imagem.php?p=data/user/'+img+'&w=32&cropw=32&croph=32" /></a> <b><a href="'+value.profile_name+'">'+value.name+'</a>:</b></span> '+value.comment+'</li>' + commentsHTML;
                    });
                    $('#item-modal-comments').html(commentsHTML);
                    $('.profile-modal-item').modal('show');
                }
            }
        );
    }

    obj.itemComment = function()
    {
        var comment = $('textarea[name=comment]');
        if(comment.val())
        {
            $.post( 
                'ajax/itemcomment', 
                {
                  id:id_item,
                  comment:comment.val()
                }, 
                function(data) 
                {
                    if(data)
                    {
                        if(data.message.code != 0)
                        {
                            alert(data.message.text);
                            return false;
                        }
                        
                        comment.val('');
                        $('#item-modal-comments').append('<li><span><a href="'+data.user.profile_name+'"><img src="http://www.cormus.com.br/colecao/public/imagem.php?p=data/user/'+data.user.img+'&w=32&cropw=32&croph=32" /</a><b><a href="'+data.user.profile_name+'">'+data.user.name+'</a>:</b></span> '+data.comment.text+'</li>');
                    }
                },
                'json'
            );
        }
        else
        {
                alert('Informe seu comentário');
        }
    }

    obj.itemCommentLine = function(id_item)
    {
        var comment = $('textarea[name=comment-'+id_item+']');
        if(comment.val())
        {
            $.post( 
                'ajax/itemcomment', 
                {
                  id:id_item,
                  comment:comment.val()
                }, 
                function(data) 
                {
                    if(data)
                    {
                        if(data.message.code != 0)
                        {
                            alert(data.message.text);
                            return false;
                        }
                        comment.val('');
                        $('#item-line-comments-'+id_item).append('<li><span><a href="'+data.user.profile_name+'"><img src="http://www.cormus.com.br/colecao/public/imagem.php?p=data/user/'+data.user.img+'&w=32&cropw=32&croph=32" /</a><b><a href="'+data.user.profile_name+'"> '+data.user.name+'</a>:</b></span> '+data.comment.text+'</li>');
                    }
                },
                'json'
            );
        }
        else
        {
                alert('Informe seu comentário');
        }
    }
}
var app = new App();