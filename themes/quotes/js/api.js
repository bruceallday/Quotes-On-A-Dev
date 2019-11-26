(function($){

    $('#quote-button').on('click', function(event){
        event.preventDefault()
        $('#quotes-content').addClass('blurOut')
        $('#quotes-content').toggle('slide')

        $.ajax({
            method: "GET",
            url: wpApiSettings.root + 'wp/v2/posts'

        }).done(function(data){
            console.log(data)
            let ranNum = Math.floor(Math.random() * data.length);
            const title = data[ranNum].title.rendered
            const content = data[ranNum].content.rendered

            $('#quotes-content').addClass('blurIn');
            $('#quotes-content').html(`<h2>${title}</h2> <hr> </br> <div>${content}</div>`).toggle("slide")
        })
    })

    $('#submit-button').on('click', function(){
        const $title = $('#quote-title').val()
        const $content = $('#quote-content').val();

        const data = {
            title: $title,
            content: $content
        }

        $.ajax({
          method: 'POST',
          url: wpApiSettings.root + 'wp/v2/posts',
          data, 
          beforeSend: function(xhr){
              xhr.setRequestHeader('X-WP-Nonce', wpApiSettings.nonce);
          }
        });
    })

}(jQuery))


