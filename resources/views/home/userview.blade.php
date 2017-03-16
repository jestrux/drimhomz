<script>
    function comment_template(commentObj) {
        if(!commentObj.id)
            commentObj.id = "";

        comment = '';
        comment += '<div id="comment'+commentObj.id+'" class="a-comment item flex">';
        comment += '    <div class="avatar">';
        comment += '        <img src="'+ user_base_url + commentObj.user.dp+'" alt="'+commentObj.user.fname+'s dp">';
        comment += '    </div>';
        comment += '    <div class="item-text">';
        comment += '        <div class="title">';
        comment += '        <a href="/user/'+commentObj.user.id+'">'
        comment += '            '+commentObj.user.fname+ ' ' + commentObj.user.lname+'</a>';
        comment += '        </div>';
        comment += '        <p>'+commentObj.content+'</p>';
        comment += '    </div>';
        comment += '    <form id="deleteComment'+commentObj.id+'" action="deleteComment" method="POST">';
        comment += '        <input id="commentId" type="hidden" value="'+commentObj.id+'" name="id">';
        comment += '        <button type="button" onclick="deleteComment('+commentObj.id+')">'
        comment += '            delete';
        comment += '        </button>';
        comment += '    </form>';
        comment += '</div>';

        return comment;
    }

    function tangazo_tpl(ad){
        html  = '<li class="tangazo dh-card grid-item">';
        html +=   '<div class="image">';
        html +=     '<a href="'+ad.link+'" style="display: block"><img src="' + ad_base_url + ad.image_url+'" alt="'+ad.title+'"></a>';
        html +=   '</div>';
        html +=   '<div class="content">';
        html +=     '<h3>'+ad.title+'</h3>';
        html +=     '<a href="'+ad.link+'">CHECK IT OUT</a>'
        html +=   '</div>';
        html +=  '</li>';

        return html;
    }

    var _token = '<input type="hidden" name="_token" value="'+ '<?php echo csrf_token(); ?>' +'">';

    var cur_user = <?php echo Auth::guest() ?: Auth::user(); ?>;
    // var cur_user = JSON.parse(cur_user_obj);
    var random_ads = <?php echo $random_ads; ?>;
</script>
<div class="image-grid">
        @include('home.house-preview')
        <ul id="container">

        </ul>

        <!-- <div class="empty-message">There are no featured houses.</div> -->
        <div style="position: relative; height: 50px; margin-bottom: 30px;">
            <div id="loaderMessage" class="empty-message api-message">Loading....</div>
            <div id="noMoreMessage" class="empty-message no-more-message api-message">No more houses</div>
        </div>
</div>

<script src="{{asset('js/wookmark.min.js')}}"></script>
<script src="{{asset('js/imagesLoaded.min.js')}}"></script>
<script src="{{asset('js/houses-loader.js')}}"></script>