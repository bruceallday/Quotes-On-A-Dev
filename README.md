# Quotes On Dev
Quote generator using the wordpress API. Log in and submit a quote which is sent back to the Wordpress database<br>

![](/themes/quotes/readme-images/quotes-gif.gif)

## Technologies used
* HTML5
* CSS3
* [SASS](https://sass-lang.com/)
* [Wordpress API](https://wordpress.com/)
* [MAMP](https://www.mamp.info/en/)
* [PHP](https://www.php.net/)
* [GULP](https://gulpjs.com/docs/en/getting-started/quick-start) 
* JavaScript / jQuery
* Git
* bash

## Media Query 

| Device      | Width         | Height        | 
|:-----------:|:-------------:|:-------------:|
| Mobile      | 320           | 568           |  
| Tablet      | 768           | 1024          |             
| Desktop     | 1240          | 800           |    


## Personal Learnings

### Wordpress API:
In this project I learnt how PUSH data upto the WordpressAPI and retrieve it back to the Document Object Model.

### Plugins:
[Ajax Search Lite](https://wordpress.org/plugins/ajax-search-lite/)<br>
[Query Monitor](https://en-ca.wordpress.org/plugins/query-monitor/)<br>

The code below sorts the data I want and sends back to the WordPress database as a JavaScript object.

### CODE:
```
const data = {
            title: $title,
            content: $content,
            _qod_quote_source: $quoteRef,
            _qod_quote_source_url: $quoteURL
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

```

## Environment
* macOS Mojave: 10.14.6
* VS Code: 1.39.1

## Authors
* **Bruce Pouncey** - *Initial work* - [BPouncey](https://github.com/BPouncey)

## License
(MIT)

## Acknowledgments
[RED Academy](https://github.com/redacademy)


