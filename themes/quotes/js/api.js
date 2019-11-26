(function($){

    $('#quote-button').on('click', function(event){
        event.preventDefault()
        $('#quotes-content').addClass('blurOut')
        $('#quotes-content').toggle('slide')

        $.ajax({
            method: "GET",
            url: wpApiSettings.root + 'wp/v2/posts'

        }).done(function(data){
            let ranNum = randomGen(data)
            const title = data[ranNum].title.rendered
            const content = data[ranNum].content.rendered
            
            $('#quotes-content').html(`<h2>${title}</h2> ${content}`).toggle("slide")
        })
    })

    function randomGen(data){
        let ranNum = Math.floor(Math.random() * data.length)
        return ranNum;
    }

}(jQuery))


