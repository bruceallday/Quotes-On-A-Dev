(function($){
    $('#quote-button').on('click', function(event){
        event.preventDefault()
        $('#quotes-content').addClass('blurOut')
        $('#quotes-content').toggle('slide')

        $.ajax({
          method: 'GET',
          url: quotes_on_dev_data.root_url + '/wp-json/quotes/v1/post'
        }).done(function(data) {
          console.log(data);
          let ranNum = Math.floor(Math.random() * data.length);
          const title = data[ranNum].title;
          const content = data[ranNum].content;

          $('#quotes-content').addClass('blurIn');
          $('#quotes-content')
            .html(`<h2>${title}</h2> <hr> </br> <div>${content}</div>`)
            .toggle('slide');
        });
    })

    $('#submit-button').on('click', function(){
        const $title = $('#quote-title').val()
        const $content = $('#quote-content').val();
        const $quoteURL = $('#quote-reference').val();
        const $quoteRef = $('#quote-url').val();

        const data = {
            title: $title,
            content: $content,
            quotesSource: $quoteRef,
            quotesURL: $quoteURL
        }

        $.ajax({
          method: 'POST',
          url: quotes_on_dev_data.root_url + '/wp-json/wp/v2/posts',
          data, 
          beforeSend: function(xhr){
              xhr.setRequestHeader('X-WP-Nonce', quotes_on_dev_data.nonce);
          }
        });
    })
}(jQuery))


